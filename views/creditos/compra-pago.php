<? include('views/includes/top.php'); ?>
<div id="evento-info" class='inside'>
<h2><?= $Comprar_credits ?></h2>
<h3><?= $Fac_pag_ver ?></h3>

<div class="boto-red"><?= $content ?></div>
<div class="categoria-evento">

<table width="315">
<tr>
<td><b><?= $concept ?></b></td>
<td><b><?= $cant ?></b></td>
<td><b><?= $PRECIO ?></b></td>
<td><b>IVA (21%)</b></td>
<td><b>TOTAL</b></td>
</tr>
<tr>
<td style=""><?= $eve ?></td>
<td>1</td>
<td>00,00&euro;</td>
<td>00,00&euro;</td>
<td>00,00&euro;</td>
</tr>
</table>

<div class="mini"><?= $Politica_reembolso ?></div>
</div>
<div class="boto-red"><?= $metod ?></div>
<div class="categoria-evento">
<form action="">
<input type="radio" name="credito" value=""><p><?= $credito ?></p><br>
<input type="radio" name="debito" value=""><p><?= $debito ?></p><br>
<input type="radio" name="paypal" value=""><p> PayPal</p><br><br>


<div class="tit"><?= $tipo ?><div class="vermell">*</div></div>
<select>
  <option value="volvo">Visa</option>
  <option value="saab">Electron</option>
  <option value="mercedes">Mastercard</option>
</select> <br><br>
<div class="tit"><?= $nom_tar ?><div class="vermell">*</div></div>
<input type="text" name="name_tarjeta" required="required"><br>
<div class="tit"><?= $num_tar ?><div class="vermell">*</div></div>
<input type="text" name="" required="required"><br>
<div class="tit"><?= $cod_tar ?><div class="vermell">*</div></div>
<input style="width:30px;" type="text" name="cod_tarjeta" required="required"><div style="display:inline-block;"><img src="views/img/inter.png" style="position: relative;bottom: -7px;left: 10px;"></div><br>



<div class="tit"><?= $fecha_tar ?><div class="vermell">*</div></div>
<p> Mes &nbsp; </p><?php
// defaults
$meses = array(
'1' => 'Enero',
'2' => 'Febrero',
'3' => 'Marzo',
'4' => 'Abril',
'5' => 'Mayo',
'6' => 'Junio',
'7' => 'Julio',
'8' => 'Agosto',
'9' => 'Setiembre',
'10' => 'Octubre',
'11' => 'Noviembre',
'12' => 'Diciembre'
);
?>
<select name="cla_mes">
<option value="">Mes</option>
<?php
$to = count($meses);
$i = 0;
 
foreach($meses as $key => $mes)
{
$i = $i+1;
?>
<option value="<?php echo $key;?>" <?php echo ($_POST["cla_mes"] == $key) ? " selected" : ""; ?>><?php echo $mes; ?></option>
<?php
}
?>
</select>
<p>&nbsp; <?= $any_tar ?>&nbsp;  </p><select name="año" style="">
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
</select><br><br>
<div class="mini"><?= $efective_tar ?></div><br><br>
<input type="button" class="button black" value="Anterior" onclick="">
<input type="button" class="button black" value="Siguiente" onclick="">
</form>
</div>
</div>
<? include('views/includes/footer.php'); ?>
