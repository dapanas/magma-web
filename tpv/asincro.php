<? session_start();
include "../lib/Config.php";
include "../config.php";
include "../lib/SPDO.php";
include "../lib/ModelBase.php";


class tpvModel extends ModelBase
{
	function newpayment($a,$b,$c,$d){
		$cons = $this->db->prepare("insert into payments (ref,payment_date,accountsId,concepto,payment_qty) VALUES ('".$d."',NOW(),'".$a."','Pago publicación destacado','".$b."')");
		$cons->execute();
		$cons = $this->db->prepare("update eventos set confirmado='1' where id='".$c."'");
		$cons->execute();
			
	}

}


$importe = $_POST['Ds_Amount'] / 100;
$pedido = $_POST['Ds_Order'];
$t = $_POST['Ds_MerchantData'];
$t = explode("-",$t);
$accountsId = $t[0];
$idevento = $t[1];


if ($_POST['Ds_Response'] == "0000"){
	$tpv = new tpvModel();
	$tpv->newpayment($accountsId,$importe,$idevento,$pedido);
	
}

?>