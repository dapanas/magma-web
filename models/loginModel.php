<?php
class loginModel extends ModelBase
{
	
    public function logout(){
        session_destroy();
       
    }

	public function setupNewSession($email,$pass){
    	$accountId = $this->getAccountId($email,$pass);
        $_SESSION['initiated'] = true;
		$_SESSION['accountId'] = $accountId[0]; 
		$_SESSION['username'] = $accountId[1];
		$_SESSION['login_attemp'] = 1;
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']."GYH");
	}
	public function isValidUser($email,$pass){
	
    	$consulta = $this->db->prepare("SELECT username from accounts where username='".$email."'  limit 1");
		$consulta->execute();
        if ($consulta->rowCount() < 1) return false;
        $md5 = md5($pass);
        $consulta = $this->db->prepare("SELECT password from accounts where username='".$email."' and password='".$md5."' limit 1")  ;
        $consulta->execute();  
        if ($consulta->rowCount() < 1) return false; 
        return true;
	}
	
	public function getAccountId($email,$pass){
	   /* $user $pass corresponds to a valid user */
        $md5 = md5($pass);
        $consulta = $this->db->prepare("SELECT id,username from accounts where username ='".$email."' and password='".$md5."' limit 1")  ;
        $consulta->execute();  

        if ($consulta->rowCount() < 1) die("getUserIdByLogin::no es un usuario valido"); 
        $aux = $consulta->fetch();
        return array($aux['id'],$aux['username']);
            
	}
}
?>
