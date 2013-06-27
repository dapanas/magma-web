<? include('views/includes/top.php'); ?>

<div id="evento-info" class='inside'>
<?  if ($destacado): ?>
<h2><?= $public_desta ?></h2>
<!-- <h3 class="light">Fechas publicación · <b><?= $INFORMACION ?></b> · <?= $RESUMEN ?> · <?= $CONFIRMACION ?></h3> -->
<img src="views/img/step2.jpg"><br><br>
<? else:?>
<h2><?= $publi_even ?></h2>
<h3 class="light book"><span class="demibold"><?= $INFORMACION ?></span> · <?= $RESUMEN ?> · <?= $CONFIRMACION ?></h3>
<? endif;?>


<form action="eventos/doAdd" method="post" name="form1" enctype="multipart/form-data">
<div class="boto-red">General</div>
<div class="categoria-evento">

<div class="tit"><?= $CATEGORIA_ACTO ?>: <div class="vermell">*</div></div>
 
<div class="categoria">
<?= $radioSubcategorias ?>
</div>
<div class="mini">Puedes seleccionar un máximo de 3 categorías.</div>
<br>
<div class="tit"><?= $TITULO ?>: <div class="vermell">*</div></div>

<input type="text" name='titulo_<?= $lang ?>' maxlength="50" value='' required="required">
<div class="mini"><?= $PUEDES_ESCRIBIR_50 ?></div>

<div class="tit"><?= $DESCRIPCION ?>:</div>
<textarea maxlength="350" name='descripcion_<?= $lang ?>' value=''>
</textarea>
<div class="mini"><?= $PUEDES_ESCRIBIR_350 ?> </div>

<div class="tit"><?= $IMAGEN ?>:</div>
<!-- <img class="img_evento" src="views/img/slider1.jpg"> -->

<input type="file" name="imagen" value="Seleccionar archivo" onclick=""><!-- <div class="file">01.jpge</div> --> 

<br>
<div class="mini"><?= $util ?></div>

</div>

<div class="boto-red"><?= $DONDE ?></div>
<div class="categoria-evento">
<div class="tit" style="margin-top:11px;"><?= $LUGAR_ACTO ?>: <div class="vermell">*</div></div>
<input type="text" name='lugar' value='' required="required"><br>
<div class="tit" style="margin-top:11px;"><?= $DIRECCION_LUGAR_ACTO ?>: <div class="vermell">*</div></div>
<input type="text" name='direccion' value='' required="required"><br>
<div class="tit" style="margin-top:11px;"><?= $MUNICIPIO_LUGR_ACTO ?>: <div class="vermell">*</div></div>
<div class="large" style="margin-top: 5px"><?= $selectMunicipios ?></div><br>
</div>
<div class="boto-red"><?= $CUANDO ?></div>
<div class="categoria-evento" style="width:500px;">
<div class="tit" style="margin-bottom:4px;"><?= $FECHA_ACTO ?>: <div class="vermell">*</div></div>
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
</select></div> / <div class="mid" style="margin-bottom: 18px;"><select name="fecha1_ano" style="">

<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></div><br>
<input type="radio" name="tipo_cuando" value="2"><p> Entre el  </p>
<div class="corto"><select name="fecha2_dia" style="">
<? for ($i = 1;$i < 32;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
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
</select></div> / <div class="mid" style="margin-bottom:9px;"><select name="fecha2_ano" style="">
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></div><br>
<p style="margin-left:41px;"> <?= $I_EL ?>  </p><div class="corto"><select name="fecha3_dia" style="">
<? for ($i = 1;$i < 32;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
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
<br><br>
<div class="tit" style="margin-bottom:13px;"><?= $hor_event ?>: <div class="vermell">*</div></div>

<input type="checkbox" value="1" name="dias_semana[]"> L 
<input type="checkbox" value="2" name="dias_semana[]"> M 
<input type="checkbox" value="3" name="dias_semana[]"> X 
<input type="checkbox" value="4" name="dias_semana[]"> J 
<input type="checkbox" value="5" name="dias_semana[]"> V 
<input type="checkbox" value="6" name="dias_semana[]"> S 
<input type="checkbox" value="7" name="dias_semana[]"> D 
<br><br>

<input type="radio" name="tipo_horario" value="1" checked="checked"><p> De  </p><div class="corto"><select name="horario1_hora" style="">
<? for ($i = 0;$i < 25;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div> : <div class="corto"><select name="horario1_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h a  </p><div class="corto"><select name="horario2_hora" style="">
<? for ($i = 0;$i < 25;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div> : <div class="corto"><select name="horario2_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h</p><br><br>
<input type="radio" name="tipo_horario" value="2"><p> De  </p><div class="corto"><select name="horario3_hora" style="">
<? for ($i = 0;$i < 25;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div> : <div class="corto"><select name="horario3_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h a  </p><div class="corto"><select name="horario4_hora" style="">
<? for ($i = 0;$i < 25;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div> : <div class="corto"><select name="horario4_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h</p><br><br>
<p>&nbsp;&nbsp; <?= $i_de ?>     </p><div class="corto"><select name="horario5_hora" style="">
<? for ($i = 0;$i < 25;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div> : <div class="corto"><select name="horario5_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h a  </p><div class="corto"><select name="horario6_hora" style="">
<? for ($i = 0;$i < 25;$i++): ?>
<option value="<?= $i?>"><?= $i?></option>
<? endfor; ?>
</select></div> : <div class="corto"><select name="horario6_minuto" style="">
<option value="00">00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select></div><p> h</p><br>
</div>
<div class="boto-red"><?= $PRECIO ?></div>
<div class="categoria-evento">
<div class="tit" style="margin-bottom:18px"><?= $PRECIO_ACTO ?>: <div class="vermell">*</div></div>
<input type="radio" name="tipo_pago" value="1" checked="checked"><p> <?= $GRATIS ?></p><br><br>
<input type="radio" name="tipo_pago" value="2"><p> <?= $DE_PAGO ?>:</p><br>
<input id="mini" type="text" name="taquilla_unidad"  placeholder="00"> , <input id="mini" type="text" name="taquilla_decimal"  placeholder="00"><p> €</p><br>
<input type="checkbox" name="anticipada" value="anticipada">   <input style="margin-top: 10px;" id="mini" type="text" name="anticipada_unidad" placeholder="00"> , <input id="mini" type="text" name="anticipada_decimal"  placeholder="00"><p> € <?= $PRECIO_VENTA ?></p><br>

<!--
<b>Venta de entradas on-line:</b>
<input type="text" name="url_entradas">
<div class="mini">
Introduce la dirección de la página web a través de la cual se gestionará la venta de entradas.
</div>
-->
</div>
<div class="boto-red" style="margin-top: 25px;">+ <?= $INFORMACION ?></div>
<div class="categoria-evento">
<div class="tit" style="margin-top: 10px;"><?= $telf_contact ?>:</div>
<input type="text" name='telf' value='' required="required">
<div class="tit" style="margin-top: 10px;"><?= $DIRECCION_MAIL ?></div>
<input type="text" name='email' value='' required="required">
<div class="tit">Web:</div>
<input type="text" name='web' value='' required="required" style="margin-bottom: 15px;"><br>
<input type="hidden" name="destacado" value="<?= $destacado ?>">
<input type="hidden" name="periodo" value="<?= $params['periodo'] ?>">
<input type="hidden" name="fecha_publi_ini" value="<?= $params['fecha_publi_ini'] ?>">
<input type="hidden" name="fecha_publi_end" value="<?= $params['fecha_publi_end']?>">
<? if (!isset($op) or $op != 'edit'): ?>
<input type="button" onclick="validate(this.form);" class="button black" value="<?= $SIGUIENTE ?> " style="margin-left: -14px;">
<? else: ?>
<input type="button" onclick="window.location.href='eventos/edit/<?=$eventosId?>'" class="button black" value="<?= $MODIFICAR_EVENTO ?>" >
<input type="button" onclick="window.location.href='eventos/edit/<?=$eventosId?>'" class="button black" value="<?= $CANCELAR_EVENTO ?>" >
<? endif; ?>
</form>
</div>
</div>
<script>
	$('input[name="titulo_esp"],input[name="titulo_cat"]').jqEasyCounter({
			'maxChars': 50,
			'maxCharsWarning': 45
		});
	$('textarea[name="descripcion_esp"],textarea[name="descripcion_cat"]').jqEasyCounter({
			'maxChars': 350,
			'maxCharsWarning': 345
		});		
</script>
<? include('views/includes/footer.php'); ?>
