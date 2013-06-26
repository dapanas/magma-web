<?php
class pageController extends ControllerBase
{
    public function index(){
 			
		$data = Array(
			  "title" => "Page Title"
          );         
		$this->view->show("home.php", $data);

    }
	   public function app(){
 			
		$data = Array(
			  "title" => "Page Title",
				"fecha" => date("Y-m-d")
          );         
		$this->view->show("la-app.php", $data);

    }
    public function contacto(){
 			
		$data = Array(
			  "title" => "Contacto"
          );         
		$this->view->show("contacto.php", $data);

    }

    public function publicaciones(){
 			
		$data = Array(
			  "title" => "Page Title"
          );         
		$this->view->show("publicaciones.php", $data);

    }
    public function ayuda(){
 			
		$data = Array(
			  "title" => "Page Title"
          );         
		$this->view->show("ayuda.php", $data);

    }
   public function condiciones(){
 			
		$data = Array(
			  "title" => "Page Title"
          );         
		$this->view->show("condiciones-uso.php", $data);

    }
   public function privacidad(){
 			
		$data = Array(
			  "title" => "Page Title"
          );         
		$this->view->show("privacidad.php", $data);

    }
}
?>
