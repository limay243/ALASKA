<?php

abstract class Model
{
	private static $_bdd;

	//connexion bdd
	private static function setBdd()
	{
		self::$_bdd = new PDO('mysql:host=localhost;dbname=monBlog;charset=utf8','root','root');

		//constantes de PDO pour gérer les erreurs
		self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	//fonction de connexion par defaut à la bdd
	protected function getBdd()
	{
		if(self::$_bdd == null){
			$this->setBdd();
			return self::$_bdd;
		}
	}

	//création de la methode de recuperation de la liste d'éléments dans la bdd
	protected function getAll($table, $obj)
	{
		
		$var = [];
		$req = $this->getBdd()->prepare(" SELECT * FROM " .$table." ORDER BY id desc ");
		$req->execute();
		while($data = $req->fetch(PDO::FETCH_ASSOC)){
			$var[] = new $obj($data);
		}
		return $var;
		$req->closeCursor();
	}

	protected function getOne($table, $obj, $id)
	{
		$this->getBdd();
		$var = [];
		$req = self::$_bdd->prepare(" SELECT id, titre, contenu, categorie, DATE_FORMAT(date, '%d/%m/%Y à %Hh%Mm%Ss')  AS date FROM " .$table. " WHERE id=? ");
		$req->execute(array($id));
		while($data = $req->fetch(PDO::FETCH_ASSOC)){
			$var[] = new $obj($data);
		}
		return $var;
		$req->closeCursor();
	}
}