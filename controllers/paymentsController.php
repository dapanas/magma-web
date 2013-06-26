<?
// MAGMA
// payments Controller
// 01-2013
// Beto Ayesa contacto@phpninja.info


class paymentsController extends ControllerBase
{
		public function index(){
			require "models/paymentsModel.php"; 	
			$items = new paymentsModel();			
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getAll()
		          );         
			$this->view->show("payments.php", $data);
		}
		
		public function detail(){
			$params = gett();
			require "models/paymentsModel.php"; 	
			$items = new paymentsModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])
			      );	          
			$this->view->show("paymentsDetail.php", $data);
		}

		public function add(){
			$data = Array( "title" => "Page Title", "items" => array()     );	          
			$this->view->show("forms/paymentsForm.php", $data);
		}
		
		public function search(){
			$params = gett();
			require "models/paymentsModel.php"; 	
			$items = new acccountsModel();
	
			$json = new Services_JSON();	
			$data = Array( "json_items" =>  $json->encode($items->search($params))	);         
			$this->view->show("json.php", $data,false);
		}
		public function edit(){
			$params = gett();
			require "models/paymentsModel.php"; 	
			$items = new paymentsModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])         
		          );	          
			$this->view->show("forms/paymentsForm.php", $data);
		}

		public function doAdd(){
			$params = gett();
			require "models/paymentsModel.php"; 	
			$items = new paymentsModel();
			$items->add($params);
		}

		public function doEdit(){
			$params = gett();
			require "models/paymentsModel.php"; 	
			$items = new paymentsModel();
			$items->edit($params);
		}

		public function doDelete(){
			$params = gett();
			require "models/paymentsModel.php"; 	
			$items = new paymentsModel();
			$items->delete($params);
		}

}