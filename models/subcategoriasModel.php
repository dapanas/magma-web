<?

// MAGMA 1.0
// subcategorias Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class subcategoriasModel extends ModelBase
{

		public function getAll(){
			$consulta = $this->db->prepare("SELECT * FROM subcategorias order by subcategoria_cat,subcategoria_esp ASC ");
			$consulta->execute();
			return $consulta->fetchAll();
		}

		public function getById($id){
			$consulta = $this->db->prepare("SELECT * FROM subcategorias WHERE categoriasId='$id' ");
			$consulta->execute();
			return $consulta->fetchAll();
		}
	
		public function add($params){
			$consulta = $this->db->prepare("INSERT INTO subcategorias (categoriasId,subcategoria_esp,subcategoria_cat) VALUES ('".$params['categoriasId']."','".$params['subcategoria_esp']."','".$params['subcategoria_cat']."')");
			$consulta->execute();
		}

		public function edit($params){
			$consulta = $this->db->prepare("UPDATE subcategorias SET categoriasId = '".$params['categoriasId']."',subcategoria_esp = '".$params['subcategoria_esp']."',subcategoria_cat = '".$params['subcategoria_cat']."'  where id='".$params['id']."'");
			$consulta->execute();
		}

		public function delete($params){
			$consulta = $this->db->prepare("DELETE FROM subcategorias where id='".$params['id']."'");
			$consulta->execute();

		}
}
