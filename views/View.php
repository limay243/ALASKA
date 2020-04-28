<?php

class View
{
	private $_file;
	private $_t;

	function __construct($action)
	{
		$this->_file = 'views/View'.$action.'.php';
	}

	public function generate($data){

		$contenu = $this->generateFile($this->_file, $data);
		$view = $this->generateFile('views/template.php', array('t' => $this->_t, 'contenu' => $contenu));
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
}
?>