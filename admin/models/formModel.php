<?php
class formModel extends ModelBase
{
	public function getFormValues($table,$rid){    	
        $consulta = $this->db->prepare("SELECT * FROM ".$table." where id='".$rid."' limit 1");
        $consulta->execute();
        return $consulta->fetch();
	}
	
	public function add($table){
        include "setup/".$table.".php";
        include "lib/fields/field.php";
    	
    	$add_info_form = "";
    
    	for ($i=0;$i< count($fields) ;$i++){
    		
    		if ($fields[$i] != 'id')	{
    			if ($fields_types[$i] != 'file_img'){
    				$retrieved = gett($fields[$i]);
    			} else $retrieved = -1;
    			
    			if (!class_exists($fields_types[$i])) die ("La clase ".$fields_types[$i]." no existe");
    			$field_aux = new $fields_types[$i]($fields[$i],$fields_labels[$i],$fields_types[$i],$retrieved);
    			$add_info_form .= "'".$field_aux->exec_add()."',";					
    		}
    	}
    	$info = substr($add_info_form,0,strlen($add_info_form) - 1);
    	$consulta = $this->db->prepare("INSERT INTO ".$table." (".implode(",",$fields).") VALUES ($info)");
        $consulta->execute();
//        die( "INSERT INTO ".$table." (".implode(",",$fields).") VALUES ($info)");
       
    	
	}
	
	public function getLastId($table){
	
	   $consulta = $this->db->prepare("SELECT MAX(id) as m FROM $table limit 1");
       $consulta->execute();
        $aux = $consulta->fetch();
        return $aux['m'];
        
	}
	public function edit($table,$rid){
	     include "setup/".$table.".php";
         include "lib/fields/field.php";
    	 
    	 $edit_info_form = "";
        
        	for ($i=0;$i< count($fields) ;$i++){
        		
        		if ($fields[$i] != 'id' and isset($_POST[$fields[$i]] ))	{					
        			$retrieved = '';		
        			if ($fields_types[$i] != 'file_img'){
        				$retrieved = $_POST[$fields[$i]];
        			}
        			if ($fields_types[$i] == 'file_img' and $_FILES[$fields[$i]]['name'] != "" or $fields_types[$i] != 'file_img'){
        				if (!class_exists($fields_types[$i])) die ("La clase ".$fields_types[$i]." no existe");
        				$field_aux = new $fields_types[$i]($fields[$i],$fields_labels[$i],$fields_types[$i],$retrieved);
        				$edit_info_form .= " ".$table.".".$fields[$i]." = '".$field_aux->exec_edit()."',";	
        			}
        		}
        	}
        			
        	$info = substr($edit_info_form,0,strlen($edit_info_form) - 1);
       		$consulta = $this->db->prepare("UPDATE ".$table." set  $info   where id='".$rid."'");
            $consulta->execute();
      
	}


	
	
	
	
   	public function js($table)
	{   
	    require "setup/".$table.".php";
		$output = "";
		if(in_array('fecha', $fields_types) or in_array('hora',$fields_types) or in_array('combo_child',$fields_types))
				for ($i=0;$i< count($fields);$i++){
						if ($fields_types[$i] == 'fecha')
							$output .='$(function() {	$("#'.$fields[$i].'").datepicker(); });';
						if ($fields_types[$i] == 'hora'){
							$output .= "$('#".$fields[$i]."').timepicker({
									hourGrid: 4,
									minuteGrid: 10,
									timeFormat: 'hh:mm:ss'
									});";
						}
						if ($fields_types[$i] == 'combo_child'){
		
								$output .= "$('#".$fields[$i]."').filterOn('#".$fields[$i-1]."') ;

";
											

						}
				}
	
    	$output .="\n function check_form_values(z){
			
					//var z = document.getElementById(x);
					";
				for ($i=0;$i< count($fields);$i++){			
	
					switch($fields_types[$i]){
						
						case 'number':
						$output .=" if((!validateNumber(z.".$fields[$i].".value)) && (z.".$fields[$i].".value != \"\")){
									alert('No es un valor numerico correcto. Introduzca solo digitos. Utilice . (punto) para los decimales.');
									z.".$fields[$i].".style.background='#ffff66';
									z.".$fields[$i].".focus();
									return false;
								} 
							";
						break;
						case 'email':
						$output .=" if((!validateEmail(z.".$fields[$i].".value)) && (z.".$fields[$i].".value != \"\")){
									alert('Email no valido.');
									z.".$fields[$i].".style.background='#ffff66';
									z.".$fields[$i].".focus();
									return false;
								}
							";
						break;
						case 'url':
						$output .=" if((!validateURL(z.".$fields[$i].".value)) && (z.".$fields[$i].".value != \"\")){
									alert('URl que empiece por http:// ');
									z.".$fields[$i].".style.background='#ffff66';
									z.".$fields[$i].".focus();
									return false;
								}
							";
						break;

					}
				}
		  $output .=" busy();";
		  $output .=" z.submit();
		  }";    
		
    		return $output;
		}


		function updateOrder(){

		// INCLUDES

include_once "../../lib/core/ninja.state.php";


// ESTADO

$ninjaState = new ninjaState("../../config.php");

$tabla = $_POST['tabla'];
/*
$ninjaJs = new ninjaJavascript();
$ninjaForm = new ninjaForm();
$ninjaTabla = new ninjaTabla();
*/



$action 				= mysql_real_escape_string($_POST['action']); 
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){
	
	$listingCounter = 0;
	foreach ($updateRecordsArray as $recordIDValue) {
		$query = "UPDATE ".$tabla." SET orden = " . $listingCounter . " WHERE id = " . $recordIDValue;		
		
		mysql_query($query,$ninjaState->ninjaConfig->link) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
	echo $listingCounter;
/*
	
	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
*/
}

}
}
?>
