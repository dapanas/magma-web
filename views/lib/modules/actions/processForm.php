<?
session_start();
include "../../config.php";
		$yourEmail = info_email;
		$msg = "";
		$coreAtributes = array("op","returnurl","enviar","emailto","formhash","tabla","rid");
		foreach($_POST as $key => $value){
		
			if ($key != 'null' and !in_array($key,$coreAtributes)){
				$msg .= "<b>".$key ."</b><BR>";
				$msg .= $value."<BR><br>";
			}
		}
		
/* FORM HASH falta */

if ($_POST['op'] == 'sendemail' and $_POST['emailto'] != ""){
		$headers="Mime-Version:1.0\r\n";
		$headers.="Content-type:text/html; charset=utf-8\r\n";
		$headers .= "From: ".$yourEmail."\r\n";
		$asunto .= "Formulario contacto chao-studios.com";
		

		if (mail($_POST['emailto'],$asunto,$msg, $headers)) 
			$_SESSION['errors'] = "<BR><BR>THANK YOU. WE HAVE RECEIVED YOUR EMAIL.";
		else
			$_SESSION['errors'] = "Ha ocurrido un error enviando el email";
			
} else if ($_POST['op'] == 'db' and $_POST['tabla'] != ""){

	// UPDATE
	// INSERT
	//
} else{
	$_SESSION['errors'] = "ERROR OP";
}

if (isset($_POST['returnrul']) and $_POST['returnrul'] != "") header("location: ".$_POST['returnrul']);	
else header("location: ".$_SERVER['HTTP_REFERER']);	




		
	


if (isset($_POST['message']))
{
if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'])
    {
        $message = htmlentities($_POST['message']);

        $fp = fopen('./messages.txt', 'a');
        fwrite($fp, "$message<br />");
        fclose($fp);
    }
}

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

?>

<form method="POST">
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<input type="text" name="message"><br />
<input type="submit">
</form>

<?php

readfile('./messages.txt');

?>