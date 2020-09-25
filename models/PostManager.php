<?php
    class PostManager
    { 
    /***************************************-RECUPERATION POSTS-****************************************************/
        public function countPosts()
        {
            $db = $this->dbConnect();
            $rek = $db->prepare('SELECT COUNT(*)as count FROM posts');
            $rek->execute(array());
            
            $pagesTotal = $rek->fetchColumn();

            return $pagesTotal;
        }
    /*-------------------------------------PAGINATION-----------------------------------------*/
        public function getPosts($itemNumber, $start)
        {
            $db = $this->dbConnect();
            $req = $db->query('SELECT * FROM posts ORDER BY creation_date DESC LIMIT '.$start.','.$itemNumber);
            $posts = $req->fetchAll();

            return $posts;
        }

    /**********************************-RECUPERATION SINGLE POST-*****************************************************/
        public function getPost($id)
        {   
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
                 AS creation_date_fr, DATE_FORMAT(modif_date, \'%d/%m/%Y à %Hh%imin%ss\') 
                 AS modif_date_fr FROM posts WHERE id = ?');
            $req->execute(array($id));
            $post = $req->fetch();

            return $post;
        }

    /*****************************************-SINGLE POST ACCUEIL-**************************************************/
        public function getPostAccueil()
        {       
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
                 AS creation_date_fr FROM posts  ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array());
            $post = $req->fetch();

            return $post;
        }

    /*****************************************-SINGLE POST ADMIN-**************************************************/
        public function getPostAdmin()
        {       
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT * FROM posts  ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array());

            return $req;
        }

    /*********************************************-AJOUT POST-**********************************************/
        public function addPost($titre, $content)
        {
            $db = $this->dbConnect();
             $req = $db->prepare('INSERT INTO posts (titre, contenu, creation_date) VALUES (?,?,NOW())');
            $req->execute(array($titre, $content));
        }

    /*****************************************-MODIFICATION POST-**************************************************/
        public function updatePost($id, $titre, $contenu)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('UPDATE posts SET titre=?, contenu=? WHERE id=?');
            $req->execute(array($titre, $contenu, $id));
        }



    /***************************************-CONNEXION DB-****************************************************/
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