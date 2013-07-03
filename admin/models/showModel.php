<?php
class showModel extends ModelBase
{

	public function getTableAttribute($table,$attribute){
    	require  "setup/".$table.".php";
	   return $$attribute;
	}
	
	public function getItemsHead($table){
    	require "setup/".$table.".php";
/*
		if ( isset($fields_to_show) and is_array($fields_to_show) and count($fields_to_show)>1) 
			return  $fields_to_show ;
	   return $fields_labels;
*/
$fr = $fields_labels;
		if ( isset($fields_to_show) and is_array($fields_to_show) and count($fields_to_show)>0){
			$fr = array();
			for ($i=0;$i < count($fields);$i++):
				if (in_array($fields[$i],$fields_to_show))
					$fr[] = $fields_labels[$i];
			endfor;	
		} 
		
	   return $fr;
	}

    public function getAll($table){
    
        include "setup/".$table.".php";
        include_once "lib/fields/field.php";
        
        $order = (gett('sorder') != -1) ? gett('sorder') : $default_order; 
             
        $consulta = $this->db->prepare('SELECT * FROM '.$table.' order by '.$order);
        $consulta->execute();
        $array_return = array();
        
		while ($r = $consulta->fetch()):
            $row_array = array();
            $row_array['id'] = $r['id'];
            for ($i = 0; $i < count($fields);$i++): 
	               if (!isset($fields_to_show) or in_array($fields[$i],$fields_to_show) or empty($fields_to_show)   ): 
						if (!class_exists($fields_types[$i])) 
						    die ("La clase ".$fields_types[$i]." no existe");
				        $field_aux = new $fields_types[$i]($fields[$i],$fields_labels[$i],$fields_types[$i],$r[$fields[$i]]);
				    	$row_array[] =$field_aux->view();
				    endif; 
             endfor; 
             $array_return[] = $row_array;

        endwhile;
        return $array_return;
        
    }

    public function js($table){
        require "setup/".$table.".php";
            $output= "";
			$output .="$(document).ready(function(){";
			//$output .="$('#tablaMain').pagination();";

			
		
			$output .='$("#tablaMain tbody > tr > td").click(function(){
				var p = $(this).parent();
				var x = $("td:last-child a:first-child",p).attr("href");
				if (!$(this).hasClass("actions"))
				location.href= x;
			});';
			$output .='$("#tablaMain tbody > tr").mouseover(function(){
				$(this).css("cursor","hand");
				$(this).css("cursor","pointer");	
				});';

				
	// MAKE TABLE SORTABLE
	$output .='$(function() {
				firefox = (/firefox/i.test(navigator.userAgent.toLowerCase()));

				$(".tablaMain tbody").sortable({ opacity: 0.6, cursor: "move", helper: firefox === true ? "clone" : void 0, update: function() {
					var aux = $(this).parent().attr("data-table");
					aux_id = -1;
					aux_field = -1;
					if ($(this).parent().attr("data-filter-id")){
						aux_id = $(this).parent().attr("data-filter-id");
						aux_field =$(this).parent().attr("data-filter");
					}
					var order = $(this).sortable("serialize") + "&action=updateRecordsListings&tabla="+aux+"&field="+aux_field+"&id="+aux_id;
					console.log(order);
					$.post("form/updateOrder", order, function(theResponse){
						console.log(theResponse);
					});
					}

				});
				
				

			});';


			$output .="});"; // End $(document).ready();

	
		 // final funciones de check form
		return $output;		
		
    }


}
?>
