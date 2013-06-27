<?
$LANG = "";
if (lang_support){
	if (!isset($_SESSION['lang'])) $_SESSION['lang'] = lang_default;
	$LANG = $_SESSION['lang'];
	if (!file_exists("content/langs/".$LANG.".php")) {
		if (developer) {
			$aux = fopen('content/langs/'.$LANG.'.php','w');	
			fwrite($aux,"<? ");
			fclose($aux);
		} else {
			die ("No hay diccionario para ".$LANG );
		}
	
	} else { 
		include "content/langs/".$LANG.".php";
		include "core/language/translator.php";
	}
	
}	
