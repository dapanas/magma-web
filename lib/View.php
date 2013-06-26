<?php
class View
{
	function __construct()
	{
	}
 
	public function show($name, $vars = array(),$show_top_footer = false)
	{
		$config = Config::singleton();

		$path = $config->get('viewsFolder') . $name;
        require 'language/'.$_SESSION['lang'].'.php';/* Language */
		if (file_exists($path) == false)
		{
			trigger_error ('Template `' . $path . '` does not exist.', E_USER_NOTICE);
			return false;
		}
   		$vars['lang'] = $_SESSION['lang'];
        $vars['page'] = $name;  
		$vars['base_url'] = $config->get('base_url');
		$fingerprint = md5($_SERVER['HTTP_USER_AGENT']."GYH");
		$vars['LOGEDIN'] =  isset($_SESSION['initiated']) and $_SESSION['initiated'] and isset($_SESSION['accountId']) and $_SESSION['accountId'] > 0 and isset($_SESSION['HTTP_USER_AGENT']) and  $_SESSION['HTTP_USER_AGENT'] == $fingerprint;
		if(is_array($vars))
		{
                    foreach ($vars as $key => $value)
                    {
                	$$key = $value;
                    }
          }

 
        
    	
    		if ($show_top_footer) include $config->get('viewsFolder')."includes/top.php";   		
	       	include($path);
    		if ($show_top_footer) include $config->get('viewsFolder')."includes/footer.php";
		
	}
}

?>