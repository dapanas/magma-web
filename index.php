<? session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'lib/FrontController.php';


FrontController::main();

