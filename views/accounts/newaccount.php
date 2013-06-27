<? include('views/includes/top.php'); ?>
<div class='inside'>
<h2><?= $REGISTRARSE ?></h2>

<div class="col" id="regis">
<h3><?= $DATOS_CUENTA ?></h3>
<form class='form' id="formsignup" action='accounts/doAdd' method='POST' enctype='multipart/form-data'>



<div class='control-group'><label class='control-label'><?= $NOMBRE_USUARIO  ?><div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='username' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $DIRECCION_MAIL  ?><div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='email' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $CONTRASENYA  ?><div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='password' value=''></div></div>

<div class='control-group'><label class='control-label'><?= $REPITE_CONTRASENYA  ?><div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='confpassword' value=''></div></div>


<h3><?= $DATOS_CONTACTO ?></h3>
<div class='control-group'><label class='control-label'><?= $NOMBRE ?>:<div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='nombre' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $APELLIDO ?>:<div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='apellidos' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $NACIMIENTO ?>:<div class="vermell">*</div></label>

<!-- <div class='controls'><input type='text' required='required' name='fecha_nacimiento' value=''></div></div> -->
<div class='controls' style="margin-top: 5px; margin-bottom: 19px;"><div style="display: inline-block;"><select name="dia" style="">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>

</select></div> / <div style="display: inline-block;"><select name="mes" style="">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select></div> / <div style="display: inline-block;"><select name="ano" style="">
<? for ($i = 1970;$i < 2000;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div></div></div>


<div class='control-group'><label class='control-label'><?= $EMPRESA ?>:<div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='empresa' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $TELEFONO ?>:<div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='telf' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $DIRECCION ?>:<div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='direccion' value=''></div></div>


<div class='control-group'><label class='control-label'><?= $MUNICIPIO ?>:<div class="vermell" style="">*</div></label>

<div class='controls' style="margin-top: -3px;"><input type="text" name="municipiosId" value=""></div></div>


<div class='control-group' style="margin-bottom:15px;"><label class='control-label'><?= $PROVINCIA ?>:<div class="vermell" style="">*</div></label>

<div class='controls' style="margin-top: 5px; margin-bottom: 15px;"><select name="provincia">
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


<div class='control-group'><label class='control-label'><?= $CODIGO_POSTAL ?>:<div class="vermell">*</div></label>

<div class='controls'><input type='text' required='required' name='codigopostal' value=''></div></div>

</div><div class="col" style="vertical-align:top;margin-top:12px;margin-left:27px;">
<p style="padding-left:0px;margin-bottom:35px;"><?= $YA_TIENES_CUENTA  ?></p>
<a class="button black" href="login" style="text-decoration:none;"><?= $INICIAR_SESION ?></a>

</div><br><br>
<input name="newsletter" value="1" type="checkbox"><div class="regis_text"> <?= $RECIBIR_NEWSLETTER ?></div><br>

<input type="checkbox" name="condiciones" required="required"><div class="regis_text"><?= $HE_LEIDO ?></div>

<br>
<input type="button" href="#modalsignup"   class="button black" value="<?= $REGISTRAR_AHORA ?>" onclick="doForm(this.form);"></form></div>

 



<? include('views/includes/footer.php'); ?>