<? include('views/includes/top.php'); ?>
<div id="evento-info" class='inside'>
<h2><?= $Comprar_credits ?></h2>
<h3><?= $Fac_pag_ver ?></h3>
<p class="test" style="text-align:justify;"><?= $comprueba ?></p>
<div class="boto-red"><?= $dir ?></div>
<div class="categoria-evento">
<form id="marg">
<div class="tit"><?= $NOMBRE_RAZON ?>:</div><div class="fact"></div>
<div class="tit"><?= $DIRECCION ?>: </div><div class="fact"></div>
<div class="tit"><?= $MUNICIPIO ?>: </div><div class="fact"></div>
<div class="tit"><?= $PROVINCIA ?>: </div><div class="fact"></div>
<div class="tit"><?= $CODIGO_POSTAL ?>: </div><div class="fact"></div>
<div class="tit"><?= $NIF_CIF ?>: </div><div class="fact"></div>


</div>
<div class="boto-red"><?= $content ?></div>
<div class="categoria-evento">
<table>
<tr>
<td><b><?= $concept ?></b></td>
<td><b><?= $cant ?></b></td>
<td><b><?= $PRECIO ?></b></td>
<td><b>IVA (21%)</b></td>
<td><b>TOTAL</b></td>
</tr>
<tr>
<td><?= $eve ?></td>
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
<div class="tit"><?= $tipo ?></div>
<input type="text" name="" required="required"><br>
<div class="tit"><?= $nom_tar ?></div>
<input type="text" name="" required="required"><br>
<div class="tit"><?= $num_tar ?></div>
<input type="text" name="" required="required"><br>
<div class="tit"><?= $cod_tar ?></div>
<input style="width:30px;" type="text" name="" required="required"><br>



<div class="tit"><?= $fecha_tar ?></div>
<p> Mes  </p><input style="width:30px;" type="text" name="" required="required">
<p> <?= $any_tar ?> </p><input style="width:30px;" type="text" name="" required="required"><br><br>

<input type="button" class="button black" value="Anterior" onclick="">
<input type="button" class="button black" value="Compra" onclick="">
</form>
</div>
</div>
<? include('views/includes/footer.php'); ?>
