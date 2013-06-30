<?

// MAGMA 1.0
// accounts Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class accountsModel extends ModelBase
{
		public function getAll(){
			$consulta = $this->db->prepare("SELECT * FROM accounts ");
			$consulta->execute();
			return $consulta->fetchAll();
		}

		public function getById($id){
			$consulta = $this->db->prepare("SELECT * FROM accounts WHERE id='$id' ");
			$consulta->execute();
			return $consulta->fetch();
		}
	
		public function add($params){
			$consulta = $this->db->prepare("INSERT INTO accounts (email,username,password,nombre,apellidos,fecha_nacimiento,empresa,telf,direccion,municipio,provincia,codigopostal) VALUES ('".$params['email']."','".$params['username']."','".$params['password']."','".$params['nombre']."','".$params['apellidos']."','".$params['fecha_nacimiento']."','".$params['empresa']."','".$params['telf']."','".$params['direccion']."','".$params['municipiosId']."','".$params['provincia']."','".$params['codigopostal']."')");
			$consulta->execute();
		}
		
		public function activateAccount($email){
			$consulta = $this->db->prepare("UPDATE accounts SET active='1' where email='".$email."'");
			$consulta->execute();
		}

		public function edit($params){
			$consulta = $this->db->prepare("UPDATE accounts SET email = '".$params['email']."',username = '".$params['username']."',password = '".$params['password']."',nombre = '".$params['nombre']."',apellidos = '".$params['apellidos']."',fecha_nacimiento = '".$params['fecha_nacimiento']."',empresa = '".$params['empresa']."',telf = '".$params['telf']."',direccion = '".$params['direccion']."',municipio = '".$params['municipio']."',provincia = '".$params['provincia']."',codigopostal = '".$params['codigopostal']."'  where id='".$params['id']."'");
			$consulta->execute();
		}

		public function delete($params){
			$consulta = $this->db->prepare("DELETE FROM accounts where id='".$params['id']."'");
			$consulta->execute();
		}
		
		
		public function getSaldoDisponible($id){
			$consulta = $this->db->prepare('SELECT SUM(payment_qty) as saldo FROM payments where accountsId="'.$id.'"');
			$consulta->execute();
			$aux = $consulta->fetch();
			return $aux['saldo'] > 0? $aux['saldo'] : 0;
		}

		public function getIdByUsername($username) {
			$consulta = $this->db->prepare("SELECT id FROM accounts WHERE username='$username' ");
			$consulta->execute();
			return $consulta->fetch();
		}

		public function getUsernameById($id) {
			$consulta = $this->db->prepare("SELECT username FROM accounts WHERE id='$id' ");
			$consulta->execute();
			return $consulta->fetch();
		}

		public function getEmailById($id) {
			$consulta = $this->db->prepare("SELECT email FROM accounts WHERE id='$id' ");
			$consulta->execute();
			return $consulta->fetch();
		}

		public function getEmailByUsername($username) {
			$consulta = $this->db->prepare("SELECT email FROM accounts WHERE username='$username' ");
			$consulta->execute();
			return $consulta->fetch();
		}

		public function getUsernameByEmail($email) {
			$consulta = $this->db->prepare("SELECT username FROM accounts WHERE email='$email' ");
			$consulta->execute();
			return $consulta->fetch();
		}

		public function usernameExists($username) {
			$consulta = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM accounts WHERE username='$username') AS resultado");
			$consulta->execute();

			$resultado = $consulta->fetch();
			return $resultado['resultado'] ? true : false;
		}

		public function emailExists($email) {
			$consulta = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM accounts WHERE email='$email') AS resultado");
			$consulta->execute();

			$resultado = $consulta->fetch();
			return $resultado['resultado'] ? true : false;
		}
}
