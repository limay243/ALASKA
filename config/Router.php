<?php

class  Router{
	private $ctrl;
	private $view;

	public function routeReq(){
		try{	
			$url = '';

			//LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
			if(isset($_GET['url'])){
				$url = explode('/', filter_var($_GET['url'],FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = "Controller".$controller;
				$controllerFile = "controllers/".$controllerClass.".php";

				 if(file_exists($controllerFile)){

				 	require_once($controllerFile);
				 	$this->ctrl = new $controllerClass($url);
				 }
				 else{
				 	throw new \Exception("Page introuvable", 1);
				}
			}
				else{
					require_once ('controllers/ControllerAccueil.php');
					$this->ctrl = new ControllerAccueil($url);
				};
		
			// GESTION DES ERREURS
		}catch(\Exception $e) {
			$errorMessage = $e->getMessage();
			$this->view = new View('Error');
			$this->view->generate(array('errorMessage' => $errorMessage));
		}
	}
}

?>