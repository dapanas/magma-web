<?


// COMMOM FUNCTIONS
function sanitize($aux){

//	return mysql_escape_string($aux);
	$aux =   preg_replace('[^a-zA-Z0-9]', '', $aux);
	if (($aux) == '') return -1;
	return $aux;
}

function get_param($param){
	if (isset($_GET[$param]))
		return sanitize($_GET[$param]);
	if (isset($_POST[$param]))
		return sanitize($_POST[$param]);
	return -1;
}

function gett(){

		// Takes USER INPUT, normalize, sanitize, and returns and array
	    $retrieved = -1;	
		$params = array();
		if (count($_GET) > 0){
			foreach ($_GET as $key => $value)
				$params[$key] = sanitize($value);			
		} 
		if (count($_POST) > 0){
			foreach ($_POST as $key => $value)
				$params[$key] = sanitize($value);
		}	
   return $params;

}

function mysql_to_fecha($f){
	$f = explode("-",$f);
	return $f[2]."/".$f[1]."/".$f[0];

}

function fecha_to_mysql($f){

	$f = explode("/",$f);
	return $f[2]."-".$f[1]."-".$f[0];
}
function json_from_array($array){
	$json = new Services_JSON();
	$aux = $json->encode($array);
	echo $aux;
}

function generar_cadena_random($long){ 
//
// Genera cadena aleatoria de minusuclas i numeros.
// Requiere pasarle una variable con la longitud de la cadena que queremos.
// Devuelve la cadena de la longitud dada.

	$str = "abcdefghijklmnopqrstuvwxyz1234567890";
	$cad = "";
	for($i=0;$i<$long;$i++) {
	$cad .= substr($str,rand(0,36),1);
	}
	return date("ymdHis").$cad;

}


// FORMS
function create_combo_before_number($name){
	echo "<select name=\"".$name."\">

	<option value=\">=\">>=</option>
		<option value=\"<=\"><=</option>
	</select> ";
}

function float_to_sql($valor){
	$valor = str_replace('.','',$valor);
	$valor = str_replace(',','.',$valor);
	return $valor;
}
function generate_seo_link($input,$replace = '-',$remove_words = true,$words_array = array())
{
	//make it lowercase, remove punctuation, remove multiple/leading/ending spaces
	$return = trim(preg_replace('/[^a-zA-Z0-9\s]/','',strtolower($input)));

	//remove words, if not helpful to seo
	//i like my defaults list in remove_words(), so I wont pass that array
	if($remove_words) { $return = remove_words($return,$replace,$words_array); }

	//convert the spaces to whatever the user wants
	//usually a dash or underscore..
	//...then return the value.
	return str_replace(' ',$replace,$return);
}

/* takes an input, scrubs unnecessary words */
function remove_words($input,$replace,$words_array = array(),$unique_words = true)
{
	//separate all words based on spaces
	$input_array = explode(' ',$input);

	//create the return array
	$return = array();

	//loops through words, remove bad words, keep good ones
	foreach($input_array as $word)
	{
		//if it's a word we should add...
		if(!in_array($word,$words_array) && ($unique_words ? !in_array($word,$return) : true))
		{
			$return[] = $word;
		}
	}

	//return good words separated by dashes
	return implode($replace,$return);
}


function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}


function resize_image($stype,$fname,$destino,$n_width,$n_height) {

	if ($n_width == 0 and $n_height == 0){
		copy($fname,$destino);
		return false;
	}
	switch($stype) {
	        case 'gif':
	        $img = imagecreatefromgif($fname);
	        break;
	        case 'jpg':
	        $img = imagecreatefromjpeg($fname);
	        break;
	        case 'jpeg':
	        $img = imagecreatefromjpeg($fname);
	        break;
	
	        case 'png':
	        $img = imagecreatefrompng($fname);
	        break;
	    }
	 
		$ancho = imagesx($img);
		$alto = imagesy($img);

		if ($n_width > $ancho and $n_height > $alto){
			copy($fname,$destino);
			return false;
		}

	if ($ancho > $alto){ // changed for bisdixit.Falta funcio make thumbs make content i make bigs
		$r_ancho = $n_width;
		$r_alto = ($alto * $r_ancho) / $ancho;
	}else if ($ancho < $alto){
		$r_alto = $n_height;
		$r_ancho = ($ancho * $r_alto) / $alto;	
	} else { // iguales
		$r_ancho = $n_width;
		$r_alto = ($alto * $r_ancho) / $ancho;
	
	}

	$r_alto = number_format($r_alto,0,"","");
	$r_ancho = number_format($r_ancho,0,"","");
	$thumb = imagecreatetruecolor($r_ancho,$r_alto); 
	$fname22= $destino;
	imagecopyresampled($thumb,$img,0,0,0,0,$r_ancho,$r_alto,$ancho,$alto); 
	
	 switch($stype) {
	        case 'gif':
			 imagegif($thumb, $fname22,100);
	        break;
	        case 'jpg':
		      imagejpeg($thumb, $fname22,100);
	        break;
	        case 'jpeg':
	         imagejpeg($thumb, $fname22,100);
	        break;
	
	        case 'png':
	        imagepng($thumb, $fname22);
	        break;
    }
 
  
}

function cropImage($nw, $nh, $source, $stype, $dest) {
//
// CROP IMAGE ( Recorte forzado de imagen )
// Necesita: NUEVO_ANCHO, NUEVO_ALTO, PATH DE ARCHIVO FUENTE, EXTENSION DE 3 LETRAS ARCHIVO, PATH Y NOMBRE ARCHIVO DESTINACION
//
// Devuelve true si todo ha ido correcto.
// El resultado es la copia del archivo manipulado.

    $size = getimagesize($source);
    $w = $size[0];
    $h = $size[1];
 
    switch($stype) {
        case 'gif':
        $simg = imagecreatefromgif($source);
        break;
        case 'jpg':
        $simg = imagecreatefromjpeg($source);
        break;
        case 'jpeg':
        $simg = imagecreatefromjpeg($source);
        break;

        case 'png':
        $simg = imagecreatefrompng($source);
        break;
    }
 
    $dimg = imagecreatetruecolor($nw, $nh);
 
    $wm = $w/$nw;
    $hm = $h/$nh;
 
    $h_height = $nh/2;
    $w_height = $nw/2;
 
    if($wm> $hm) {
 
        $adjusted_width = $w / $hm;
        $half_width = $adjusted_width / 2;
        $int_width = $half_width - $w_height;
 
        imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
 
    } elseif(($wm <$hm) || ($w == $h)) {
 
        $adjusted_height = $h / $wm;
        $half_height = $adjusted_height / 2;
        $int_height = $half_height - $h_height;
 
        imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
 
    } else {
        imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
    }
 
  
   
    switch($stype) {
        case 'gif':
imagegif($dimg,$dest,100);
        break;
        case 'jpg':
       imagejpeg($dimg,$dest,100);       
        break;
        case 'jpeg':
       imagejpeg($dimg,$dest,100);       
        break;
        case 'png':
       imagepng($dimg,$dest);
               break;
    }

    
}


function clean_filename($aux){
	$aux =  preg_replace('[^a-zA-Z0-9._- ]', '', $aux);
	$aux =  str_replace(' ', '', $aux);

	if (trim($aux) == '') return -1;
	else return trim($aux);

}


function generar_nombre_archivo($filename){

$punto_pos = strrpos ( $filename, ".");
$soloname = substr($filename,0,$punto_pos );
$soloname = clean_filename($soloname);
$ext = substr($filename,$punto_pos + 1, strlen($filename) - $punto_pos);
$new_code = generar_cadena_random(7);

return $soloname."_".$new_code.".".$ext;

}

  
function upload_image($var,$W,$H,$folder){
	$path = 'data/img/'.$folder.'/';
	

	if ($_FILES[$var]['name'] != ""){	
		$filename_new = $_SESSION['accountId']."_".generar_nombre_archivo($_FILES[$var]['name']);
		copy($_FILES[$var]['tmp_name'],$path.$filename_new);
		resize_image(get_extension($filename_new),$path.$filename_new,$path.$filename_new,$W,$H) ;
		//cropImage($W, $H, $path.$filename_new,get_extension($filename_new), $path.$filename_new);

		return $filename_new;
	}
	return '';				
}

function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}

