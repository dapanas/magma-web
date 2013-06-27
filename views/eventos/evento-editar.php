<? include('views/includes/top.php'); ?>
<div class='inside'><h2>Modificar evento</h2><form class='form' action='eventos/doEdit' method='POST' enctype='multipart/form-data'>





<div class="boto-red">General</div>
<div class="categoria-evento">

<div class="tit"><?= $CATEGORIA_ACTO ?>: <div class="vermell">*</div></div><br>
 
<div class="categoria">
<?= $radioSubcategorias ?>
</div>
<div class="tit"><?= $TITULO ?>: <div class="vermell">*</div></div>

<input type="text" name='titulo_<?= $lang ?>' maxlength="50" value='' required="required"><br>
<div class="mini"><?= $PUEDES_ESCRIBIR_50 ?></div>

<div class="tit"><?= $DESCRIPCION ?>:</div>
<textarea maxlength="350" name='descripcion_<?= $lang ?>' value=''>
</textarea>
<div class="mini"><?= $PUEDES_ESCRIBIR_350 ?> </div>

<div class="tit"><?= $IMAGEN ?>:</div>
<img class="img_evento" src="data/img/<?= $items['imagen'] ?>">
<br><br>
<input type="file" name="imagen" class="button black" value="Seleccionar archivo" onclick=""><!-- <div class="file">01.jpge</div> --> 

<br><br>
<div class="mini"><?= $util ?></div>

</div>

<div class="boto-red"><?= $DONDE ?></div>
<div class="categoria-evento">
<div class="tit"><?= $LUGAR_ACTO ?>: <div class="vermell">*</div></div>
<input type="text" name='lugar' value='' required="required"><br>
<div class="tit"><?= $DIRECCION_LUGAR_ACTO ?>: <div class="vermell">*</div></div>
<input type="text" name='direccion' value='' required="required"><br>
<div class="tit"><?= $MUNICIPIO_LUGR_ACTO ?>: <div class="vermell">*</div></div><br>
<div class="large"><?= $selectMunicipios ?></div><br><br>
</div>
<div class="boto-red"><?= $CUANDO ?></div>
<div class="categoria-evento" style="width:500px;">
<div class="tit"><?= $FECHA_ACTO ?>: <div class="vermell">*</div></div>
<input type="radio" name="tipo_cuando" value="1" checked="checked"><p> Día  </p><div class="corto"><select name="fecha1_dia" style="">
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

</select></div> / <div class="corto"><select name="fecha1_mes" style="">
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
</select></div> / <div class="mid"><select name="fecha1_ano" style="">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></div><br><br>
<input type="radio" name="tipo_cuando" value="2"><p> Entre el  </p>
<div class="corto"><select name="fecha2_dia" style="">
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
</select></div> / <div class="corto"><select name="fecha2_mes" style="">
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
</select></div> / <div class="mid"><select name="fecha2_ano" style="">
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></div><br><br>
<p style="margin-left:36px;"> <?= $I_EL ?>  </p><div class="corto"><select name="fecha3_dia" style="">
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
</select></div> / <div class="corto"><select name="fecha3_mes" style="">
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
</select></div> / <div class="mid"><select name="fecha3_ano" style="">

<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></div>
<br><br><br>
<div class="tit"><?= $hor_event ?>: <div class="vermell">*</div></div><br>

<input type="checkbox" value="1" name="dias_semana"> L 
<input type="checkbox" value="2" name="dias_semana"> M 
<input type="checkbox" value="3" name="dias_semana"> X 
<input type="checkbox" value="4" name="dias_semana"> J 
<input type="checkbox" value="5" name="dias_semana"> V 
<input type="checkbox" value="6" name="dias_semana"> S 
<input type="checkbox" value="7" name="dias_semana"> D 
<br><br>

<input type="radio" name="tipo_horario" value="1"><p> De  </p><div class="corto"><select name="horario1_hora" style="">
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
</select></div> : <div class="corto"><select name="horario1_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h a  </p><div class="corto"><select name="horario2_hora" style="">
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
</select></div> : <div class="corto"><select name="horario2_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h</p><br><br>
<input type="radio" name="tipo_horario" value="2"><p> De  </p><div class="corto"><select name="horario3_hora" style="">
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
</select></div> : <div class="corto"><select name="horario3_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h a  </p><div class="corto"><select name="horario4_hora" style="">
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
</select></div> : <div class="corto"><select name="horario4_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h</p><br><br>
<p>&nbsp;&nbsp; <?= $i_de ?>     </p><div class="corto"><select name="horario5_hora" style="">
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
</select></div> : <div class="corto"><select name="horario5_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h a  </p><div class="corto"><select name="horario6_hora" style="">
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
</select></div> : <div class="corto"><select name="horario6_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h</p><br><br>
</div>
<div class="boto-red"><?= $PRECIO ?></div>
<div class="categoria-evento">
<div class="tit"><?= $PRECIO_ACTO ?>: <div class="vermell">*</div></div><br>
<input type="radio" name="tipo_pago" value="1"><p> <?= $GRATIS ?></p><br><br>
<input type="radio" name="tipo_pago" value="2"><p> <?= $DE_PAGO ?>:</p><br>
<input id="mini" type="text" name="taquilla_unidad" required="required" placeholder="00"> , <input id="mini" type="text" name="taquilla_decimal" required="required" placeholder="00"><p> €</p><br>
<input type="checkbox" name="anticipada" value="anticipada">   <input id="mini" type="text" name="anticipada_unidad" required="required" placeholder="00"> , <input id="mini" type="text" name="anticipada_decimal" required="required" placeholder="00"><p> € <?= $PRECIO_VENTA ?></p><br>
<br>
<b>Venta de entradas on-line:</b>
<input type="text" name="url_entradas">
<div class="mini">
Introduce la dirección de la página web a través de la cual se gestionará la venta de entradas.
</div>
</div>
<div class="boto-red">+ <?= $INFORMACION ?></div>
<div class="categoria-evento">
<div class="tit"><?= $telf_contact ?>:</div>
<input type="text" name='telf' value='' required="required">
<div class="tit"><?= $DIRECCION_MAIL ?></div>
<input type="text" name='email' value='' required="required">
<div class="tit">Web:</div>
<input type="text" name='web' value='' required="required"><br><br>
<input type="hidden" name="destacado" value="<?= $items['destacado'] ?>">
<input type="hidden" name="fecha_publi_ini" value="<?= $params['fecha_publi_ini'] ?>">
<input type="hidden" name="fecha_publi_end" value="<?= $params['fecha_publi_end']?>">
<input type="button" onclick="validate(this.form);" class="button black" value="<?= $SIGUIENTE  ?>" >
</form>
</div>


<!-- hasta aqui -->



<div class='control-group'><label class='control-label'><?= $destacado ?></label>

<div class='controls'><input type='text' name='destacado' value=''></div></div>


<div class='control-group'><label class='control-label'>titulo_esp</label>

<div class='controls'><input type='text' name='titulo_esp' value=''></div></div>


<div class='control-group'><label class='control-label'>titulo_cat</label>

<div class='controls'><input type='text' name='titulo_cat' value='<?= $items['titulo_cat'] ?>'></div></div>


<div class='control-group'><label class='control-label'>categoriasId</label>

<div class='controls'><input type='text' name='categoriasId' value='<?= $items['categoriasId'] ?>'></div></div>


<div class='control-group'><label class='control-label'>subcategoriasId</label>

<div class='controls'><input type='text' name='subcategoriasId' value='<?= $items['subcategoriasId'] ?>'></div></div>


<div class='control-group'><label class='control-label'>descripcion_esp</label>

<div class='controls'><input type='text' name='descripcion_esp' value='<?= $items['descripcion_esp'] ?>'></div></div>


<div class='control-group'><label class='control-label'>descripcion_cat</label>

<div class='controls'><input type='text' name='descripcion_cat' value='<?= $items['descripcion_cat'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $IMAGEN ?></label>

<div class='controls'><input type='text' name='imagen' value='<?= $items['imagen'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $LUGAR_ACTO ?></label>

<div class='controls'><input type='text' name='lugar' value='<?= $items['lugar'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $DIRECCION ?></label>

<div class='controls'><input type='text' name='direccion' value='<?= $items['direccion'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $MUNICIPIO ?></label>

<div class='controls'><input type='text' name='municipio' value='<?= $items['municipio'] ?>'></div></div>


<div class='control-group'><label class='control-label'>fecha_inicio</label>

<div class='controls'><input type='text' name='fecha_inicio' value='<?= $items['fecha_inicio'] ?>'></div></div>


<div class='control-group'><label class='control-label'>fecha_fin</label>

<div class='controls'><input type='text' name='fecha_fin' value='<?= $items['fecha_fin'] ?>'></div></div>


<div class='control-group'><label class='control-label'>dias_semana</label>

<div class='controls'><input type='text' name='dias_semana' value='<?= $items['dias_semana'] ?>'></div></div>


<div class='control-group'><label class='control-label'>hora_inicio</label>

<div class='controls'><input type='text' name='hora_inicio' value='<?= $items['hora_inicio'] ?>'></div></div>


<div class='control-group'><label class='control-label'>hora_final</label>

<div class='controls'><input type='text' name='hora_final' value='<?= $items['hora_final'] ?>'></div></div>


<div class='control-group'><label class='control-label'>precio</label>

<div class='controls'><input type='text' name='precio' value='<?= $items['precio'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $TELEFONO ?></label>

<div class='controls'><input type='text' name='telf' value='<?= $items['telf'] ?>'></div></div>


<div class='control-group'><label class='control-label'>email</label>

<div class='controls'><input type='text' name='email' value='<?= $items['email'] ?>'></div></div>


<div class='control-group'><label class='control-label'>web</label>

<div class='controls'><input type='text' name='web' value='<?= $items['web'] ?>'></div></div>


<div class='control-group'><label class='control-label'>publicado</label>

<div class='controls'><input type='text' name='publicado' value='<?= $items['publicado'] ?>'></div></div>


<div class='control-group'><label class='control-label'>fecha_registro</label>

<div class='controls'><input type='text' name='fecha_registro' value='<?= $items['fecha_registro'] ?>'></div></div>


<div class='control-group'><label class='control-label'>fecha_publicado</label>

<div class='controls'><input type='text' name='fecha_publicado' value='<?= $items['fecha_publicado'] ?>'></div></div>

<input type="hidden" name="eventosId" value="<?= $items["id"]; ?>"><input type="button" onclick="validate(this.form);"></form></div>
<? include('views/includes/footer.php'); ?>