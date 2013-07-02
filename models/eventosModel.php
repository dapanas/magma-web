<?

// MAGMA 1.0
// eventos Model
// 01-2013
// Beto Ayesa contacto@phpninja.info

class eventosModel extends ModelBase
{

    public function getAll() {
    	$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp FROM eventos,categorias,subcategorias,municipios where  categorias.id = eventos.categoriasId and eventos.publicado > 0 and subcategorias.id = eventos.subcategoriasId and  municipios.id = eventos.municipiosId order by fecha_inicio  DESC ");
    	$consulta->execute();

        return $consulta->fetchAll();
    }
    
    public function getAllDestacados() {
		$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp FROM eventos,categorias,subcategorias,municipios where  categorias.id = eventos.categoriasId and eventos.publicado > 0 and subcategorias.id = eventos.subcategoriasId  and destacado='1' and municipios.id = eventos.municipiosId order by fecha_inicio  DESC limit 10");
		$consulta->execute();

		return $consulta->fetchAll();
    }
    
    public function search($params) {
    	$key = $params['a']; 
		if ($key != -1)
			$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp FROM eventos INNER JOIN categorias ON eventos.categoriasId = categorias.id INNER JOIN subcategorias ON eventos.subcategoriasId = subcategorias.id INNER JOIN municipios ON eventos.municipiosId= municipios.id where descripcion_cat LIKE '%".$key."%' or descripcion_esp LIKE '%".$key."%' or titulo_cat LIKE '%".$key."%' or titulo_esp LIKE '%".$key."%'  order by fecha_inicio  ASC ");
		else
			$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp FROM eventos,categorias,subcategorias,municipios where  categorias.id = eventos.categoriasId and eventos.publicado > 0 and subcategorias.id = eventos.subcategoriasId and  municipios.id = eventos.municipiosId order by fecha_inicio  ASC ");

	    $consulta->execute();
		$aux = $consulta->fetchAll();
	    if (count($aux) > 0)
	    	return $aux;
	    //if (count($params) == 0) return $this->getAll();
		//else return $this->getAll();
    }

    public function getById($id) {
		$consulta = $this->db->prepare("SELECT eventos.*, municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp FROM eventos,categorias,subcategorias,municipios WHERE eventos.id='".$id."' and eventos.publicado > 0 and categorias.id = eventos.categoriasId and subcategorias.id = eventos.subcategoriasId and municipios.id = eventos.municipiosId");
		$consulta->execute();

		$resultado = $consulta->fetch();

		/* Convertimos el string con las subcategorias en array */
		$aux = array();
		$auxSubcategorias = explode(",", $resultado['subcategoriasId']);
		
		foreach ($auxSubcategorias as $subcategoria) {
			array_push($aux, $subcategoria);
		}

		$resultado['subcategoriasId'] = $aux;

		/* Convertimos el string con las categorias en array */
		$aux = array();
		$auxCategorias = explode(",", $resultado['categoriasId']);

		foreach ($auxCategorias as $categoria) {
			array_push($aux, $categoria);
		}
		$resultado['categoriasId'] = $aux;

		/* Creamos un array con la información relacionada entre subcategoria y categoria */
		require_once "models/subcategoriasModel.php";
		$subcategoriaModel = new subcategoriasModel();

		$resultado['subcategoria_esp'] = array(); // Limpiamos los valores que venían desde base de datos
		$resultado['subcategoria_cat'] = array(); // Limpiamos los valores que venían desde base de datos

		foreach ($resultado['subcategoriasId'] as $subcategoria) {
			$aux = $subcategoriaModel->getNameAndCategoryNameById($subcategoria);

			$resultado['subcategoria_esp'][$subcategoria] = array(
				'subcategoria' => $aux['subcategoria_esp'],
				'categoria' => $aux['categoria_esp']
				);

			$resultado['subcategoria_cat'][$subcategoria] = array(
				'subcategoria' => $aux['subcategoria_cat'],
				'categoria' => $aux['categoria_cat']
				);
		}

		return $resultado;
    }

    public function getMunicipios() {
    	$consulta = $this->db->prepare("SELECT * FROM municipios order by municipio_cat, municipio_esp ASC ");
		$consulta->execute();
		
		return $consulta->fetchAll();
    }

    public function getAllEventosByCategory($category) {
		$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp  FROM eventos,categorias,subcategorias,municipios WHERE eventos.categoriasId='$category' and eventos.publicado > 0 and categorias.id = eventos.categoriasId and subcategorias.id = eventos.subcategoriasId and municipios.id = eventos.municipiosId ORDER by fecha_inicio ASC");
		$consulta->execute();
		
		return $consulta->fetchAll();
    }

    public function getByUserAhora($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp  FROM eventos,categorias,subcategorias,municipios WHERE eventos.accountsId='$accountsId' and eventos.publicado > 0 and fecha_fin > NOW() and categorias.id = eventos.categoriasId and subcategorias.id = eventos.subcategoriasId and municipios.id = eventos.municipiosId and confirmado > 0 ORDER by fecha_inicio ASC");
    	$consulta->execute();
		
		return $consulta->fetchAll();
    }

    public function getByUserAnteriores($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp  FROM eventos,categorias,subcategorias,municipios WHERE eventos.accountsId='$accountsId' and eventos.publicado > 0 and fecha_fin < NOW() and categorias.id = eventos.categoriasId and subcategorias.id = eventos.subcategoriasId and municipios.id = eventos.municipiosId and confirmado > 0 ORDER by fecha_inicio ASC");
		$consulta->execute();

        return $consulta->fetchAll();
    }
		
    public function getDestacadosByUserAhora($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp  FROM eventos,categorias,subcategorias,municipios WHERE eventos.accountsId='$accountsId' and eventos.publicado > 0 and destacados='1' and fecha_fin > NOW() and categorias.id = eventos.categoriasId and subcategorias.id = eventos.subcategoriasId and municipios.id = eventos.municipiosId and confirmado > 0 ORDER by fecha_inicio ASC");
		$consulta->execute();

		return $consulta->fetchAll();
    }
		
    public function getDestacadosByUserAnteriores($accountsId) {
    	$consulta = $this->db->prepare("SELECT eventos.*,municipios.municipio_cat,municipios.municipio_esp,categorias.categoria_esp,categorias.categoria_cat,subcategorias.subcategoria_cat,subcategorias.subcategoria_esp  FROM eventos,categorias,subcategorias,municipios WHERE eventos.accountsId='$accountsId' and eventos.publicado > 0 and destacado='1' and fecha_fin < NOW() and categorias.id = eventos.categoriasId and subcategorias.id = eventos.subcategoriasId and municipios.id = eventos.municipiosId and confirmado > 0 ORDER by fecha_inicio ASC");
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
    	$consulta = $this->db->prepare("UPDATE eventos SET accountsId = '".$params['accountsId']."',destacado = '".$params['destacado']."',titulo_esp = '".$params['titulo_esp']."',titulo_cat = '".$params['titulo_cat']."',categoriasId = '".$params['categoriasId']."',subcategoriasId = '".$params['subcategoriasId']."',descripcion_esp = '".$params['descripcion_esp']."',descripcion_cat = '".$params['descripcion_cat']."',imagen = '".$params['imagen']."',lugar = '".$params['lugar']."',direccion = '".$params['direccion']."',municipiosId = '".$params['municipiosId']."',fecha_inicio = '".$params['fecha_inicio']."',fecha_fin = '".$params['fecha_fin']."',dias_semana = '".$params['dias_semana']."',hora_inicio = '".$params['hora_inicio']."',hora_final = '".$params['hora_final']."',precio = '".$params['precio']."',telf = '".$params['telf']."',email = '".$params['email']."',web = '".$params['web']."',publicado = '".$params['publicado']."', fecha_actualizacion = '".$params['fecha_actualizacion']."',fecha_publi_ini = '".$params['fecha_publi_ini']."', fecha_publi_end = '".$params['fecha_publi_end']."' where id='".$params['id']."'");
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
}
