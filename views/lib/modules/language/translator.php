<?


function translate($termino_esp){
	global $LANG;
	if ($LANG != lang_default){
		$termino_esp = trim(strtolower($termino_esp));
		$result = mysql_query("SELECT termino_".$LANG." FROM ".TABLA_TRANSLATOR." WHERE termino_esp LIKE '$termino_esp' limit 1");
		if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			if ($row['termino_'.$LANG] == "") return "falta traduccion para ".$termino_esp;
			return $row['termino_'.$LANG];
		} else {
			return "Término ".$termino_esp." no encontrado";
		}
	} else {
		return $termino_esp;
	}

}