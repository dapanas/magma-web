<?

// MAGMA 1.0
// payments Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class paymentsModel extends ModelBase
{

		public function getAll(){
			$consulta = $this->db->prepare("SELECT * FROM payments ");
			$consulta->execute();
			return $consulta->fetchAll();
		}

		public function getById($id){
			$consulta = $this->db->prepare("SELECT * FROM payments WHERE id='$id' ");
			$consulta->execute();
			return $consulta->fetch();
		}
	
		public function add($params){
			$consulta = $this->db->prepare("INSERT INTO payments (payment_date,accountsId,payment_qty) VALUES ('".$params['payment_date']."','".$params['accountsId']."','".$params['payment_qty']."')");
			$consulta->execute();
		}

		public function edit($params){
			$consulta = $this->db->prepare("UPDATE payments SET payment_date = '".$params['payment_date']."',accountsId = '".$params['accountsId']."',payment_qty = '".$params['payment_qty']."'  where id='".$params['id']."'");
			$consulta->execute();
		}

		public function delete($params){
			$consulta = $this->db->prepare("DELETE FROM payments where id='".$params['id']."'");
			$consulta->execute();
		}
}
