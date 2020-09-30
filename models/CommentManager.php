<?php

    class CommentManager
    {

/*********************************-RECUPERATIONS DES COMMENTAIRES -**********************/
    public function getComments($id)
    {       
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, Alerte, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE postId=? ORDER BY comment_date DESC');
        $comments->execute(array($id));

        return $comments;
    }

/*********************************-RECUPERATION SINGLE COMMENTAIRE-************************************/
    public function getComment()
    {       
        $db = $this->dbConnect();
        $com = $db->prepare('SELECT id, author, comment, Alerte, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments');
        $com->execute(array());
        $comm = $com->fetch();

        return $comm;
    }

/****************************************-RECUPERATION COMMENTAIRE-****************************/
    public function getCommentSup($id)
    {       
        $db = $this->dbConnect();
        $com = $db->prepare('SELECT id, author, comment, Alerte, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id=?');
        $com->execute(array($id));
        $comm = $com->fetch();

        return $comm;
    }

/*****************************************-RECUPERATION COMMENTAIRE ADMIN-************************/
    public function getCommentsAdmin()
    {       
        $db = $this->dbConnect();
        $commentaire = $db->prepare('SELECT id, author, comment, Alerte, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE Alerte=?');
        $commentaire->execute(array('Alerte'));
        
        return $commentaire->fetchAll();
    }

/*****************************************-RECUPERATION COMMENTAIRE PAGINATION-************************/
    public function getCommentsPage()
    {       
        $db = $this->dbConnect();
        $pageComment = $db->query('SELECT * FROM comments ORDER BY id DESC LIMIT 0,5');
        //$commentPage->execute(array());
        
        return $pageComment;
    }

/******************************************-POST SINGLE COMMENTAIRE -********************************/
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(postId, author, comment, comment_date) VALUES ( ?, ?,?, NOW())');
        $req = $comments->execute(array($postId, $author, $comment));

        return $req;
    }

/******************************************-SUPPRIMER SINGLE COMMENTAIRE -*************************************/
    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id=?');
        $req = $comments->execute(array($id));
        
        return $req;
    }

/*******************************************-DESIGNALER SINGLE COMMENTAIRE -***********************************/
    public function designalerComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET Alerte="" WHERE id=?');
        $req = $comments->execute(array($id));
        
        return $req;
    }


/******************************************-SIGNALER SINGLE COMMENTAIRE-**************************************/
    public function signaleComment($id)
    {
        $db = $this->dbConnect();
        $comSigne = $db->prepare('UPDATE comments SET Alerte="Alerte" WHERE id=?');
        $req=$comSigne->execute(array($id));
        
        return $req;
    }


/********************************************-CONNEXION DB -***********************************************/
    private function dbConnect()
    {
        try{
            $db = new PDO('mysql:host=localhost;dbname=monBlog;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            die("Error!: " . $e->getMessage() . "<br/>");
        }

        return $db;
    }
}