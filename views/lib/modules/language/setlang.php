<? 
session_start();
include "../includes/functions.php";
$lang = gett('lang');
$_SESSION['lang'] = $lang;

header("location: ".$_SERVER['HTTP_REFERER']);