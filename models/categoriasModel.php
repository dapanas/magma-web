<?

// MAGMA 1.0
// categorias Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class categoriasModel extends ModelBase
{

		public function getAll(){
			$consulta = $this->db->prepare("SELECT * FROM categorias order by categoria_esp,categoria_cat ASC");
			$consulta->execute();
			return $consulta->fetchAll();
		}

		public function getById($id){
			$consulta = $this->db->prepare("SELECT * FROM categorias WHERE id='$id' ");
			$consulta->execute();
			return $consulta->fetch();
		}
	
		public function add($params){
			$consulta = $this->db->prepare("INSERT INTO categorias (categoria_esp,categoria_cat) VALUES ('".$params['categoria_esp']."','".$params['categoria_cat']."')");
			$consulta->execute();
		}

		public function edit($params){
			$consulta = $this->db->prepare("UPDATE categorias SET categoria_esp = '".$params['categoria_esp']."',categoria_cat = '".$params['categoria_cat']."'  where id='".$params['id']."'");
			$consulta->execute();
		}

		public function delete($params){
			$consulta = $this->db->prepare("DELETE FROM categorias where id='".$params['id']."'");
			$consulta->execute();
		}
}
