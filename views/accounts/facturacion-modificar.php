<? include('views/includes/top.php'); ?>
<div class='inside'><h2><?= $DATOS_FACTURACION ?></h2><form class='form' action='accountsfacturacion/doEdit' method='POST' enctype='multipart/form-data'>




<div class='control-group'><label class='control-label'><?= $NOMBRE_RAZON ?>:<div class="vermell" style="display:none;">*</div></label>

<div class='controls'><input disabled="disabled"  type='text' name='nombre' value='<?= $items['nombre'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $DIRECCION ?>:<div class="vermell" style="display:none;">*</div></label>

<div class='controls'><input disabled="disabled"  type='text' name='direccion' value='<?= $items['direccion'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $MUNICIPIO ?>:<div class="vermell" style="display:none;">*</div></label>

<div class='controls' style="margin-top: 5px;"><input disabled="disabled" type="text" name="municipiosId" value="<?= $items['municipiosId'] ?>"></div></div>


<div class='control-group' style=""><label class='control-label'><?= $PROVINCIA ?>:<div class="vermell" style="display:none;">*</div></label>

<div class="controls" style="margin-top: 8px;"><select name="provincia">
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
</select></div></div>


<div class='control-group' style="margin-top:15px;"><label class='control-label'><?= $postal ?>:<div class="vermell" style="display:none;">*</div></label>

<div class='controls'><input disabled="disabled"  type='text' name='codigopostal' value='<?= $items['codigopostal'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $NIF_CIF ?>:<div class="vermell" style="display:none;">*</div></label>

<div class='controls'><input disabled="disabled"  type='text' name='nifcif' value='<?= $items['nifcif'] ?>'></div></div>

<input type='hidden' name='accountsId' value='<?= $items['accountsId'] ?>'>
<input type="hidden" name="id" value="<?= $items["id"]; ?>">
<input  type="button" class="modificarButton button black" value="<?= $MODIFICAR_T ?>"  onclick="" style="margin-right:35px;">
<input  type="button" class="guardarButton button black" value="<?= $GUARDAR_T ?>" onclick="validate(this.form);" style="min-width: 104px;"></form></div>
<? include('views/includes/footer.php'); ?>