<?
session_start();
include "../shop/cart-functions.php";




$referencia = $_POST['referencia'];

if ($_POST['RESULTADO'] == 'OK'){
            

$cart = new shopping_cart;
$fecha = date("Y-m-d");
$codigo = $_POST['CODIGO'];
$total = $_POST['IMPORTE'];


mysql_query("UPDATE chao_pedidos SET fecha='$fecha',codigotpv='$codigo',total='$total',pagado='1' where referencia='$referencia'");
$q = mysql_query("SELECT * FROM chao_pedidos where referencia='$referencia' limit 1");
$r = mysql_fetch_array($q);

$msg = $r['cliente'].'<br>'.$r['pedido'].'<br>'.$r['total'];

$emailto = 'info@chao-studios.com'; //
$from = 'web@chao-studios.com';

$cabeceras .= "X-Original-To: $to \r\n";
$cabeceras .= "Mime-Version: 1.0 \r\n";
$cabeceras .= "Content-Transfer-Encoding: 7bit\r\n";
$cabeceras .= "Message-Id: ".rand(0,2000)."\r\n";
$cabeceras .= "Content-type: text/html;  \r\n";

$cabeceras .= "Date: ".Date("r")."\r\n";
$cabeceras .= "From: $from \n";
$cabeceras .= "Return-Path: <$from>\r\n "; 
$cabeceras .= "Reply-To: <$from>\n"; 
$cabeceras .= "X-Mailer:PHP ".phpversion()."\r\n";
$cabeceras .= "X-Priority: 3\n";
$cabeceras .= "X-ListMember: $to \n";
$cabeceras .= "Errors-To: $from\n";

mail($emailto, 'Chao-Studios Compra Realizada', $msg,$cabeceras);

}
else
{

mysql_query("DELETE FROM chao_pedidos where referencia='$referencia'");

}