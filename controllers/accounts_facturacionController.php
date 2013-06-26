<?
// MAGMA
// accounts_facturacion Controller
// 01-2013
// Beto Ayesa contacto@phpninja.info


class accounts_facturacionController extends ControllerBase
{
		public function index(){
			require "models/accounts_facturacionModel.php"; 	
			$items = new accounts_facturacionModel();			
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getAll()
		          );         
			$this->view->show("accounts_facturacion.php", $data);
		}
		
		public function detail(){
			$params = gett();
			require "models/accounts_facturacionModel.php"; 	
			$items = new accounts_facturacionModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])
			      );	          
			$this->view->show("accounts_facturacionDetail.php", $data);
		}

		public function add(){
			$data = Array( "title" => "Page Title", "items" => array()     );	          
			$this->view->show("forms/accounts_facturacionForm.php", $data);
		}
		
		public function search(){
			$params = gett();
			require "models/accounts_facturacionModel.php"; 	
			$items = new acccountsModel();
	
			$json = new Services_JSON();	
			$data = Array( "json_items" =>  $json->encode($items->search($params['a']))	);         
			$this->view->show("json.php", $data,false);
		}
		public function edit(){
			$params = gett();
			require "models/accounts_facturacionModel.php"; 	
			$items = new accounts_facturacionModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])         
		          );	          
			$this->view->show("forms/accounts_facturacionForm.php", $data);
		}

		public function doAdd(){
			$params = gett();
			require "models/accounts_facturacionModel.php"; 	
			$items = new accounts_facturacionModel();
			$items->add($params);
		}

		public function doEdit(){

			require "models/ormModel.php"; 	
			$items = new ormModel();
			$items->PUT('accounts_facturacion',$_SESSION['accountId']);
			header("location: ../accounts/index");
			
		}

		public function doDelete(){
			$params = gett();
			require "models/accounts_facturacionModel.php"; 	
			$items = new accounts_facturacionModel();
			$items->delete($params);
		}

}