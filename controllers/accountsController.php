<?
// MAGMA
// accounts Controller
// 01-2013
// Beto Ayesa contacto@phpninja.info


class accountsController extends ControllerBase
{
		public function index() {
			require "models/accountsModel.php";
			require "models/selectsModel.php";
			
			$items = new accountsModel();
			$selects = new selectsModel();
			
			$accountsId = $_SESSION['accountId'];
			$account = $items->getById($accountsId);
			
			$data = array(
				"title" => "Page Title",
				"items" => $account,
				"selectMunicipios" => $selects->selectMunicipios($account['municipiosId'])
		    );
			
			$params = gett();

			$page = isset($params['a']) ? $params['a'] : -1;
			if ($page == -1)
				$this->view->show("accounts/cuenta.php", $data);
			else if ($page == 'user')
				$this->view->show("accounts/cambiar-nombre.php", $data);
			else if ($page == 'email')
				$this->view->show("accounts/cambiar-correo.php", $data);
			else if ($page == 'password')
				$this->view->show("accounts/cambiar-pass.php", $data);
			else if ($page == 'contacto')
				$this->view->show("accounts/contacto.php", $data);
			/*
			else if ($page == 'editcontacto')
				$this->view->show("datos/contacto.php", $data);	
			*/
			else if ($page == 'facturacion')
				$this->view->show("accounts/facturacion-modificar.php", $data);
		}
		
		/*
		public function detail(){
			$params = gett();
			require "models/accountsModel.php"; 	
			$items = new accountsModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])
			      );	          
			$this->view->show("accountsDetail.php", $data);
		}
		*/

		public function comprarCreditos() {
			$accountsId = $_SESSION['accountId'];
			require "models/accountsModel.php"; 	
			require "models/selectsModel.php"; 	
			$select = new selectsModel();
			$items = new accountsModel();
			$data = Array( "title" => "Page Title", "packs" => $select->packsCreditos())     ;	          
			$this->view->show("creditos/compra.php", $data);
		}
		
		public function creditosDisponibles() {
			$accountsId = $_SESSION['accountId'];
			require "models/accountsModel.php"; 	
			$items = new accountsModel();
			$data = Array( "title" => "Page Title", "saldo" => $items->getSaldoDisponible($accountsId))     ;	          
			$this->view->show("creditos/credito-disponible.php", $data);
		}
		
		public function add() {
			include "models/selectsModel.php";
			$selects = new selectsModel();
			$data = array(
				"selectMunicipios"=> $selects->selectMunicipios()
			);
			
			$this->view->show("accounts/newaccount.php", $data);
		}

		public function doAdd() {
			$params = gett();
			require "models/accountsModel.php"; 	

			$items = new accountsModel();

			if ($items->usernameExists($params['username'])) {
				echo "El nombre de usuario ya está siendo usado.";
			} else if ($items->emailExists($params['email'])) {
				echo "El correo electrónico ya está en uso.";
			} else {
				
				$_POST['fecha_nacimiento'] = $params['dia']."/".$params['mes']."/".$params['ano'];
				require "models/ormModel.php"; 	
				
				$items = new ormModel();
				$accountsId = $items->POST('accounts');
				$_POST['accountsId']=$accountsId;
				$facturacion = $items->POST('accounts_facturacion');

				include_once "lib/EmailSend.php";
				$email = new EmailSend();
				$email->sendEmail('newaccount.php',
					array(
						"email"=> $params['email']),
					'Bienvenido a MAGMA',
					array(
						$params['email'])
				);
				
				echo '1';
			}
		}
		
		/*
		public function search(){
			$params = gett();
			require "models/accountsModel.php"; 	
			$items = new acccountsModel();
	
			$json = new Services_JSON();	
			$data = Array( "json_items" =>  $json->encode($items->search($params))	);         
			$this->view->show("json.php", $data,false);
		}
		*/
	
		/*
		public function edit(){
			$params = gett();
			require "models/accountsModel.php"; 	
			$items = new accountsModel();
			$data = Array(
				  "title" => "Page Title",
				  "items" => $items->getById($params["a"])         
		          );	          
			$this->view->show("forms/accountsForm.php", $data);
		}
		*/

		public function doEdit() {
			$params = gett();

			require_once "models/accountsModel.php";
			$items = new accountsModel();

			$correoModificado = false;
			$informacionValida = true;

			if (isset($params['username'])) { // Estamos cambiando el username

				$aux_username = $items->getUsernameById($_SESSION['accountId']);

				if (strcmp($aux_username['username'], $params['username']) == 0) {
					$informacionValida = false;
					echo "Seleccionó el mismo nombre de usuario";
				} else if ($items->usernameExists($params['username'])) {
					$informacionValida = false;
					echo "El nombre de usuario seleccionado ya está en uso";
				}

			} else if (isset($params['email'])) { // Estamos cambiando el correo
				$aux_email = $items->getEmailById($_SESSION['accountId']);

				if (strcmp($params['email'], $params['email_verificacion']) != 0) {
					$informacionValida = false;
					echo "No coinciden los correos electrónicos ingresados";
				} else if ($items->emailExists($params['email'])) {
					$informacionValida = false;
					echo "El correo electrónico seleccionado ya está en uso";
				} elseif (strcmp($aux_email['email'], $params['email']) == 0) {
					$informacionValida = false;
					echo "Seleccionó el mismo correo electrónico";
				}

				$correoModificado = true;

			} else if (isset($params['password'])) { // Estamos cambiando el password
				if (strcmp($params['password'], $params['confpassword']) != 0) {
					$informacionValida = false;
					echo "Las contraseñas no coinciden";
				}
			} else if (isset($_POST['ano'])) { // Estamos actualizando toda la información de contacto (se usa la validación vieja)
				$_POST['fecha_nacimiento'] = $_POST['dia']."/".$_POST['mes']."/".$_POST['ano'];
			}

			if ($informacionValida) {
				require "models/ormModel.php"; 	
				$items = new ormModel();
				$items->PUT('accounts', $_SESSION['accountId']);

				if ($correoModificado) {
					include_once "lib/EmailSend.php";
					$email = new EmailSend();
					$email->sendEmail('emailchanged.php',
						array(
							"email"=> $params['email']),
						'[MAGMA] Datos actualizados: Dirección de correo modificada',
						array(
							$params['email'])
					);
				}

				echo "1";
			}
		}

		/*
		public function doDelete(){
			$params = gett();
			require "models/accountsModel.php"; 	
			$items = new accountsModel();
			$items->delete($params);
		}
		*/

		public function recuperarPassword() {
			$data = array();
			$this->view->show("login-remember.php", $data);
		}

		public function doRecuperarPassword() {
			$params = gett();
			$new_p = generar_cadena_random(6);

			require_once "models/accountsModel.php";
			require_once "models/ormModel.php";
			require_once "lib/EmailSend.php";
			
			$account = new accountsModel();
			$email = new EmailSend();
			$items = new ormModel();
			
			$_POST['password'] = $new_p;

			$aux_validacion_id = $account->getIdByUsername($params['username']);
			$aux_validacion_email = $account->getEmailByUsername($params['username']);

			if ($aux_validacion_id !== false) {
				$params += $aux_validacion_id;
				$params += $aux_validacion_email;

				$items->PUT('accounts', $params['id']);
				$email->SendEmail('login-remember-password.php',
				array(
					"password" => $new_p),
				'MAGMA Recuperar Password',
				array(
					$params['email'])
				);

				echo "1";
			} else {
				echo "No hay un usuario registrado con ese nombre de usuario.";
			}
		}

		public function doRecuperarUsuario() {
			$params = gett();

			require_once "models/accountsModel.php";
			require_once "lib/EmailSend.php";
			
			$account = new accountsModel();
			$email = new EmailSend();

			$aux_validacion_username = $account->getUsernameByEmail($params['email']);

			if ($aux_validacion_username !== false) {
				$params += $aux_validacion_username;

				$email->SendEmail('login-remember-username.php',
				array(
					"username" => $params['username']),
				'MAGMA Recuperar Usuario',
				array(
					$params['email'])
				);

				echo "1";
			} else {
				echo "No hay un usuario registrado con ese correo.";
			}

		}
		
		public function activateAccount() {
			$params = gett();
			include "models/accountsModel.php";
			$accounts = new accountsModel();
			$accounts->activateAccount($params['a']);
			header("location: ../../login/index/activate");
		}

}