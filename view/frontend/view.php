<?php

class View
{
	private $_file;
	private $_t;

	function __construct($action){
		$this->_file = 'view/frontend/View'.$action.'.php';
	}

	//Créer une fonctin qui va générer et afficher la vue d'un article
	public function generate($data){
		//définir le contenu à envoyer
		$content = $this->generateFile($this->_file, $data);
		//template
		$view = $this->generateFile('view/frontend/template.php', array('t' => $this->_t, 'content' => $content));
		echo $view;
	}


	public function getPosts($data){
		$content = $this->generateFile($this->_file, $data);
		//template
		$view = $this->generateFile('view/frontend/template.php', array('t' => $this->_t, 'content' => $content));
		echo $view;
	}

	//générer la vue du formulaire de création d'un article
	public function createPostView(){
		//définir le contenu à envoyer
		$content = $this->generateFileSimple($this->_file);
		
		//template
		$view = $this->generateFile('view/frontend/createPost.php', array('t' => $this->_t, 'content' => $content));
		echo $view;
	}

	private function generateFile($file, $data){
		if(file_exists($file)){
			extract($data);

			ob_start();
			require $file;
			return ob_get_clean();
		}
		else{
			throw new \Exception("fichier".$file."introuvable", 1);
		}
	}

	private function generateFileSimple($file){
		if(file_exists($file)){
			require $file;
		}
		else{
			throw new \Exception("fichier".$file."introuvable", 1);
	}
}

//PARTIE COMMENTAIRE-------------------------------------------------------------------


	//Créer une fonctin qui va générer et afficher la vue d'un commentaire
	public function generateComment($data){
		//définir le contenu à envoyer
		$content = $this->generateFileComment($this->_file, $data);
		//template
		$view = $this->generateFileComment('view/frontend/template.php', array('t' => $this->_t, 'content' => $content));
		echo $view;
	}

	private function generateFileComment($file, $data){
		if(file_exists($file)){
			extract($data);

			ob_start();
			require $file;
			return ob_get_clean();
		}
		else{
			throw new \Exception("fichier".$file."introuvable", 1);
		}
	}
}

?>