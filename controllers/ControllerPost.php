<?php
require_once 'views/View.php';

class ControllerPost
{
	private $_PostManager;
	private $_view;

	public function __construct($url)
	{
		if (isset($url) && count($url) < 1){
			throw new \Exception('Page introuvable', 1);
		}
		else{
			$this->post();
		}
	}

	private function post()
	{
		if (isset($_GET['id'])){
		$this->_postManager = new PostManager;
		$post = $this->_postManager->getPosts($_GET['id']);
		$this->_view = new View('SinglePost');
		$this->_view->generate(array('post' => $post));
		}
	}
}

?>