<?php
class publicidadModel extends ModelBase
{
	
    public function getPublicidad(){
		$consulta = $this->db->prepare("SELECT * FROM publicidad where active > 0 ");
		$consulta->execute();
		$aux = $consulta->fetch();    
		if ($aux['publicidad_img'] != '') $aux['publicidad'] = true;
		else $aux['publicidad'] = false;
		return $aux;
    }
    
    
    
}
?>
