<?php

class Frontend{

  /*--------------- LISTES-POSTS ----------------*/

  public function __construct(){
    $pagination = new Pagination(3);
    $this->getId = $pagination->getPage();
  }

  public function post(){
      if($this->getId !=1){
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $post = $this->postManager->getPost($this->getId);
        $comments = $this->commentManager->getComments($this->getId);
        require('view/frontend/postVu.php');
    }
  }
  
  public function accueil(){
    $this->postManager = new PostManager(); // Création d'un objet
    $post = $this->postManager->getPostAccueil(); // Appel d'une fonction de cet objet
    require('view/frontend/accueil.php');
  }
                                    /*--------------- VUE ENREGISTREMENT COMPTE ----------------*/
    public function registerView(){
      require('view/frontend/registerView.php');
    }

    public function loginView(){/*---------------- VUE-LOGIN ----------------*/
      require('view/frontend/login.php');
     }


/*************************************************=SECTION-POSTS-COMMENTS=***************************************/
    public function createPostView(){
      require('view/frontend/createPost.php');
    }

    public function listPosts($page = null){/*--------------- LISTES-POSTS ----------------*/
      $this->postManager = new PostManager();

      $pagination = new Pagination(3);
      $pagesTotal = $pagination->totalPages($this->postManager->countPosts());
      $posts = $this->postManager->getPosts($pagination->getItemPerPage(), $pagination->getStartIndex());

       require('view/frontend/listPostsView.php');
  }
  
                                          /*--------------- VUE ECRIRE-POST ----------------*/
    public function createPost(){ 
    if(isset($_POST['titre']) && isset($_POST['content'])){    
        $this->postManager = new PostManager();
        $this->postManager->addPost($_POST['titre'],$_POST['content']);
        header('Location:listPosts');
    }
  }

    public function editPostView($id){  
     if($this->getId !=1){                  /*--------------- VUE-EDIT-POST ----------------*/
        $this->postManager = new PostManager();
        $post = $this->postManager->getPost($this->getId);
        require('view/frontend/newPostView.php');
      }
    }

    /*--------------- MISE-A-JOUR-POST ----------------*/
    public function editPost(){ 
         if($this->getId !=1 && !empty($_POST['titre']) && !empty($_POST['content'])){
        $this->postManager = new PostManager();
        $post = $this->postManager->updatePost($this->getId, $_POST['titre'], $_POST['content']);
        header('Location: '.MON_SITE.'listPosts');
    }
  }

    /*---------------- COMMENT ----------------*/
    public function addComment(){
      if(isset($_POST['author']) && $_POST['comment']){
        $this->commentManager = new CommentManager();
        $comments = $this->commentManager->postComment($_POST['postId'], $_POST['author'], $_POST['comment']);
        header('Location:'.MON_SITE.'post/'.$_POST['postId']);
    }
  }

    public function alertComment($id){ 
      if(isset($_GET['id'])){
        $this->commentManager = new CommentManager();
        $this->commentManager->signaleComment($id); /*---------------- SIGNALE-COMMENT ----------------*/
        header('Location: post');
    }
  } 
}
?>