<?

// MAGMA 1.0
// eventos Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class eventosModel extends ModelBase
{

    public function getAll() {
    	$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_esp,municipios.municipio_cat FROM eventos JOIN municipios ON eventos.municipiosId= municipios.id where  eventos.publicado > 0   order by fecha_inicio  DESC");
		$consulta->execute();

		$aux = $consulta->fetchAll();
		for ($i = 0; $i < count($aux); $i++) {
			$aux_categorias = $this->translateCatsIdsToString($aux[$i]['categoriasId'], $aux[$i]['subcategoriasId']);

			$aux[$i]['categoriasId'] = $aux_categorias['categoriasId'];
			$aux[$i]['subcategoriasId'] = $aux_categorias['subcategoriasId'];
			$aux[$i]['categoria_esp'] = $aux_categorias['categoria_esp'];
			$aux[$i]['categoria_cat'] = $aux_categorias['categoria_cat'];
			$aux[$i]['subcategoria_esp'] = $aux_categorias['subcategoria_esp'];
			$aux[$i]['subcategoria_cat'] = $aux_categorias['subcategoria_cat'];
			$aux[$i]['categoria_esp_txt'] = $aux_categorias['categoria_esp_txt'];
			$aux[$i]['categoria_cat_txt'] = $aux_categorias['categoria_cat_txt'];
		}

		return $aux;
    }
    
    public function getAllDestacados() {
		$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_esp,municipios.municipio_cat FROM eventos JOIN municipios ON eventos.municipiosId= municipios.id where  eventos.publicado > 0  and destacado > 0 order by fecha_inicio  DESC");
		$consulta->execute();

		$aux = $consulta->fetchAll();
		for ($i = 0; $i < count($aux); $i++) {
			$aux_categorias = $this->translateCatsIdsToString($aux[$i]['categoriasId'], $aux[$i]['subcategoriasId']);

			$aux[$i]['categoriasId'] = $aux_categorias['categoriasId'];
			$aux[$i]['subcategoriasId'] = $aux_categorias['subcategoriasId'];
			$aux[$i]['categoria_esp'] = $aux_categorias['categoria_esp'];
			$aux[$i]['categoria_cat'] = $aux_categorias['categoria_cat'];
			$aux[$i]['subcategoria_esp'] = $aux_categorias['subcategoria_esp'];
			$aux[$i]['subcategoria_cat'] = $aux_categorias['subcategoria_cat'];
			$aux[$i]['categoria_esp_txt'] = $aux_categorias['categoria_esp_txt'];
			$aux[$i]['categoria_cat_txt'] = $aux_categorias['categoria_cat_txt'];
		}

		return $aux;
    }

    private function translateCatsIdsToString($cats, $subcats) {
    	/* Convertimos el string con las subcategorias en array */
		$aux = array();
		$subcats = trim($subcats);
		$subcats = str_replace(",,",",",$subcats);
		$auxSubcategorias = explode(",", $subcats);
		
		foreach ($auxSubcategorias as $subcategoria) {
			if ($subcategoria != "" && $subcategoria != '0')
				array_push($aux, $subcategoria);
		}

		$resultado['subcategoriasId'] = $aux;

		/* Convertimos el string con las categorias en array */
		$aux = array();
		$cats = trim($cats);
		$cats = str_replace(",,",",",$cats);
		$auxCategorias = explode(",", $cats);

		foreach ($auxCategorias as $categoria) {
			if ($categoria != "" && $categoria != '0')
				array_push($aux, $categoria);
		}
		$resultado['categoriasId'] = $aux;

    	/* Creamos un array con la información relacionada entre subcategoria y categoria */
		require_once "models/categoriasModel.php";
		require_once "models/subcategoriasModel.php";

		$categoriasModel = new categoriasModel();
		$subcategoriasModel = new subcategoriasModel();

		$resultado['categoria_esp'] = array(); // Limpiamos los valores que venían desde base de datos
		$resultado['categoria_cat'] = array(); // Limpiamos los valores que venían desde base de datos
		$resultado['subcategoria_esp'] = array(); // Limpiamos los valores que venían desde base de datos
		$resultado['subcategoria_cat'] = array(); // Limpiamos los valores que venían desde base de datos

		foreach ($resultado['categoriasId'] as $categoria) {
		if ($categoria != ''):
			$aux = $categoriasModel->getNameById($categoria);

			$resultado['categoria_esp'][$categoria] = array(
				'categoria' => $aux['categoria_esp']
			);
			$resultado['categoria_cat'][$categoria] = array(
				'categoria' => $aux['categoria_cat']
			);
			endif;
		}

		foreach ($resultado['subcategoriasId'] as $subcategoria) {
			if ($subcategoria != ''):
			$aux = $subcategoriasModel->getNameAndCategoryNameById($subcategoria);

			$resultado['subcategoria_esp'][$subcategoria] = array(
				'subcategoria' => $aux['subcategoria_esp'],
				'categoria' => $aux['categoria_esp']
			);

			$resultado['subcategoria_cat'][$subcategoria] = array(
				'subcategoria' => $aux['subcategoria_cat'],
				'categoria' => $aux['categoria_cat']
			);
			endif;
		}

		$aux_esp_txt = array();
		foreach ($resultado['categoria_esp'] as $categoria) {
			array_push($aux_esp_txt, $categoria['categoria']);
		}

		foreach ($resultado['subcategoria_esp'] as $subcategoria) {
			array_push($aux_esp_txt, $subcategoria['subcategoria']);
		}

		$aux_cat_txt = array();
		foreach ($resultado['categoria_cat'] as $categoria) {
			array_push($aux_cat_txt, $categoria['categoria']);
		}

		foreach ($resultado['subcategoria_cat'] as $subcategoria) {
			array_push($aux_cat_txt, $subcategoria['subcategoria']);
		}

		$resultado['categoria_esp_txt'] = implode(" &middot; ", $aux_esp_txt);
		$resultado['categoria_cat_txt'] = implode(" &middot; ", $aux_cat_txt);

		return $resultado;
    }

    public function search($params) {
    	$key = $params['a']; 
    	if ($key == -1) $key = '';
    	
    	$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_esp,municipios.municipio_cat FROM eventos JOIN municipios ON eventos.municipiosId= municipios.id where descripcion_cat LIKE '%".$key."%' or descripcion_esp LIKE '%".$key."%' or titulo_cat LIKE '%".$key."%' or titulo_esp LIKE '%".$key."%'  and publicado > 0 order by fecha_inicio  DESC");
		$consulta->execute();

		$aux = $consulta->fetchAll();
		for ($i = 0; $i < count($aux); $i++) {
			$aux_categorias = $this->translateCatsIdsToString($aux[$i]['categoriasId'], $aux[$i]['subcategoriasId']);

			$aux[$i]['categoriasId'] = $aux_categorias['categoriasId'];
			$aux[$i]['subcategoriasId'] = $aux_categorias['subcategoriasId'];
			$aux[$i]['categoria_esp'] = $aux_categorias['categoria_esp'];
			$aux[$i]['categoria_cat'] = $aux_categorias['categoria_cat'];
			$aux[$i]['subcategoria_esp'] = $aux_categorias['subcategoria_esp'];
			$aux[$i]['subcategoria_cat'] = $aux_categorias['subcategoria_cat'];
			$aux[$i]['categoria_esp_txt'] = $aux_categorias['categoria_esp_txt'];
			$aux[$i]['categoria_cat_txt'] = $aux_categorias['categoria_cat_txt'];
		}

		return $aux;
	}

    public function getById($id) {
		$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_cat, municipios.municipio_esp FROM eventos JOIN municipios ON eventos.municipiosId = municipios.id WHERE eventos.id='".$id."'");
		$consulta->execute();

		$resultado = $consulta->fetch();

		$aux = $this->translateCatsIdsToString($resultado['categoriasId'], $resultado['subcategoriasId']);
		
		$resultado['categoriasId'] = $aux['categoriasId'];
		$resultado['subcategoriasId'] = $aux['subcategoriasId'];
		$resultado['categoria_esp'] = $aux['categoria_esp'];
		$resultado['categoria_cat'] = $aux['categoria_cat'];
		$resultado['subcategoria_esp'] = $aux['subcategoria_esp'];
		$resultado['subcategoria_cat'] = $aux['subcategoria_cat'];
		$resultado['categoria_esp_txt'] = $aux['categoria_esp_txt'];
		$resultado['categoria_cat_txt'] = $aux['categoria_cat_txt'];

		return $resultado;
    }

    public function getMunicipios() {
    	$consulta = $this->db->prepare("SELECT * FROM municipios order by municipio_cat, municipio_esp ASC ");
		$consulta->execute();
		
		return $consulta->fetchAll();
    }

    public function getAllEventosByCategory($category) {
		$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_esp,municipios.municipio_cat FROM eventos JOIN municipios ON eventos.municipiosId= municipios.id where eventos.categoriasId like '%$category%' and eventos.publicado > 0   order by fecha_inicio  DESC");
		$consulta->execute();

		$aux = $consulta->fetchAll();
		for ($i = 0; $i < count($aux); $i++) {
			$aux_categorias = $this->translateCatsIdsToString($aux[$i]['categoriasId'], $aux[$i]['subcategoriasId']);

			$aux[$i]['categoriasId'] = $aux_categorias['categoriasId'];
			$aux[$i]['subcategoriasId'] = $aux_categorias['subcategoriasId'];
			$aux[$i]['categoria_esp'] = $aux_categorias['categoria_esp'];
			$aux[$i]['categoria_cat'] = $aux_categorias['categoria_cat'];
			$aux[$i]['subcategoria_esp'] = $aux_categorias['subcategoria_esp'];
			$aux[$i]['subcategoria_cat'] = $aux_categorias['subcategoria_cat'];
			$aux[$i]['categoria_esp_txt'] = $aux_categorias['categoria_esp_txt'];
			$aux[$i]['categoria_cat_txt'] = $aux_categorias['categoria_cat_txt'];
		}

		return $aux;
    }

    public function getByUserAhora($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_cat, municipios.municipio_esp FROM eventos JOIN municipios ON eventos.municipiosId = municipios.id WHERE eventos.accountsId = '$accountsId' AND fecha_fin > NOW() AND confirmado > 0 AND destacado <> 1 ORDER by fecha_inicio ASC");
    	$consulta->execute();
		
		return $consulta->fetchAll();
    }

    public function getByUserAnteriores($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_cat, municipios.municipio_esp FROM eventos JOIN municipios ON eventos.municipiosId = municipios.id WHERE eventos.accountsId = '$accountsId' AND fecha_fin < NOW() AND confirmado > 0 AND destacado <> 1 ORDER by fecha_inicio ASC");
		$consulta->execute();

        return $consulta->fetchAll();
    }
		
    public function getDestacadosByUserAhora($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_cat, municipios.municipio_esp FROM eventos JOIN municipios ON eventos.municipiosId = municipios.id WHERE eventos.accountsId = '$accountsId' AND destacado = '1' AND fecha_fin > NOW() AND confirmado > 0 ORDER by fecha_inicio ASC");
		$consulta->execute();

		return $consulta->fetchAll();
    }
		
    public function getDestacadosByUserAnteriores($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_cat, municipios.municipio_esp FROM eventos JOIN municipios ON eventos.municipiosId = municipios.id WHERE eventos.accountsId = '$accountsId' AND destacado = '1' AND fecha_fin < NOW() AND confirmado > 0 ORDER by fecha_inicio ASC");
		$consulta->execute();

		return $consulta->fetchAll();
    }
		
    public function getBySubcategory($subcategory) {
    	$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_esp,subcategorias.subcategoria_cat FROM eventos,subcategorias,categorias,municipios WHERE subcategoriasId='$subcategory' and eventos.publicado > 0 and subcategorias.id = eventos.subcategoriasId and categorias.id = eventos.categoriasId and municipios.id = eventos.municipiosId");
		$consulta->execute();

		return $consulta->fetchAll();
    }

    public function add($params) {
    	$consulta = $this->db->prepare("INSERT INTO eventos (accountsId,destacado,titulo_esp,titulo_cat,categoriasId,subcategoriasId,descripcion_esp,descripcion_cat,imagen,lugar,direccion,municipiosId,fecha_inicio,fecha_fin,dias_semana,hora_inicio,hora_final,hora_inicio2,hora_final2,precio,precio_anticipado,telf,email,web,publicado,fecha_registro) VALUES ('".$params['accountsId']."','".$params['destacado']."','".$params['titulo_esp']."','".$params['titulo_cat']."','".$params['categoriasId']."','".$params['subcategoriasId']."','".$params['descripcion_esp']."','".$params['descripcion_cat']."','".$params['imagen']."','".$params['lugar']."','".$params['direccion']."','".$params['municipiosId']."','".$params['fecha_inicio']."','".$params['fecha_fin']."','".$params['dias_semana']."','".$params['hora_inicio']."','".$params['hora_final']."','".$params['hora_inicio2']."','".$params['hora_final2']."','".$params['precio']."','".$params['anticipada']."','".$params['telf']."','".$params['email']."','".$params['web']."','".$params['publicado']."',NOW())");
		$consulta->execute();

		return $this->db->lastInsertId();
    }

    public function edit($params) {
    	$consulta = $this->db->prepare("UPDATE eventos SET accountsId = '".$params['accountsId']."',destacado = '".$params['destacado']."',titulo_esp = '".$params['titulo_esp']."',titulo_cat = '".$params['titulo_cat']."',categoriasId = '".$params['categoriasId']."',subcategoriasId = '".$params['subcategoriasId']."',descripcion_esp = '".$params['descripcion_esp']."',descripcion_cat = '".$params['descripcion_cat']."',imagen = '".$params['imagen']."',lugar = '".$params['lugar']."',direccion = '".$params['direccion']."',municipiosId = '".$params['municipiosId']."',fecha_inicio = '".$params['fecha_inicio']."',fecha_fin = '".$params['fecha_fin']."',dias_semana = '".$params['dias_semana']."',hora_inicio = '".$params['hora_inicio']."',hora_final = '".$params['hora_final']."',hora_inicio2 = '".$params['hora_inicio2']."', hora_final2 = '".$params['hora_final2']."',precio = '".$params['precio']."',telf = '".$params['telf']."',email = '".$params['email']."',web = '".$params['web']."',publicado = '".$params['publicado']."', fecha_actualizacion = '".$params['fecha_actualizacion']."',fecha_publi_ini = '".$params['fecha_publi_ini']."', fecha_publi_end = '".$params['fecha_publi_end']."' where id='".$params['id']."'");
		$consulta->execute();
    }
		
    public function confirmar($params) {
    	$consulta = $this->db->prepare("UPDATE eventos SET confirmado='1' where id='$params'");
    	$consulta->execute();
    }

    public function delete($params) {
    	$consulta = $this->db->prepare("DELETE FROM eventos where id='".$params['id']."'");
    	$consulta->execute();
    }

    public function cancel($id) {
    	$consulta = $this->db->prepare("UPDATE eventos SET cancelado='1' where id='".$id."'");
    	$consulta->execute();
    }

    public function isCanceled($id) {
    	$consulta = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM eventos WHERE id='$id' AND cancelado='1') AS resultado");
		$consulta->execute();

		$resultado = $consulta->fetch();
		return $resultado['resultado'] ? true : false;
    }

    public function isPublished($id) {
    	$consulta = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM eventos WHERE id='$id' AND publicado='1') AS resultado");
		$consulta->execute();

		$resultado = $consulta->fetch();
		return $resultado['resultado'] ? true : false;
    }
}
