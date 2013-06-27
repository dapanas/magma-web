<?

// MAGMA 1.0
// accountsfacturacion Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class accountsfacturacionModel extends ModelBase
{

		public function getAll(){
			$consulta = $this->db->prepare("SELECT * FROM accountsfacturacion ");
			$consulta->execute();
			return $consulta->fetchAll();
		}

		public function getById($id){
			$consulta = $this->db->prepare("SELECT * FROM accounts_facturacion WHERE accountsId='".$id."' limit 1");
			$consulta->execute();
			return $consulta->fetch();
		}
	
		public function add($accountsId){
			$consulta = $this->db->prepare("INSERT INTO accountsfacturacion (accountsId) VALUES ('".$accountsId."')");
			$consulta->execute();
		}

		public function edit($params){
			$consulta = $this->db->prepare("UPDATE accountsfacturacion SET accountsId = '".$params['accountsId']."',nombre = '".$params['nombre']."',direccion = '".$params['direccion']."',municipio = '".$params['municipio']."',provincia = '".$params['provincia']."',codigopostal = '".$params['codigopostal']."',nifcif = '".$params['nifcif']."'  where id='".$params['id']."'");
			$consulta->execute();
		}

		public function delete($params){
			$consulta = $this->db->prepare("DELETE FROM accountsfacturacion where id='".$params['id']."'");
			$consulta->execute();
		}
}
