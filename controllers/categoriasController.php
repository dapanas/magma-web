<?
// MAGMA
// categorias Controller
// 01-2013
// Beto Ayesa contacto@phpninja.info


class categoriasController extends ControllerBase
{
		public function index(){
			require "models/categoriasModel.php"; 	
			$items = new categoriasModel();			
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getAll()
		          );         
			$this->view->show("categorias.php", $data);
		}
		
		public function detail(){
			$params = gett();
			require "models/categoriasModel.php"; 	
			$items = new categoriasModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])
			      );	          
			$this->view->show("categoriasDetail.php", $data);
		}

		public function add(){
			$data = Array( "title" => "Page Title", "items" => array()     );	          
			$this->view->show("forms/categoriasForm.php", $data);
		}
		
		public function search(){
			$params = gett();
			require "models/categoriasModel.php"; 	
			$items = new acccountsModel();
	
			$json = new Services_JSON();	
			$data = Array( "json_items" =>  $json->encode($items->search($params))	);         
			$this->view->show("json.php", $data,false);
		}
		public function edit(){
			$params = gett();
			require "models/categoriasModel.php"; 	
			$items = new categoriasModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])         
		          );	          
			$this->view->show("forms/categoriasForm.php", $data);
		}

		public function doAdd(){
			$params = gett();
			require "models/categoriasModel.php"; 	
			$items = new categoriasModel();
			$items->add($params);
		}

		public function doEdit(){
			$params = gett();
			require "models/categoriasModel.php"; 	
			$items = new categoriasModel();
			$items->edit($params);
		}

		public function doDelete(){
			$params = gett();
			require "models/categoriasModel.php"; 	
			$items = new categoriasModel();
			$items->delete($params);
		}

}