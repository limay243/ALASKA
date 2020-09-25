<?php
class ControllAccueil{

	public function __construct($url)
	{
		if (isset($url) && count($url) > 1){
			throw new \Exception('Page introuvable', 1);
		}

		else
			$this->Accueil();
		}

	private function accueil(){/*---------------- PAGE-D'ACCUEIL ----------------*/
    $this->postManager = new PostManager();
    $post = $this->postManager->getPostAccueil();
    require('view/frontend/accueil.php');
	}
}

?>