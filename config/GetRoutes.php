<?php

class GetRoutes{

    public $_Controllers;

	public function __construct(){

 		try{          
                        
			$url = '';

            if($_SERVER['REQUEST_URI']){
                $url = explode("/", filter_var($_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL));
            
            $routes = $this->getAllRoutes();

            if(isset($url[3])){
                $id = $url[2];
            }
        
            if(isset($routes) && $routes){
                
               if(preg_match('/[?]/i',$url[2])){
                    $urlExplode = explode('?',$url[2]);
                    $route = $routes[$urlExplode[0]]; 
                }else{
                    $route = $routes[$url[2]];
                }                               

                $explodeRoute = explode('/', $routes[$url[2]]);
                
                $this->_Controllers = new $explodeRoute[0];
                
                $function = $explodeRoute[1];
                
                if(isset($explodeRoute[2]) && $explodeRoute[2] =='$id'){
                    $this->_Controllers->$function($id);
                }
                else{
                    
                    $this->_Controllers->$function();
                }
            }

            elseif($routes = Frontend($url)){
              $this->_Controllers = new Frontend($url);
                require_once ('controllers/Frontend.php');
            }
            else{
              $this->_Controllers = new Backend($url);
                require_once ('controllers/Backend.php');
            }
        }
    }
    
        catch(\Exception $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
        }
  	}
     
    public function getAllRoutes(){
        
/********************************************************************F R O N T E N D***********************************/
        $routes['']                 = 'Frontend/accueil'; 
        $routes['accueil']          = 'Frontend/accueil'; 
        $routes['listPosts']        = 'Frontend/listPosts';
        $routes['loginView']        = 'Frontend/loginView';
        $routes['registerView']     = 'Frontend/registerView';
        $routes['createPostView']   = 'Frontend/createPostView';
        $routes['createPost']       = 'Frontend/createPost';
        $routes['createLogView']    = 'Frontend/createLogView';
        $routes['post']             = 'Frontend/post/$id';
        $routes['editPost']         = 'Frontend/editPost/$post';



        $routes['editPostView']     = 'Frontend/editPostView/$id';

        $routes['addComment']       = 'Frontend/addComment/$id';
        
/*********************************************************************B A C K E N D*************************************/
        $routes['adminPage']            = 'Backend/adminPage';
        $routes['alertAdmin']           = 'Backend/alertAdmin';
        $routes['postAdmin']            = 'Backend/postAdmin';
        $routes['suppMembre']           = 'Backend/suppMembre';
        $routes['alertComment']         = 'Backend/alertComment';
        $routes['alertCom']             = 'Backend/alertCom/$id';
        $routes['okComment']            = 'Backend/okComment';
        $routes['suppComment']          = 'Backend/suppComment';
        $routes['commentAdmin']         = 'Backend/commentAdmin';
        $routes['createForgotPass']     = 'Backend/createForgotPass';
        $routes['Login']                = 'Backend/Login';
        $routes['register']             = 'Backend/register';
        $routes['deconnexionView']      = 'Backend/deconnexionView';

        return $routes;
    }
}
?>