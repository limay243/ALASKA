<?php


class Post
{
	private $_id;
	private $_pseudo;
	private $_titre;
	private $_contenu;
	private $_categorie;
	private $_date;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data){
		foreach($data as $key => $value){
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)){
			  $this->$method($value);
			}
		}
	}

	public function setId($id)
	{
		$id = (int) $id;
		if($id > 0){
			$this->_id = $id;
		}
	}
	
	public function setPseudo($pseudo)
	{
		if (is_string($pseudo))
			$this->_pseudo = $pseudo;
	}
	public function setTitre($titre)
	{
		if (is_string($titre))
			$this->_titre = $titre;
	}
	public function setContenu($contenu)
	{
		if(is_string($contenu))
			$this->_contenu = $contenu;
	}
	public function setCategorie($categorie)
	{
		if(is_string($categorie))
			$this->_categorie = $categorie;
	}
	public function setDate($date)
	{
			$this->_date = $date;
	}

	public function id()
	{
		return $this->_id;
	}
	public function pseudo()
	{
		return $this->_pseudo;
	}
	public function titre()
	{
		return $this->_titre;
	}
	public function contenu()
	{
		return $this->_contenu;
	}
	public function categorie()
	{
		return $this->_categorie;
	}
	public function date()
	{
		return $this->_date;
	}
}