<?php
/*
Basic Router
example:  'ID_PAGINA' => ['friendly_url','page title','controlador','metodo'],

@-> router returns array[controlador,metodo]
@-> get returns Friendly URL for a [controlador,metodo] pair

*/

class urlHelper {

	public static function router($p,$m = -1) {
		if ($m != -1 and intval($m) < 1) return array($p.'Controller', $m);

		if (is_int(intval($m))) {
			$_POST['a'] = $m;
			$_GET['a'] = $m;
		}

		$config = Config::singleton();
		$URLS = $config->get('URLS');
		$array_return = array();
		foreach($URLS as $url) {
			if ($p == $url[0])
				return array($url[2], $url[3]);
		}

		return array($p.'Controller',$m);
	}
/*

	public function get($page_id){
			$config = Config::singleton();
			$URLS = $config->get('URLS');
			if (isset($URLS[$page_id][0]))
				return $config->get('base_url').$URLS[$page_id][0];		
			else return "Page ID not found";
		
	}
	
	public function title($friendly){
			$config = Config::singleton();
			$URLS = $config->get('URLS');
			foreach($URLS as $url):
				if ($url[0] == $friendly) return $url[1];
			endforeach;
			include_once "models/accountsModel.php";
			$accounts = new accountsModel();
			if (isset($_SESSION['accountId'])){
				$couple = $accounts->getAccountDetails($_SESSION['accountId']);
				return $couple['name_a'].' & '.$couple['name_b'];
			} else {
return $URLS['home'][1];
			}

	}    
	
		public function description($friendly){
			$config = Config::singleton();
			$URLS = $config->get('URLS');
			foreach($URLS as $url):
				if ($url[0] == $friendly) return $url[4];
			endforeach;
			
/*			COMENTO ESTA PARTE, ES LO MISMO QUE EN TITULO por si quieres incluir nombre de la pareja en 					description.

			include_once "models/accountsModel.php";
			$accounts = new accountsModel();
			if (isset($_SESSION['accountId'])){
				$couple = $accounts->getAccountDetails($_SESSION['accountId']);
				return $couple['name_a'].' & '.$couple['name_b'];
			} else {
				return $URLS['home'][1];
			}


	}   
	

	public function getHoneymoonLink($accountsId){
		include_once "models/accountsModel.php";
		$accounts = new accountsModel();
		$config = Config::singleton();
		$URLS = $config->get('URLS');
		$publicHoneymoonUrl = $URLS['honeymoon-public'][0];
		$couple = $accounts->getAccountDetails($accountsId);
		$couple_name = $couple['name_a']." ".$couple['name_b'];
		return 	$config->get('base_url').$publicHoneymoonUrl."/".$accountsId."/".generate_seo_link($couple_name);
	}
*/

}


	
	

?>