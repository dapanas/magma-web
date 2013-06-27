<?
include "JSON.php";

$x = dirname(__FILE__);
include_once $x."/../../config.php";
include_once $x."/../../core/includes/functions.php";
include_once $x."/../../core/includes/mysql.php";

function json_from_array($array){
	$json = new Services_JSON();
	$aux = $json->encode($array);
	echo $aux;
}



class shopping_cart {
    var $n_p;
    var $total_productos;
    var $subtotal;
    var $tax;
    var $total;
    
    function shopping_cart(){
        if (!isset($_SESSION['num_prod'])):
             $_SESSION['num_prod'] = 0;
             $_SESSION['subtotal'] = 0;
             $_SESSION['tax'] = 0;
             $_SESSION['total'] = 0;
        endif;
            $this->calcular_totales();
            
            $this->n_p = $_SESSION['num_prod'];
        
    }
    function existe_producto($a){array(gett('idd'),gett('articulo'),gett('talla'),gett('precio'));
        $n_p = $_SESSION['num_prod'];
        $this->n_p = $n_p;
        
        for ($i = 0; $i < $n_p;$i++){
            if (isset($_SESSION['producto'.$i]) and $_SESSION['producto'.$i] != 0){
                if ($_SESSION['nombre'.$i] == $a[1] and $_SESSION['talla'.$i] == strtoupper($a[2]))
                    return $i;
                
            }   
        
        }
        return -1;
    }
    function add_p($a){
        $b = $this->existe_producto($a);
        if ($b < 0):
        	$_SESSION['num_prod'] = $_SESSION['num_prod'] + 1;
            $title_sesion = "producto".$_SESSION['num_prod'];
            $_SESSION[$title_sesion] = $a[0];
            $nombre_prod = "nombre".$_SESSION['num_prod'];
        	$_SESSION[$nombre_prod] = $a[1];
            $talla_prod = "talla".$_SESSION['num_prod'];
        	$_SESSION[$talla_prod] = strtoupper($a[2]);
        	 $qty_prod = "qty".$_SESSION['num_prod'];
        	$_SESSION[$qty_prod] = 1;        	
            $precio_prod = "precio".$_SESSION['num_prod'];
        	$_SESSION[$precio_prod] = $a[3];	
    	else:
    	   $_SESSION['qty'.$b]++;
    	endif;
    	$this->calcular_totales();
    	        	echo $this->total_productos;    
    }
    
    
    function del_p($id) {
      
    	$n_p = $_SESSION['num_prod'];
//    	$_SESSION['num_prod'] = $_SESSION['num_prod'] - 1;
    	
    	   for ($i = 0; $i < $n_p;$i++){
            if (isset($_SESSION['producto'.$i]) and $_SESSION['producto'.$i] != 0){
                if ($_SESSION['producto'.$i] == $id){
                       $_SESSION['producto'.$i] = 0;

                return true;
                }
            }   
        
        }
        
    }
    
    function update_p($a,$b){
    $n_p = $_SESSION['num_prod'];
//    	$_SESSION['num_prod'] = $_SESSION['num_prod'] - 1;
    	
    	   for ($i = 0; $i < $n_p;$i++){
            if (isset($_SESSION['producto'.$i]) and $_SESSION['producto'.$i] != 0){
                if ($_SESSION['producto'.$i] == $a){
                           $_SESSION['qty'.$i] = $b;

                return true;
                }
            }   
        
        }




    }
    function drop(){
    
        session_destroy();
    }

    
    function calcular_totales (){
        $n_p = $_SESSION['num_prod'];
        $this->n_p = $n_p;
        $this->total_productos = 0;
        $subtotal = 0;
        for ($i = 0; $i < $n_p;$i++){
            if (isset($_SESSION['producto'.$i]) and $_SESSION['producto'.$i] != 0){
                $subtotal += $_SESSION['precio'.$i] * $_SESSION['qty'.$i];
                $this->total_productos += $_SESSION['qty'.$i];
            }   
        
        }
        $tax_rate = 0.21;
        $this->subtotal = $subtotal;
        $this->tax = $subtotal * $tax_rate;
        $this->total = $this->subtotal + $this->tax;
    
    }
    
    function bulk(){
        return json_from_array($_SESSION);
    
    }
    function bulk_array(){
           $n_p = $_SESSION['num_prod'];
            $r = array();
            for ($i = 0; $i < $n_p;$i++){
            if (isset($_SESSION['producto'.$i]) and $_SESSION['producto'.$i] != 0){
                $aux = array($_SESSION['producto'.$i],$_SESSION['nombre'.$i],$_SESSION['talla'.$i],$_SESSION['precio'.$i],$_SESSION['qty'.$i]);
                $r[] = $aux;
            }   
        
        }
        return $r;

            
    }
    function save_pedido(){
            
    }
    function save_cliente(){
            $datos_cliente = "";
            foreach($_GET as $val => $key ){
                if ($val != 'op' and $val != 'referencia' and $val != 'coste' and $val!='moneda' and $val != 'nombre_comercio' and $val != 'Terms_and_Conditions') 
                $datos_cliente .= "<b>".$val."</b> ".$key."<br>";
            }
            
            $referencia = $_GET['referencia'];
            $pedido= "";
            $fecha = date("Y-m-d");
            
            foreach ($this->bulk_array() as $row): 
                $pedido .= strtoupper($row[1]). ' SIZE: '.$row[2].' Qty: '.$row[4].' Total: '.$row[3] * $row[4] .' &euro; <br>';
            endforeach; 

            mysql_query("INSERT INTO chao_pedidos (fecha,cliente,pedido,pagado,referencia) VALUES ('$fecha','$datos_cliente','$pedido','0','$referencia')");
    }
    function photo_p($id){
    
        $query = mysql_query("SELECT foto from chao_shop where id='$id' limit 1");
        $r = mysql_fetch_array($query);
        return $r['foto'];
        
    }

}