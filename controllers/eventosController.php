<?
// MAGMA
// eventos Controller
// 01-2013
// Beto Ayesa contacto@phpninja.info


class eventosController extends ControllerBase
{
	/*
	public function index(){
		require "models/eventosModel.php";
		$items = new eventosModel();
		$data = array(
			"title" => "Page Title",
			"items" => $items->getAll()
		);

		$this->view->show("eventos.php", $data);
	}
		
	public function detail(){
		$params = gett();
		require "models/eventosModel.php";
		$items = new eventosModel();

		$data = array(
			"title" => "Page Title",
			"items" => $items->getById($params["a"])
		);

		$this->view->show("eventosDetail.php", $data);
	}
	*/

	function tpvok() {
		$this->view->show("eventos/tpv_ok.php", array());
	}

	function tpvko() {
		$this->view->show("eventos/tpv_error.php", array());
	}

	public function add() {
		/*if (session_status() != PHP_SESSION_ACTIVE) {
			header("Location: /");
		}*/

		include "models/selectsModel.php";
		$selects = new selectsModel();
		$params = gett();
		$destacado = $params['a'] != -1 ? 1 :  -1;
		$_SESSION['periodo'] = isset($params['periodo']) ? $params['periodo'] : "";
		
		if (isset($params['fecha_publi_ini'])) {
			$aux = explode("/",$params['fecha_publi_ini']);
			$params['fecha_publi_ini'] = $aux[2]."-".$aux[1]."-".$aux[0];
			$params['fecha_publi_end'] = date("Y-m-d", strtotime($params['fecha_publi_ini']." +".$params['periodo']." week"));
		} else {
			$params['fecha_publi_ini'] = '0000-00-00';
			$params['fecha_publi_end'] = '0000-00-00';
		}
		
		$data = array(
			"title" => "Page Title",
			"radioCategorias" => $selects->radiosCategorias(),
			"radioSubcategorias"=> $selects->radiosSubcategorias(),
			"selectMunicipios"=> $selects->selectMunicipios(),
			"destacado" => $destacado != -1 ? 1 : 0,
			"params" => $params
		);

		$this->view->show("eventos/evento-info.php", $data);
	}

	public function doAdd() {
		$params = gett();
		
		$lang = $_SESSION['lang'];
		$params['fecha_registro'] = Date('Y-m-d');
		$params['publicado'] = 0;
		$params['confirmado'] = 0;
		$params['accountsId'] = $_SESSION['accountId'];

		$params['imagen'] = upload_image('imagen', 265, 265, 'eventos');

		$auxCategorias = array();
		$auxSubcategorias = array();

		foreach ($params['subcategoriasId'] as $subcategoria) {
			$aux = explode("|", $subcategoria);
			array_push($auxSubcategorias, $aux[0]);
			array_push($auxCategorias, $aux[1]);
		}

		$params['subcategoriasId'] = implode(",", $auxSubcategorias);
		$params['categoriasId'] = implode(",", $auxCategorias);
		
		$params['dias_semana'] = isset($params['dias_semana']) ? implode(",",$params['dias_semana']) : "";
		
		if (isset($params['tipo_horario']) && $params['tipo_horario'] == 1) {
			$params['horario'] = '';
			$params['hora_inicio'] = $params['horario1'];
			$params['hora_final'] = $params['horario2'];
			$params['hora_inicio2'] = '';
			$params['hora_final2'] = '';

			if ($params['hora_inicio'] == $params['hora_final']) {
				$params['hora_inicio'] = $params['hora_final'] = ""; // Lo limpiamos
			}

		} elseif (isset($params['tipo_horario']) && $params['tipo_horario'] == 2) {
			$params['horario'] = '';
			$params['hora_inicio'] = $params['horario3'];
			$params['hora_final'] = $params['horario4'];
			$params['hora_inicio2'] = $params['horario5'];
			$params['hora_final2'] = $params['horario6'];

			if ($params['hora_inicio'] == $params['hora_final']) {
				$params['hora_inicio'] = $params['hora_final'] = ""; 
				$params['hora_inicio2'] = $params['hora_final2'] = ""; // Limpiamos ambos
			}

			if ($params['hora_inicio2'] == $params['hora_final2']) {
				$params['hora_inicio2'] = $params['hora_final2'] = ""; // Lo limpiamos
			}

		} else {
			$params['horario'] = "";
			$params['hora_inicio'] = "";
			$params['hora_final'] = "";
			$params['hora_inicio2'] = "";
			$params['hora_final2'] = "";
		}

		if ($params['tipo_pago'] == 1) {
			$params['precio'] = 0;
			$params['anticipada'] = 0;
		} else {
			$params['precio'] = $params['taquilla_unidad'].".".$params['taquilla_decimal'];

			if (isset($params['anticipada'])) {
				$params['anticipada'] = $params['anticipada_unidad'].".".$params['anticipada_decimal'];
			} else {
				$params['anticipada'] = 0;
			}
		}
		
		if ($params['tipo_cuando'] == 1) {
			$params['fecha_inicio'] = $params['fecha1'];
			$params['fecha_fin'] = $params['fecha1'];
		} else {
			$params['fecha_inicio'] = $params['fecha2'];
			$params['fecha_fin'] = $params['fecha3'];
		}
		
		if ($lang =='esp') {
			$params['titulo_cat'] = '';
			$params['descripcion_cat'] = '';

			$params['descripcion_esp'] = $params['descripcion_esp'] != -1 ? $params['descripcion_esp'] : "";
		} else {
			$params['titulo_esp'] = '';
			$params['descripcion_esp'] = '';

			$params['descripcion_cat'] = $params['descripcion_cat'] != -1 ? $params['descripcion_cat'] : "";
		}

		$params['telf'] = isset($params['telf']) && $params['telf'] != -1 ? $params['telf'] : "";
		$params['email'] = isset($params['email']) && $params['email'] != -1 ? $params['email'] : "";
		$params['web'] = isset($params['web']) && $params['web'] != -1 ? $params['web'] : "";

		require "models/eventosModel.php"; 	
		$items = new eventosModel();
		require "models/accountsfacturacionModel.php"; 	
		$itemsx = new accountsfacturacionModel();
		$eventoId = $items->add($params);
		
		$data = array(
			"destacado" => $params['destacado'],
			"periodo" => $params['periodo'],
			"params"  => $params,
			"facturacion" => $itemsx->getById($_SESSION['accountId']),
			"items" => $items->getById($eventoId)
		);

		$this->view->show("eventos/evento-resumen.php", $data);
	}

	public function destacado() {
		include "models/selectsModel.php";
		$selects = new selectsModel();
		$params = gett();
		$destacado = 1;
					
		$data = array(
			"title" => "Page Title",
			"radioCategorias" => $selects->radiosCategorias(),
			"radioSubcategorias"=> $selects->radiosSubcategorias(),
			"selectMunicipios"=> $selects->selectMunicipios(),
			"destacado" => $destacado != -1 ? 1 : 0
		);	          

		$this->view->show("eventos/publicar-destacado.php", $data);
	}

	public function user() {
		$params = gett();
		require "models/eventosModel.php";
		$items = new eventosModel();
		$data = array(
			"title" => "Page Title",
			"items_ahora" => $items->getByUserAhora($_SESSION['accountId']),
			"items_anteriores" => $items->getByUserAnteriores($_SESSION['accountId']),
			"destacados_ahora" =>$items->getDestacadosByUserAhora($_SESSION['accountId']),
			"destacados_anteriores" =>$items->getDestacadosByUserAnteriores($_SESSION['accountId'])
		);	          

		$this->view->show("eventos/historial-publicaciones.php", $data);
	}

	public function search() {
		$params = gett();
		require "models/eventosModel.php";
		$items = new acccountsModel();

		$json = new Services_JSON();
		$data = array(
			"json_items" =>  $json->encode($items->search($params))
		);
		
		$this->view->show("json.php", $data, false);
	}

	public function edit() {
		$params = gett();
		require_once "models/eventosModel.php";
		require_once "models/selectsModel.php";
		
		$items = new eventosModel();
		$selects = new selectsModel();

		if ($items->isCanceled($params['a'])) {
			$this->view->show("eventos/evento-cancelado.php");
			return;
		}

		$destacado = $params['a'] != -1 ? 1 :  -1;
		$_SESSION['periodo'] = isset($params['periodo']) ? $params['periodo'] : "";
		
		if (isset($params['fecha_publi_ini'])) {
			$aux = explode("/",$params['fecha_publi_ini']);
			$params['fecha_publi_ini'] = $aux[2]."-".$aux[1]."-".$aux[0];
			$params['fecha_publi_end'] = date("Y-m-d", strtotime($params['fecha_publi_ini']." +".$params['periodo']." week"));
		} else {
			$params['fecha_publi_ini'] = '0000-00-00';
			$params['fecha_publi_end'] = '0000-00-00';
		}
		
		$items = $items->getById($params['a']);

		$data = array(
			"title" => "Page Title",
			"op" => "edit",
			"items" => $items,
			"radioCategorias" => $selects->radiosCategorias(),
			"radioSubcategorias"=> $selects->radiosSubcategorias($items['subcategoriasId']),
			"selectMunicipios"=> $selects->selectMunicipios($items['municipiosId']),
			"destacado" => $destacado != -1 ? 1 : 0
		);	          
		
		$this->view->show("eventos/evento-editar.php", $data);
	}

	public function doEdit() {
		$params = gett();

		require "models/eventosModel.php"; 	
		$items = new eventosModel();

		if ($items->isCanceled($params['eventosId'])) {
			$this->view->show("eventos/evento-cancelado.php");
			return;
		}
		
		$lang = $_SESSION['lang'];
		$params['fecha_actualizacion'] = Date('Y-m-d H:i:s');
		$params['publicado'] = 0;
		$params['confirmado'] = 0;
		$params['accountsId'] = $_SESSION['accountId'];
		$params['id'] = $params['eventosId'];

		$aux_imagen = upload_image('imagen_new', 265, 265, 'eventos');

		if ($aux_imagen !== false) {
			$params['imagen'] = $aux_imagen;
		}

		$auxCategorias = array();
		$auxSubcategorias = array();

		foreach ($params['subcategoriasId'] as $subcategoria) {
			$aux = explode("|", $subcategoria);
			array_push($auxSubcategorias, $aux[0]);
			array_push($auxCategorias, $aux[1]);
		}

		$params['subcategoriasId'] = implode(",", $auxSubcategorias);
		$params['categoriasId'] = implode(",", $auxCategorias);
		
		$params['dias_semana'] = isset($params['dias_semana']) ? implode(",",$params['dias_semana']) : "";
		
		if (isset($params['tipo_horario']) && $params['tipo_horario'] == 1) {
			$params['horario'] = '';
			$params['hora_inicio'] = $params['horario1'];
			$params['hora_final'] = $params['horario2'];
			$params['hora_inicio2'] = '';
			$params['hora_final2'] = '';

			if ($params['hora_inicio'] == $params['hora_final']) {
				$params['hora_inicio'] = $params['hora_final'] = ""; // Lo limpiamos
			}

		} elseif (isset($params['tipo_horario']) && $params['tipo_horario'] == 2) {
			$params['horario'] = '';
			$params['hora_inicio'] = $params['horario3'];
			$params['hora_final'] = $params['horario4'];
			$params['hora_inicio2'] = $params['horario5'];
			$params['hora_final2'] = $params['horario6'];

			if ($params['hora_inicio'] == $params['hora_final']) {
				$params['hora_inicio'] = $params['hora_final'] = ""; 
				$params['hora_inicio2'] = $params['hora_final2'] = ""; // Limpiamos ambos
			}

			if ($params['hora_inicio2'] == $params['hora_final2']) {
				$params['hora_inicio2'] = $params['hora_final2'] = ""; // Lo limpiamos
			}

		} else {
			$params['horario'] = "";
			$params['hora_inicio'] = "";
			$params['hora_final'] = "";
			$params['hora_inicio2'] = "";
			$params['hora_final2'] = "";
		}

		if ($params['tipo_pago'] == 1) {
			$params['precio'] = 0;
			$params['anticipada'] = 0;
		} else {
			$params['precio'] = $params['taquilla_unidad'].".".$params['taquilla_decimal'];

			if (isset($params['anticipada'])) {
				$params['anticipada'] = $params['anticipada_unidad'].".".$params['anticipada_decimal'];
			} else {
				$params['anticipada'] = 0;
			}
		}
		
		if ($params['tipo_cuando'] == 1) {
			$params['fecha_inicio'] = $params['fecha1'];
			$params['fecha_fin'] = $params['fecha1'];
		} else {
			$params['fecha_inicio'] = $params['fecha2'];
			$params['fecha_fin'] = $params['fecha3'];
		}
		
		if ($lang =='esp') {
			$params['titulo_cat'] = '';
			$params['descripcion_cat'] = '';

			$params['descripcion_esp'] = $params['descripcion_esp'] != -1 ? $params['descripcion_esp'] : "";
		} else {
			$params['titulo_esp'] = '';
			$params['descripcion_esp'] = '';

			$params['descripcion_cat'] = $params['descripcion_cat'] != -1 ? $params['descripcion_cat'] : "";
		}

		$params['telf'] = isset($params['telf']) && $params['telf'] != -1 ? $params['telf'] : "";
		$params['email'] = isset($params['email']) && $params['email'] != -1 ? $params['email'] : "";
		$params['web'] = isset($params['web']) && $params['web'] != -1 ? $params['web'] : "";

		$items->edit($params);

		header("location: ../eventos/detalle/".$params['id']);
	}

	public function detalle() {
		$params = gett();
		require "models/eventosModel.php"; 	
		$items = new eventosModel();

		$data = array(
			"title" => "Page Title",
			"op" => "edit",
			"items" => $items->getById($params["a"])
		);	          
		
		$this->view->show("eventos/evento-resumen.php", $data);
	}

	public function facturacionDestacado() {
		$params = gett();
		require "models/accountsfacturacionModel.php"; 	
		$items = new accountsfacturacionModel();
		require "models/selectsModel.php"; 	
		$selects = new selectsModel();
		$account = $items->getById($_SESSION['accountId']) ;
		
		$data = array(
			"title" => "Page Title",
			"eventosId" =>  $params['a'],
			"items" => $account,
			"selectMunicipios" => $selects->selectMunicipios($account['municipiosId'])
		);

		$this->view->show("eventos/evento-facturacion.php", $data);
	}

	public function confirmar() {
		$params = gett();
		require "models/eventosModel.php";
		$items = new eventosModel();
		
		$data = array(
			"title" => "Page Title",
			"eventosId" => $params['a'],
			"destacado" => isset($params['destacado']) ? $params['destacado'] : 0,
			"items" => $items->getById($params["a"])
		);	          
		
		$this->view->show("eventos/evento-confirmacion.php", $data);
	}

	public function doConfirmar() {
		$params = gett();
		require "models/eventosModel.php";
		$items = new eventosModel();
		$items->confirmar($params['a']);
		header("location: ../../eventos/user");
	}

	public function delete() {
		$params = gett();
		require "models/eventosModel.php";
		$items = new eventosModel();

		if ($items->isCanceled($params['a'])) {
			$this->view->show("eventos/evento-cancelado.php");
			return;
		}
		
		$data = array(
			"title" => "Page Title",
			"eventosId" => $params['a'],
			"destacado" => isset($params['destacado']) ? $params['destacado'] : 0,
			"items" => $items->getById($params["a"])
		);	          
		
		$this->view->show("eventos/evento-cancelacion.php", $data);
	}

	public function doDelete() {
		$params = gett();
		require "models/eventosModel.php";
		$items = new eventosModel();
		// TODO: Validar que el evento sea del usuario

		$items = new eventosModel();

		if ($items->isCanceled($params['a'])) {
			$this->view->show("eventos/evento-cancelado.php");
			return;
		}

		$items->cancel($params['id']);

		header("Location: ../eventos/user");
	}
}