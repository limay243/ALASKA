<?php

  class Backend{

public function __construct(){
    $pagination = new Pagination(3);
    $this->getId = $pagination->getPage();
  }

/******************************************=SECTION ADMIN=****************************************/

/*---------------- VUE-POST-ADMIN ----------------*/
public function createPostView(){
      require('view/backend/createPost.php');
    }

     public function createPost(){ 
    if(isset($_POST['titre']) && isset($_POST['content'])){    
        $this->postManager = new PostManager();
        $this->postManager->addPost($_POST['titre'],$_POST['content']);
        header('Location:listPosts');
    }
  }

/*--------------- VUE-MODIF-POST ----------------*/
    public function modifPostView($id){  
     if($this->getId !=1){                  
        $this->postManager = new PostManager();
        $post = $this->postManager->getPost($this->getId);
        require('view/backend/modifPostView.php');
      }
    }


    public function postAdmin(){ 
        $this->postManager = new PostManager();
        $req = $this->postManager->getPostAdmin();
        require('view/backend/postAdminView.php');
    }

    public function adminPage(){
      if(isset($_SESSION['userType']) && !empty($_SESSION['userType']==1)){
        $this->logManager = new LogManager();
        $task = $this->logManager->getLogMembers();
        require('view/backend/adminView.php');
      }
      else {
            header('Location:accueil');
      }
    }

    /*************************************************=SECTION-LOG-MEMBRES=***************************************/

    /*--REGISTER ------*/
    public function register(){
      if(isset($_POST['prenom']) 
        && isset($_POST['nom']) 
        && isset($_POST['email']) 
        && isset($_POST['pass1']) 
        && isset($_POST['pass2']) 
        && isset($_POST['token_inscription']) 
        && isset($_POST['userType'])){
        $this->logManager = new LogManager();
        $this->logManager->getLog(
          htmlspecialchars($_POST['prenom']), 
          htmlspecialchars($_POST['nom']), 
          htmlspecialchars($_POST['email']), 
          htmlspecialchars($_POST['pass1']), 
          htmlspecialchars($_POST['pass2']), 
          sha1($_POST['token_inscription']), 
          htmlspecialchars($_POST['userType']));
        header('Location:accueil');
    }else{
      echo'verifiez vos saisies!';
    }
  }

/*---------------- LOGIN-MEMBRE ----------------*/
    public function Login(){
      if(isset($_POST['email']) && $_POST['pass1']){
        $this->logManager = new LogManager();
        $reqUser = $this->logManager->getLogIn($_POST['email'], $_POST['pass1']);
        $userExist=$reqUser->rowCount();

        if($userExist==1){ 
          $userInfo=$reqUser->fetch(); 
            $_SESSION['id']=$userInfo['id'];
            $_SESSION['prenom']=$userInfo['prenom'];
            $_SESSION['nom']=$userInfo['nom'];
            $_SESSION['email']=$userInfo['email'];
            $_SESSION['pass1']=$userInfo['pass1'];
            $_SESSION['userType']=$userInfo['userType'];
            header("Location:accueil");
        }
    
        if(isset($_SESSION['email']) && $_SESSION['pass1']){ 
          if(isset($_SESSION['userType']) && !empty($_SESSION['userType']==1)){
            header("Location:adminPage");
          }
        }
      }
    }

/*---------------- DECONNEXION ----------------*/
    public function deconnexionView(){
      if(isset($_POST['deconnection'])){
        $this->logManager = new LogManager();
        $_session = array();
        $_SESSION = array();
        unset($_SESSION['id']);
        session_destroy();
        header('refresh:1, accueil');
      }
}

    /*---------------- SUPPRIMER-MEMBRE ----------------*/
    public function suppMembre($id){
      if(isset($_GET['id'])){
        $this->logManager = new LogManager();
        $task = $this->logManager->deleteMembers($_GET['id']);
        header("Location: adminPage");
    }
  }

    public function alertAdmin(){/*---------------- VUE-SINGLE-SIGNALE ----------------*/
        $this->commentManager = new CommentManager();
        $commentaires = $this->commentManager->getCommentsAdmin();
          require('view/backend/alertViewAdmin.php');
    }

    public function alertComment(){ 
                 /*---------------- SIGNALE-COMMENT ----------------*/
        if(isset($this->getId)){
        $this->commentManager = new CommentManager();
        $this->commentManager->signaleComment($this->getId);
        header('Location: '.MON_SITE.'listPosts');
    }
  }

    public function alertCom(){/*---------------- SUPPRIMER-SINGLE-COMMENT ----------------*/
      if($this->getId){
        $this->commentManager = new CommentManager();
        $comm = $this->commentManager->getCommentSup($this->getId);
        require('view/backend/comView.php');
      }
    }

    public function okComment(){                 /*---------------- ACCEPTE-COMMENT ----------------*/
      if($this->getId){
        $this->commentManager = new CommentManager();
        $comm = $this->commentManager->designalerComment($this->getId);
       header('Location:'.MON_SITE.'alertAdmin');
    }
  }

    public function suppComment(){              /*----------------**----------------*/
      if($this->getId){
        $this->commentManager = new CommentManager();
        $comment = $this->commentManager->deleteComment($this->getId);
        header('Location: '.MON_SITE.'adminPage');
    }
  }

    public function commentAdmin($id){                /*---------------- VUE-COMMENT-ADMIN ----------------*/
      if(isset($_GET['id'])){
        $this->commentManager = new CommentManager();
        $req = $this->commentManager->getCommentsAdmin($id);
       require('view/backend/adminView.php');
    }
  }

    public function createForgotPass(){           /*---------------- MOT-DE-PASSE-OUBLIE ----------------*/
       require('view/backend/forgotPass.php');
    }
}
?>