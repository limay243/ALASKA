<?php
    class LogManager
    {

    /**************************************-INSCRIPTION-*****************************************************/
        public function getLog($prenom, $nom, $email, $pass1, $pass2, $token_inscription, $userType)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO membresBlog(prenom, nom, email, pass1, pass2, token_inscription, userType, date_Inscription) VALUES(?,?,?,?,?,?,?, NOW())');
            $req->execute(array($prenom, $nom, $email, $pass1, $pass2, $token_inscription, $userType));

            return $req;
        }


    /***********************************-LOGIN-********************************************************/
        public function getLogIn($email, $pass1)
        {
            $db = $this->dbConnect();
            $reqUser = $db->prepare('SELECT * FROM membresBlog WHERE email=? AND pass1=?');
            $reqUser->execute(array($email, $pass1));

            return $reqUser;
        }


    /************************************-TABLEAU DES MEMBRES-*******************************************************/
        public function getLogMembers()
        {
            $db = $this->dbConnect();
            $task = $db->prepare('SELECT id, prenom, email, DATE_FORMAT(date_Inscription, \'%d/%m/%Y à %Hh%imin%ss\') 
                 AS date_Inscription_fr FROM membresBlog ORDER BY date_Inscription  LIMIT 0, 10');
            $task->execute(array());

            return $task;
        }


    /**************************************-SUPPRIMER MEMBRES-*****************************************************/
        public function deleteMembers($id)
        {
            $db = $this->dbConnect();
            $task = $db->prepare('DELETE FROM membresBlog WHERE id=?');
            $task->execute(array($id));

            return $task;
        }


    /*************************************-CONNEXION DB-******************************************************/
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