<?
// MAGMA
// accountsfacturacion Controller
// 01-2013
// Beto Ayesa contacto@phpninja.info


class accountsfacturacionController extends ControllerBase
{
	public function index() {
		$params = gett();
		require "models/accountsfacturacionModel.php";
		require "models/selectsModel.php";

		$items = new accountsfacturacionModel();
		$selects = new selectsModel();
		
		$account = $items->getById($_SESSION['accountId']);
		
		$data = array(
			"title" => "Page Title",
			"items" => $account,
			"selectMunicipios" => $selects->selectMunicipios($account['municipiosId'])
		);	 
  
		$this->view->show("accounts/facturacion-modificar.php", $data);
	}

	function tpv() {
		$params = gett();
		$this->view->show("eventos/tpv.php", array('eventosId' => $params['a']));
	}

	public function detail() {
		$params = gett();
		require "models/accountsfacturacionModel.php"; 	
		
		$items = new accountsfacturacionModel();
		
		$data = array(
			"title" => "Page Title",
			"items" => $items->getById($params["a"])
		);

		$this->view->show("accountsfacturacionDetail.php", $data);
	}

	public function add() {
		$data = array(
			"title" => "Page Title",
			"items" => array()
		);

		$this->view->show("forms/accountsfacturacionForm.php", $data);
	}

	public function edit() {
		$params = gett();
		require "models/accountsfacturacionModel.php"; 	
		
		$items = new accountsfacturacionModel();
		
		$data = array(
			"title" => "Page Title",
			"items" => $items->getById($_SESSION['accountId'])
		);	 
	                   
		$this->view->show("accounts/facturacion-modificar.php", $data);
	}

	public function doAdd() {
		$params = gett();
		require "models/accountsfacturacionModel.php";

		$items = new accountsfacturacionModel();
		$items->add($params);
	}

	public function doEdit() {
		$params = gett();
		require "models/ormModel.php";

		$items = new ormModel();
		$items->PUT('accounts_facturacion',$_SESSION['accountId']);

		echo "1";
		/*
		$params = gett();
		require "models/accountsfacturacionModel.php"; 	
		$items = new accountsfacturacionModel();
		$items->edit($params);
		*/
	}

	public function doDelete() {
		$params = gett();
		require "models/accountsfacturacionModel.php";

		$items = new accountsfacturacionModel();
		$items->delete($params);
	}
}
