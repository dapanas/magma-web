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
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getAll()
		          );         
			$this->view->show("eventos.php", $data);
		}
		
		public function detail(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])
			      );	          
			$this->view->show("eventosDetail.php", $data);
		}
*/

	function tpvok(){

			$this->view->show("eventos/tpv_ok.php", array());		
		}
		function tpvko(){
			$this->view->show("eventos/tpv_error.php", array());
		}
		

		public function add(){
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
			
			$data = Array( "title" => "Page Title",		"radioCategorias" => $selects->radiosCategorias(),
				"radioSubcategorias"=> $selects->radiosSubcategorias(),
				"selectMunicipios"=> $selects->selectMunicipios() ,
				"destacado" => $destacado != -1 ? 1 : 0   ,
				"params" => $params  );	          

			$this->view->show("eventos/evento-info.php", $data);
		}
		
		
		public function destacado(){
			include "models/selectsModel.php";
			$selects = new selectsModel();
			$params = gett();
			$destacado = 1;
						
			$data = Array( "title" => "Page Title",		"radioCategorias" => $selects->radiosCategorias(),
				"radioSubcategorias"=> $selects->radiosSubcategorias(),
				"selectMunicipios"=> $selects->selectMunicipios() ,
				"destacado" => $destacado != -1 ? 1 : 0     );	          

			$this->view->show("eventos/publicar-destacado.php", $data);
			
		}
		
		
		public function user(){
		
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$data = Array(
				  "title" => "Page Title",
				  "items_ahora" => $items->getByUserAhora($_SESSION['accountId']),
				  "items_anteriores" => $items->getByUserAnteriores($_SESSION['accountId']),
				  "destacados_ahora" =>$items->getDestacadosByUserAhora($_SESSION['accountId']),
				  "destacados_anteriores" =>$items->getDestacadosByUserAnteriores($_SESSION['accountId'])
			      );	          
			$this->view->show("eventos/historial-publicaciones.php", $data);
		}
		
		
		public function search(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new acccountsModel();
	
			$json = new Services_JSON();	
			$data = Array( "json_items" =>  $json->encode($items->search($params))	);         
			$this->view->show("json.php", $data,false);
		}
		public function edit(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$data = Array(
				  "title" => "Page Title",
				  "op" => "edit",
				  "items" => $items->getById($params["a"])         
		          );	          
			$this->view->show("eventos/evento-editar.php", $data);
		}
	public function detalle(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$data = Array(
				  "title" => "Page Title",
				  "op" => "edit",
				  "items" => $items->getById($params["a"])         
		          );	          
			$this->view->show("eventos/evento-resumen.php", $data);
		}
		public function doAdd() {
			$params = gett();
			
			$lang = $_SESSION['lang'];
			$params['fecha_registro'] = Date('Y-m-d');
			$params['publicado'] = 0;
			$params['confirmado'] = 0;
			$params['accountsId'] = $_SESSION['accountId'];
			$aux = explode("|",$params['subcategoriasId'] );
			$params['subcategoriasId']  = $aux[0];
			$params['categoriasId'] = $aux[1];
			$params['dias_semana'] = isset($params['dias_semana']) ? implode(",",$params['dias_semana']) : "";
			
			if (isset($params['tipo_horario']) && $params['tipo_horario'] == 1) {
				$params['horario']='';
				$params['hora_inicio']= $params['horario1_hora'].":".$params['horario1_minuto'];
				$params['hora_final']=$params['horario2_hora'].":".$params['horario2_minuto'];
				$params['hora_inicio2']='';
				$params['hora_final2']='';

				if ($params['hora_inicio'] == $params['hora_final']) {
					$params['hora_inicio'] = $params['hora_final'] = ""; // Lo limpiamos
				}

			} elseif (isset($params['tipo_horario']) && $params['tipo_horario'] == 2) {
				$params['horario']='';
				$params['hora_inicio']= $params['horario3_hora'].":".$params['horario3_minuto'];
				$params['hora_final']=$params['horario4_hora'].":".$params['horario4_minuto'];
				$params['hora_inicio2']= $params['horario5_hora'].":".$params['horario5_minuto'];
				$params['hora_final2']=$params['horario6_hora'].":".$params['horario6_minuto'];

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

			if ($params['tipo_pago'] ==1){
				$params['precio'] = 0;
				$params['anticipada'] = 0;
			}else{
				$params['precio'] = $params['taquilla_unidad'].".".$params['taquilla_decimal'];

				if (isset($params['anticipada'])){
					$params['anticipada'] = $params['anticipada_unidad'].".".$params['anticipada_decimal'];
				} else {
					$params['anticipada'] = 0;
				}
			}
			if ($params['tipo_cuando'] == 1){
				$params['fecha_inicio'] = $params['fecha1_ano']."-".$params['fecha1_mes']."-".$params['fecha1_dia'];
				$params['fecha_fin'] = $params['fecha1_ano']."-".$params['fecha1_mes']."-".$params['fecha1_dia'];
			} else {
				$params['fecha_inicio'] = $params['fecha2_ano']."-".$params['fecha2_mes']."-".$params['fecha2_dia'];
				$params['fecha_fin'] = $params['fecha3_ano']."-".$params['fecha3_mes']."-".$params['fecha3_dia'];
			}
			
			if ($lang =='esp') {
				$params['titulo_cat'] ='';
				$params['descripcion_cat'] = '';

				$params['descripcion_esp'] = $params['descripcion_esp'] != -1 ? $params['descripcion_esp'] : "";
			} else {
				$params['titulo_esp'] ='';
				$params['descripcion_esp'] = '';

				$params['descripcion_cat'] = $params['descripcion_cat'] != -1 ? $params['descripcion_cat'] : "";
			}

			$params['telf'] = isset($params['telf']) && $params['telf'] != -1 ? $params['telf'] : "";
			$params['email'] = isset($params['email']) && $params['email'] != -1 ? $params['email'] : "";
			$params['web'] = isset($params['web']) && $params['web'] != -1 ? $params['web'] : "";
			
			$params['imagen'] = upload_image('imagen',265,265,'eventos');
			//echo "X".$params['imagen'];
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
		
		public function facturacionDestacado(){
		
			$params = gett();
			require "models/accountsfacturacionModel.php"; 	
			$items = new accountsfacturacionModel();
			require "models/selectsModel.php"; 	
			$selects = new selectsModel();
			$account = $items->getById($_SESSION['accountId']) ;
			$data = Array(
				  "title" => "Page Title",
				"eventosId" =>  $params['a'],
				  "items" => $account        ,
				  "selectMunicipios" => $selects->selectMunicipios($account['municipiosId'])
		          );	 
		                   
				
				
				$this->view->show("eventos/evento-facturacion.php",$data);

		
		}
		
		public function confirmar(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$data = Array(
				  "title" => "Page Title",
				  "eventosId" => $params['a'],
				  "destacado" => isset($params['destacado']) ? $params['destacado'] : 0,
				  "items" => $items->getById($params["a"])
			      );	          
			$this->view->show("eventos/evento-confirmacion.php", $data);
		
		}
		
		public function doConfirmar(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$items->confirmar($params['a']);
			header("location: ../../eventos/user");
		}

		public function doEdit(){
		/*
	$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$items->edit($params);
*/

			$params = gett();
			if(isset($_POST['ano']))
			$_POST['fecha_nacimiento'] = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];

			require "models/ormModel.php"; 	
			$items = new ormModel();
			$items->PUT('eventos',$params['eventosId']);
			header("location: ../accounts/index");
			
		}

		public function doDelete(){
			$params = gett();
			require "models/eventosModel.php"; 	
			$items = new eventosModel();
			$items->delete($params);
		}

}