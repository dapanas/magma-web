<?

final class file_file extends field{


	function view(){
			return "<a href='".$this->ninjaState->ninjaConfig->http_files_dir.$this->value."'>".$this->ninjaState->ninjaConfig->http_files_dir.$this->value."</a>";
	}
	function bake_field (){
    	$output = "";
		if ($this->value != -1){
 			$output .= "<b>Documento cargado:</b> ";
			$output .= "<div id='".$this->fieldname."'><a  href=\"".$this->http_files_dir.$this->value."\" target=\"_blank\">".$this->value."</a><a  href=\"javascript:DeleteFile('".$this->fieldname."',".$this->ninjaState->rid.",'".$this->fieldname."','".$this->ninjaTabla->tabla."');\"><img src='".$this->ninjaState->ninjaConfig->base_http."lib/img/close.jpg'></a></div>"; }else{ $output .= "ninguno";
			$output .= "<BR>";
		}
							
		$output .= "<input type=\"file\" name=\"".$this->fieldname."\">";
			return $output;					
	}
		
	function exec_add () {
		if ($_FILES[$this->fieldname]['name'] != ""){
					$query2 = mysql_query("SELECT ".$this->fieldname." from ".$this->ninjaState->tabla." limit 1",$this->ninjaState->ninjaConfig->link );
					$row2 = mysql_fetch_array($query2);
					if ($row2[$this->fieldname] != ""){
						@unlink($this->ninjaState->ninjaConfig->files_dir.$row2[$this->fieldname]);
					}
					$filename_new = generar_nombre_archivo($_FILES[$this->fieldname]['name']);
					copy($_FILES[$this->fieldname]['tmp_name'], $this->ninjaState->ninjaConfig->files_dir.$filename_new);
					
					return $filename_new;
					}
					return '';
	}
	function exec_edit () {
		if ($_FILES[$this->fieldname]['name'] != ""){
						$query2 = mysql_query("SELECT ".$this->fieldname." from ".$this->ninjaState->tabla." where $this->ninjaTabla->field_id='".$this->ninjaState->rid."' limit 1",$this->ninjaState->ninjaConfig->link );
						$row2 = mysql_fetch_array($query2);
						if ($this->value != ""){
							unlink($this->ninjaState->ninjaConfig->files_dir.$row2[$this->fieldname]);
						}
						$filename_new = generar_nombre_archivo($_FILES[$this->fieldname]['name']);
						copy($_FILES[$this->fieldname]['tmp_name'], $this->ninjaState->ninjaConfig->files_dir.$filename_new);
					
						return $filename_new;
					
		}
		return '';
	}

}

