<?
session_start();
include "cart-functions.php";

$cart = new shopping_cart();
$op = gett('op');
$b = gett('rid');
$c = gett('size');
$d = gett('qty');

switch($op){

    case 'add':
        $a = array(gett('idd'),gett('articulo'),gett('talla'),gett('precio'));
        $cart->add_p($a);
    break;
    case 'del':
        $cart->del_p($b);
        header("location: ../../mybag");
    break;
    case 'update':
        $cart->update_p($b,$d);
        header("location: ../mybag");
       break;
    case 'total_products':
        echo $cart->total_productos;
    break;
    
    case 'drop':
        $cart->drop();
    break;
    case 'bulk':
    
        $cart->bulk();
    break;
    case 'save_pedido':
        $cart->save_pedido();
    break;
    case 'save_client':
        $cart->save_cliente();
    break;
    
}