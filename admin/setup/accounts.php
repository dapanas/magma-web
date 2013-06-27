<?
        
        $table_label = "Usuarios";
        $default_order = "id ASC";
        $fields= array("email","username","password","nombre","apellidos","fecha_nacimiento","empresa","telf","direccion","municipiosId","provincia","codigopostal");
        $fields_to_show = array("email","nombre","apellidos","empresa","telf","direccion","municipiosId");
        $fields_labels= array("email","username","password","nombre","apellidos","fecha nacimiento","empresa","telf","direccion","municipio","provincia","código postal");
        
        $fields_types=array("email","literal","password","literal","literal","fecha","literal","literal","literal","combo","literal","literal");
        
        
        