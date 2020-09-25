<?php
class Autoload{

	public function __construct(){
		spl_autoload_register(function($className){
			$file = $className . '.php';
			if (file_exists('./models/'.$file)){
				require './models/'.$file;
			}
			if (file_exists('./controllers/'.$file)){
				require './controllers/'.$file;
			}
			if (file_exists('./config/'.$file)){
				require './config/'.$file;
			}
		});
	}
}
