<? include('views/includes/top.php'); ?>
<div id="evento-info" class='inside'>
<h2><?= $Comprar_credits ?></h2>
<h3><?= $Fac_pag_ver ?></h3>

<div class="boto-red"><?= $content ?></div>
<div class="categoria-evento">
<form>

<div class="tit" style="display:inline-block;"><?= $eve ?></div><div style="display:inline-block;float:right;"><div class="tit" style="display:inline-block;"><?= $cant  ?>&nbsp;&nbsp;</div><div class="corto"><select name="fecha" style="">
<option value="1">1</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
</select></div><p>&nbsp;00,00&euro;</p>
</div>
<br><br>
<div class="mini"><?= $no_inclou  ?></div>
<div class="mini"><?= $Politica_reembolso  ?></div>
</div>
<div class="boto-red"><?= $DATOS_FACTURACION ?></div>
<div class="categoria-evento">
<div class="tit"><?= $NOMBRE_RAZON ?>: <div class="vermell">*</div></div>
<input type="text" name='nombre' value='<?= $items['nombre'] ?>' required="required"><br>
<div class="tit"><?= $DIRECCION ?>: <div class="vermell">*</div></div>
<input type="text" name='direccion' value='<?= $items['direccion'] ?>' required="required"><br>
<div class="tit"><?= $MUNICIPIO ?>: <div class="vermell">*</div></div>
<input type="text" name='municipio' value='<?= $items['municipio'] ?>' required="required"><br>
<div class="tit"><?= $PROVINCIA ?>: <div class="vermell">*</div></div>
<!-- <input type="text" name='provincia' value='<?= $items['provincia'] ?>' required="required"> -->
<select name="provincia">
<option value="Álava">&Aacute;lava</option>
<option value="Albacete">Albacete</option>
<option value="Alicante">Alicante</option>
<option value="Almería">Almer&iacute;a</option> 
<option value="Asturias">Asturias</option>
<option value="Ávila">&Aacute;vila</option> 
<option value="Badajoz">Badajoz</option> 
<option value="Barcelona">Barcelona</option> 
<option value="Burgos">Burgos</option>
<option value="Cáceres">C&aacute;ceres</option>
<option value="Cádiz">C&aacute;diz</option>
<option value="Castellón">Castell&oacute;n</option> 
<option value="Ceuta">Ceuta</option> 
<option value="Ciudad Real">Ciudad Real</option>
<option value="Córdoba">C&oacute;rdoba</option> 
<option value="Cuenca">Cuenca</option> 
<option value="Gerona">Gerona</option> 
<option value="Granada">Granada</option> 
<option value="Guadalajara">Guadalajara</option>
<option value="Guipúzcoa">Guip&uacute;zcoa</option> 
<option value="Huelva">Huelva</option> 
<option value="Huesca">Huesca</option>
<option value="Islas Baleares">Islas Baleares</option>
<option value="Jaén">Ja&eacute;n</option>
<option value="La Coruña">La Coru&ntilde;a</option> 
<option value="La Rioja">La Rioja</option> 
<option value="Las Palmas de Gran Canaria">Las Palmas de Gran Canaria</option>
<option value="León">Le&oacute;n</option>
<option value="Lérida">L&eacute;rida</option> 
<option value="Lugo">Lugo</option> 
<option value="Madrid">Madrid</option>
<option value="Málaga">M&aacute;laga</option> 
<option value="Melilla">Melilla</option> 
<option value="Murcia">Murcia</option> 
<option value="Navarra">Navarra</option> 
<option value="Orense">Orense</option> 
<option value="Palencia">Palencia</option> 
<option value="Pontevedra">Pontevedra</option> 
<option value="Salamanca">Salamanca</option> 
<option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option> 
<option value="Santander">Santander</option> 
<option value="Segovia">Segovia</option> 
<option value="Sevilla">Sevilla</option> 
<option value="Soria">Soria</option> 
<option value="Tarragona">Tarragona</option> 
<option value="Teruel">Teruel</option> 
<option value="Toledo">Toledo</option> 
<option value="Valencia">Valencia</option> 
<option value="Valladolid">Valladolid</option> 
<option value="Vizcaya">Vizcaya</option> 
<option value="Zamora">Zamora</option> 
<option value="Zaragoza">Zaragoza</option> 
</select><br>
<div class="tit"><?= $CODIGO_POSTAL ?>: <div class="vermell">*</div></div>
<input type="text" name='codigopostal' value='<?= $items['codigopostal'] ?>' required="required"><br>
<div class="tit"><?= $NIF_CIF ?>: <div class="vermell">*</div></div>
<input type="text" name='nifcif' value='<?= $items['nifcif'] ?>' required="required"><br>
<input type="radio" name="" value=""><div class="mini" style="display:inline;padding-left:10px;">    <?= $save  ?></div><br>
<div class="mini" style="padding-left:25px;margin-top:5px;"><?= $confi ?></div>
<br><br><br>

<input type="button" class="button black" value="Siguiente" onclick="">
</form>
</div>
</div>
<? include('views/includes/footer.php'); ?>


name='username' value='<?= $items['username'] ?>'

<!-- KE es aixo de adalt? -->