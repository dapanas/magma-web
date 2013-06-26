<?php
class loginController extends ControllerBase
{

    public function index(){
      
		$this->login();
		
    }
	
	public function login(){
		$params = gett();

		$data = Array( "title" => "Iniciar Sesión"   ,
		"activate" => $params['a']
		 );         
			$this->view->show("login.php", $data);
	}
	
	public function lostpassword(){
		$data = Array( "title" => "Iniciar Sesión"    );         
			$this->view->show("lostpassword.php", $data);
	}

	public function doLogin()
	{
    	$config = Config::singleton();
      	require 'models/loginModel.php';
    	$loginModel = new loginModel();
    	if (!isset($_SESSION['login_attemp'])) $_SESSION['login_attemp'] = 1;
		$_SESSION['login_attemp'] = 0;
		$params = gett();
    	if ($_SESSION['login_attemp'] < 4){    	
        	if ($loginModel->isValidUser($params['username'],$params['password'])){       	    	
    	       $loginModel->setupNewSession($params['username'],$params['password']);
    	        if (!isset($params['remember'])){
	    	      $_SESSION['LAST_ACTIVITY'] = time(); 
    	       } 
   				header ("location: ../accounts");
        	}else{ 
        		$_SESSION['login_attemp']++;
        		header ("location: ".$_SERVER['HTTP_REFERER']."?c=1");
        	}				
        } else {
        	header ("location: ".$_SERVER['HTTP_REFERER']."?c=2");
        }     	}
 
	public function logout()
	{
    	$config = Config::singleton();
		require 'models/loginModel.php';
    	$loginModel = new loginModel();
    	$loginModel->logout();
		header("location: ".$config->get('base_url'));
        exit(0);
	}
}
?>
