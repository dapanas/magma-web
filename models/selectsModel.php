<?php
class selectsModel extends ModelBase
{
	public function bakeCombo($name, $table, $selected) {
		$consulta = $this->db->prepare("SELECT * FROM $table");
		$consulta->execute();
        $items = $consulta->fetchAll(PDO::FETCH_ASSOC);
		
		$ret ="<select name='".$name."'>";
		/* 1st row */
		$ret .= '<option value="">--</option>';
		foreach($items as $option) {
			$ret .="<option value='".$option['id']."' ";
			if ($option['id'] == $selected) $ret .= 'selected="selected"';
			$ret .= ">".$option[$name]."</option>";
		}
		$ret .= "</select>";

		return $ret;
	}
	
	public function packsCreditos() {
		$ret = '';
		$consulta = $this->db->prepare("SELECT * FROM creditos order by precio ASC");
		$consulta->execute();
	    $items = $consulta->fetchAll();
	    $lang = $_SESSION['lang'];
	    $i = 1;
		foreach($items as $item) {
			$ret .='<div class="precio" style="left:3px;"><img id="alinear" src="data/img/'.$item['imagen'].'" style="bottom:8px;"><div class="coste">'.$item['precio'].' €<div class="mini">'.$item['precio_credito'].' &euro; / crédito</div></div><input type="button" name="1" class="button black" value="Comprar" onclick=""></div>';
			if ($i % 3 == 0)
				$ret .= '<br>'; 
		}

		return $ret;
	}
	
	public function radiosCategorias() {
		$ret = '';
		$consulta = $this->db->prepare("SELECT * FROM categorias order by categoria_esp,categoria_cat ASC");
		$consulta->execute();
        $items = $consulta->fetchAll();
        $lang = $_SESSION['lang'];
		foreach($items as $item) {
			$ret .='	<input type="radio" required="required"  name="categoriasId" value="'.$item['id'].'"><p> '.$item['categoria_'.$lang].'</p><br>';
		}

		return $ret;
	}
	
	public function radiosSubcategorias($subcategorias = array()) {

		$ret = '';
		$consulta = $this->db->prepare("SELECT *,subcategorias.id as subcategoriasId FROM subcategorias INNER JOIN categorias ON subcategorias.categoriasId = categorias.id ORDER BY subcategoria_esp,subcategoria_cat,categoria_esp,categoria_cat ASC");
		$consulta->execute();
        $items = $consulta->fetchAll();
        $lang = $_SESSION['lang'];
		foreach($items as $item) {
			$ret .= '<input type="checkbox" name="subcategoriasId[]" value="'.$item['subcategoriasId'].'|'.$item['id'].'"';
			if (in_array($item['subcategoriasId'], $subcategorias)) {
				$ret .= ' checked="checked"';
			}

			$ret .= '><p> '.$item['subcategoria_'.$lang].' ('.$item['categoria_'.$lang].')</p><br>';
		}

		return $ret;
	}

	public function selectMunicipios($selected = -1) {
		$consulta = $this->db->prepare("SELECT * FROM municipios");
		$consulta->execute();
        $items = $consulta->fetchAll(PDO::FETCH_ASSOC);
		$lang = $_SESSION['lang'];
		$ret ="<select id='municipiosId' required='required' name='municipiosId'>";

		$ret .= '<option value="">--</option>';
		foreach($items as $option){
			$ret .="<option value='".$option['id']."' ";
			if ($option['id'] == $selected)
				$ret .= 'selected="selected"';
			
			$ret .= ">".$option['municipio_'.$lang]."</option>";
		}
		$ret .= "</select>";
		
		return $ret;
	}

	public function checkboxesCategoriasSubcategorias($categoriesSelected = array(), $subcategoriesSelected = array()) {
		require_once "models/categoriasModel.php";
		require_once "models/subcategoriasModel.php";

		$categoriasModel = new categoriasModel();
		$subcategoriasModel = new subcategoriasModel();

		$categorias = $categoriasModel->getAll();
		$categoriasFinal = array();

		foreach ($categorias as $categoria) {
			$categoria['subcategorias'] = array();

			$subcategorias = $subcategoriasModel->getByCategoryId($categoria['id']);
			if ($subcategorias) {
				foreach ($subcategorias as $subcategoria) {
					array_push($categoria['subcategorias'], $subcategoria);
				}
			}

			array_push($categoriasFinal, $categoria);
		}

		$lang = $_SESSION['lang'];

		$ret = '<ul>';
		foreach($categoriasFinal as $categoria) {

			if (count($categoria['subcategorias']) > 0) {
				$ret .= '<li>';
				$ret .= '<ul>';
				foreach ($categoria['subcategorias'] as $subcategoria) {
					$ret .= '<li>';
					$ret .= '<input type="checkbox" name="subcategoriasId[]" value="'.$subcategoria['id'].'|0" ';

					if (in_array($subcategoria['id'], $subcategoriesSelected)) {
						$ret .= 'checked="checked" />';
					} else {
						$ret .= '/>';
					}
					$ret .= '<p> '.$subcategoria['subcategoria_'.$lang].'('.$categoria['categoria_'.$lang].')</p>';
					$ret .= '</li>';
				}
				$ret .= '</ul>';
				$ret .= '</li>';
			} else {
				$ret .= '<li>';
				$ret .= '<input type="checkbox" name="subcategoriasId[]" value="0|'.$categoria['id'].'" ';

				if (in_array($categoria['id'], $categoriesSelected)) {
					$ret .= 'checked="checked" />';
				} else {
					$ret .= '/>';
				}
				$ret .= '<p> '.$categoria['categoria_'.$lang].'</p>';

				$ret .= '</li>';
			}
		}
		$ret .= '</ul>';

		return $ret;
	}
}
?>
