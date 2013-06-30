<?
        
        $table_label = "eventos";
        $default_order = "id ASC";
        $fields= array("accountsId","destacado","titulo_esp","titulo_cat","categoriasId","subcategoriasId","descripcion_esp","descripcion_cat","imagen","lugar","direccion","municipiosId","fecha_inicio","fecha_fin","dias_semana","hora_inicio","hora_final","hora_inicio2","hora_final2","precio","precio_anticipado","telf","email","web","confirmado","publicado","fecha_registro","fecha_publi_ini","fecha_publi_end");
   
	    $fields_to_show= array("destacado","titulo_esp","categoriasId","lugar","municipiosId","fecha_inicio","precio","web","publicado");
        

        $fields_labels= array("Usuario","destacado","título Esp","título Cat","categoría","subcategoría","descripcion Esp","descripcion Cat","imagen","lugar","dirección","municipio","fecha evento","fecha fín","días semana","hora inicio","hora final","hora inicio 2","hora final 2","precio","precio anticipado","teléfono","email","web","confirmado y pagado","publicado","fecha registro","Inicio Publicación","Final publicación");
        
        $fields_types=array("combo","truefalse","literal","literal","combo","combo_child","textarea","textarea","file_img","literal","literal","combo","fecha","fecha","dias_semana","hora","hora","hora","hora","number","number","literal","email","url","disabled","truefalse","disabled","fecha","fecha");
        
        
        