<?
include "tpv/sha1.php";

$prices= array(0,100,180,255,320);
//$merchant_order =  Date("Ymdhis");
if ($_SESSION['periodo'] != "") {
	$amount = $prices[$_SESSION['periodo']] * 100;
} else {
	$amount = $prices[0];
}


// Compute hash to sign form data
$message = $amount.$order.$code.$currency.$transactionType.$urlMerchant.$clave;
// echo "<input type=hidden name=message value='$message'>";
$signature = strtoupper(sha_1($message));



?>

<? include('views/includes/top.php'); ?>
<div id="publicar-evento" class='inside'>

<? if ($destacado): ?>
<form name="form3" method="POST" action="https://sis-t.redsys.es:25443/sis/realizarPago">
	<h2><?= $public_desta ?></h2>
<!-- 	<h3><?= $inf_res_conf ?></h3> -->
<img src="views/img/step5.jpg"><br>
<p ><?= $event_text ?></p>
<input type="checkbox" required="required" name="condiciones" value="1"><p style="display:inline;font-size:8.2pt;"><?= $REVISADO_COMPROBADO ?></p>


<br><br><br>

<?

 echo "
<input type=hidden name=Ds_Merchant_Amount value='$amount'>

<input type=hidden name=Ds_Merchant_Currency value='$currency'>
<input type=hidden name=RSisSelFormaPago value='Pago con tarjeta de crédito o débito'>

<input type=hidden name=Ds_Merchant_Order  value='$order'>
<input type=hidden name=Ds_Merchant_PayMethods valur='T'>
<input type=hidden name=Ds_Merchant_MerchantCode value='$code'>

<input type=hidden name=Ds_Merchant_Terminal value='$terminal'>
<input type=hidden name=Ds_Merchant_MerchantName value='$name'>
<input type=hidden name=Ds_Merchant_MerchantData value='".$_SESSION['accountId']."-".$eventosId."'>


<input type=hidden name=Ds_Merchant_TransactionType value='$transactionType'>
<input type=hidden name=Ds_Merchant_ProductDescription value='$producto'>
 <input type=hidden name=Ds_Merchant_MerchantURL value='$urlMerchant'> 
<input type=hidden name=Ds_Merchant_MerchantSignature value='$signature'>
";
/*
<input type=hidden name=Ds_Merchant_UrlOK value='$urlok'>
<input type=hidden name=Ds_Merchant_UrlKO value='$urlko'>
<input type=hidden name=Ds_Merchant_UrlCancel value='$urlko'>
*/

?>
<!--
<input type="hidden" name="Ds_Merchant_MerchantCode" value="<?= $merchant_code ?>">
<input type="hidden" name="Ds_Merchant_Terminal" value="1">
<input type="hidden" name="Ds_Merchant_Currency" value="978">
<input type="hidden" name="Ds_Merchant_MerchantURL" value="<?= $merchant_url ?>">
<input type="hidden" name="Ds_Merchant_TransactionType" value="0">
<input type="hidden" name="Ds_Merchant_Order" value="<?= $merchant_order ?>">

<input type="hidden" name="Ds_Merchant_ProductDescription" value="Magma. Evento Destacado">
<input type="hidden" name="Ds_Merchant_MerchantName" value="Magma">
<input type="hidden" name="Ds_Merchant_Amount" value="<?= $amount ?>">
<input type="hidden" name="Ds_Merchant_MerchantSignature" value="<?= $signature ?>">
-->

<input type="submit" class="button black" value="Confirmar">

</form>

<? else: ?>
<form name="form3" method="POST" action="eventos/doConfirmar/<?= $eventosId?>">
	<h2><?= $publi_even ?></h2>
	<h3 class="light book"><?= $INFORMACION ?> · <?= $RESUMEN ?> · <span class="demibold"><?= $CONFIRMACION ?></span></h3>
	
<p style="text-align:justify;margin-top: 30px;margin-bottom: 10px;"><?= $event_text ?></p>

<!-- <input type="checkbox" required="required" name="condiciones" value="1"><p style="display:inline;font-size:8.2pt;"><?= $HE_LEIDO ?></p> -->




<input type="button" class="button black" value="Anterior" onclick="history.back(-1)" style="padding: 0 26px;">
<input type="button" class="button black" value="Confirmar" onclick="validate(this.form);">

<? endif; ?>

</div>

<? include('views/includes/footer.php'); ?>
