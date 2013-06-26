<?php

header("Access-Control-Allow-Origin: *"); 

class apiController extends ControllerBase
{

	public function index(){
		$class_methods = get_class_methods($this);
		echo 'Magma Api<br>';
		echo implode("<br>",$class_methods);

	}
	public function search(){
		require "models/eventosModel.php"; 	
		$params = gett();

		$items = new eventosModel();		
		$json = new Services_JSON();	
		$data = Array( "json_items" =>  $json->encode($items->search($params)))	;         
		$this->view->show("json.php", $data,false);
	}
	public function eventosCategoria(){
		require "models/eventosModel.php"; 	
		$items = new eventosModel();		
		$json = new Services_JSON();	
		$params = gett();
		if ($params['a'] != -1)	$data = Array( "json_items" =>  $json->encode($items->getAllEventosByCategory($params['a']))); //eventos($params['m'],$params['a']))	);         
		else $data = Array( "json_items" =>  $json->encode(array())); //eventos($params['m'],$params['a']))	);         
		$this->view->show("json.php", $data,false);
	}
	
    public function eventos(){  
		require "models/eventosModel.php"; 	
		$items = new eventosModel();		
		$json = new Services_JSON();	
		$params = gett();

		if ($params['a'] != -1)	$data = Array( "json_items" =>  $json->encode($items->getBySubcategory($params['a']))); //eventos($params['m'],$params['a']))	);         
		else $data = Array( "json_items" =>  $json->encode($items->getAll())); //eventos($params['m'],$params['a']))	);         
		$this->view->show("json.php", $data,false);
    }
	public function municipios(){  
		require "models/eventosModel.php"; 	
		$items = new eventosModel();		
		$json = new Services_JSON();	
		$params = gett();
		$data = Array( "json_items" =>  $json->encode($items->getMunicipios())); 
		$this->view->show("json.php", $data,false);
    }
    public function destacados(){  
		require "models/eventosModel.php"; 	
		$items = new eventosModel();		
		$json = new Services_JSON();	
		$params = gett();
		$data = Array( "json_items" =>  $json->encode($items->getAllDestacados())); //eventos($params['m'],$params['a']))	);         
		$this->view->show("json.php", $data,false);
    }

    public function publicidad(){  
		require "models/publicidadModel.php"; 	
		$items = new publicidadModel();		
		$json = new Services_JSON();	
		$params = gett();

		$data = array( "json_items" => $json->encode($items->getPublicidad()));
		$this->view->show("json.php", $data,false);
    }

	public function categorias(){		
		require "models/categoriasModel.php"; 	
		$items = new categoriasModel();		
		$json = new Services_JSON();	
		$data = Array( "json_items" =>  $json->encode($items->getAll())	);         
		$this->view->show("json.php", $data,false);
	}

	public function subcategorias(){		
		require "models/subcategoriasModel.php"; 	
		$items = new subcategoriasModel();		
		$json = new Services_JSON();	
		$params = gett();
		$data = Array( "json_items" =>  $json->encode($items->getById($params['a']))	);         
		$this->view->show("json.php", $data,false);
	}	
    public function detalleEvento(){  
		require "models/eventosModel.php"; 	
		$items = new eventosModel();		
		$json = new Services_JSON();
		$params = gett();	
		$data = Array( "json_items" =>  $json->encode($items->getById($params['a']))	);         
		$this->view->show("json.php", $data,false);
    }

}
?>
