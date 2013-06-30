<? include('views/includes/top.php'); ?>

<script src="admin/views/jQuery-ui-1.8.16/minified/jquery.ui.core.min.js"></script>
<script src="admin/views/jQuery-ui-1.8.16/minified/jquery.ui.datepicker.min.js"></script>
<script src="admin/views/jQuery-ui-1.8.16/i18n/jquery.ui.datepicker-es.js"></script>
<script src="views/lib/js/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="views/lib/css/jquery.timepicker.css">
<link rel="stylesheet" href="admin/views/jQuery-ui-1.8.16/themes/base/jquery.ui.all.css">

<div class='inside'>
	<h2>Modificar evento</h2>
	<form class='form' action='eventos/doEdit' method='POST' enctype='multipart/form-data'>
		<div class="boto-red">General</div>
		<div class="categoria-evento">
			<div class="tit"><?= $CATEGORIA_ACTO ?>: <div class="vermell">*</div></div><br>
			<div class="categoria">
				<?= $radioSubcategorias ?>
			</div>
			<div class="mini">Puedes seleccionar un máximo de 3 categorías.</div>
			<br>
			<div class="tit"><?= $TITULO ?>: <div class="vermell">*</div></div>
			<input type="text" name='titulo_<?= $lang ?>' maxlength="50" value="<?= $items['titulo_'.$lang]; ?>" required="required">
			<br>
			<div class="mini"><?= $PUEDES_ESCRIBIR_50 ?></div>
			<div class="tit"><?= $DESCRIPCION ?>:</div>
			<textarea maxlength="350" name='descripcion_<?= $lang ?>'><?= $items['descripcion_'.$lang]; ?></textarea>
			<div class="mini"><?= $PUEDES_ESCRIBIR_350 ?> </div>
			<div class="tit"><?= $IMAGEN ?>:</div>
			<img class="img_evento" src="data/img/eventos/<?= $items['imagen'] ?>">
			<br><br>
			<input type="file" name="imagen_new" value="Seleccionar archivo" onclick="">
			<br><br>
			<div class="mini"><?= $util ?></div>
		</div>
		
		<div class="boto-red"><?= $DONDE ?></div>
		<div class="categoria-evento">
			<div class="tit"><?= $LUGAR_ACTO ?>: <div class="vermell">*</div></div>
			<input type="text" name='lugar' value="<?= $items['lugar'] ?>" required="required"><br>
			<div class="tit"><?= $DIRECCION_LUGAR_ACTO ?>: <div class="vermell">*</div></div>
			<input type="text" name='direccion' value="<?= $items['direccion'] ?>" required="required"><br>
			<div class="tit"><?= $MUNICIPIO_LUGR_ACTO ?>: <div class="vermell">*</div></div><br>
			<div class="large"><?= $selectMunicipios ?></div><br><br>
		</div>

		<div class="boto-red"><?= $CUANDO ?></div>
		<div class="categoria-evento" style="width:500px;">
		<div class="tit" style="margin-bottom:4px;"><?= $FECHA_ACTO ?>: <div class="vermell">*</div></div>

		<? $aux_fecha = $items['fecha_inicio'] === $items['fecha_fin']; ?>

		<input type="radio" id="tipo_cuando_day" name="tipo_cuando" value="1" <?= $aux_fecha ? "checked='checked'" : "" ?>>
		<p>Día</p>
		<div>
			<label for="fecha1">El día</label>
			<input id="fecha1" type="text" name="fecha1" <?= $aux_fecha ? "required='required'" : "disabled='disabled'" ?> value="<?= $aux_fecha ? $items['fecha_inicio'] : '' ?>" />
		</div>

		<br>

		<input type="radio" id="tipo_cuando_range" name="tipo_cuando" value="2" <?= $aux_fecha ? "" : "checked='checked'"; ?>>
		<p>Rango de fechas</p>
		<div>
			<label for="fecha2">Desde</label>
			<input id="fecha2" type="text" name="fecha2" <?= $aux_fecha ? "disabled='disabled'" : "required='required'" ?> value="<?= $aux_fecha ? '' : $items['fecha_inicio'] ?>" />
			<br />
			<label for="fecha3">Hasta</label>
			<input id="fecha3" type="text" name="fecha3" <?= $aux_fecha ? "disabled='disabled'" : "required='required'" ?> value="<?= $aux_fecha ? '' : $items['fecha_fin'] ?>" />
		</div>

		<br>

		<div class="tit" style="margin-bottom:13px;"><?= $hor_event ?>: <div class="vermell">*</div></div>

		<? $aux_dias = explode(",", $items['dias_semana']); ?>

		<input type="checkbox" value="1" name="dias_semana[]" <?= in_array("1", $aux_dias) ? "checked='checked'" : ""; ?>> L 
		<input type="checkbox" value="2" name="dias_semana[]" <?= in_array("2", $aux_dias) ? "checked='checked'" : ""; ?>> M 
		<input type="checkbox" value="3" name="dias_semana[]" <?= in_array("3", $aux_dias) ? "checked='checked'" : ""; ?>> X 
		<input type="checkbox" value="4" name="dias_semana[]" <?= in_array("4", $aux_dias) ? "checked='checked'" : ""; ?>> J 
		<input type="checkbox" value="5" name="dias_semana[]" <?= in_array("5", $aux_dias) ? "checked='checked'" : ""; ?>> V 
		<input type="checkbox" value="6" name="dias_semana[]" <?= in_array("6", $aux_dias) ? "checked='checked'" : ""; ?>> S 
		<input type="checkbox" value="7" name="dias_semana[]" <?= in_array("7", $aux_dias) ? "checked='checked'" : ""; ?>> D 
		<br><br>

		<? $aux_hora = $items['hora_inicio2'] === $items['hora_final2'] && $items['hora_inicio2'] === '' ?>

		<input type="radio" id="tipo_horario_fixed" name="tipo_horario" value="1" <?= $aux_hora ? "checked='checked'" : "" ?>>
		<p>Fijo</p>
		<div>
			<label>De</label>
			<input type="text" id="horario1" name="horario1" style="width:75px;" <?= $aux_hora ? "required='required'" : "disabled='disabled'" ?> value="<?= $aux_hora ? $items['hora_inicio'] : '' ?>">
			<label>a</label>
			<input type="text" id="horario2" name="horario2" style="width:75px;" <?= $aux_hora ? "required='required'" : "disabled='disabled'" ?> value="<?= $aux_hora ? $items['hora_final'] : '' ?>">
		</div>

		<br>

		<input type="radio" id="tipo_horario_range" name="tipo_horario" value="2" <?= $aux_hora ? "" : "checked='checked'" ?>>
		<p>Intervalo</p>
		<div>
			<label>De</label>
			<input type="text" id="horario3" name="horario3" style="width:75px;" <?= $aux_hora ? "disabled='disabled'" : "required='required'" ?> value="<?= $aux_hora ? '' : $items['hora_inicio'] ?>">
			<label>a</label>
			<input type="text" id="horario4" name="horario4" style="width:75px;" <?= $aux_hora ? "disabled='disabled'" : "required='required'" ?> value="<?= $aux_hora ? '' : $items['hora_final'] ?>">
			<br>
			y
			<br>
			<label>De</label>
			<input type="text" id="horario5" name="horario5" style="width:75px;" <?= $aux_hora ? "disabled='disabled'" : "required='required'" ?> value="<?= $aux_hora ? '' : $items['hora_inicio2'] ?>">
			<label>a</label>
			<input type="text" id="horario6" name="horario6" style="width:75px;" <?= $aux_hora ? "disabled='disabled'" : "required='required'" ?> value="<?= $aux_hora ? '' : $items['hora_final2'] ?>">
		</div>
		<br>

		<div class="boto-red"><?= $PRECIO ?></div>
		<div class="categoria-evento">
			<div class="tit"><?= $PRECIO_ACTO ?>: <div class="vermell">*</div></div><br>

			<?
			$aux_precio_valor = floatval($items['precio']);
			$aux_precio = $aux_precio_valor > 0;
			$aux_precio_datos = $aux_precio ? explode(".", $items['precio']) : "";
			?>

			<input type="radio" name="tipo_pago" value="1" <?= $aux_precio ? "" : "checked='checked'"; ?>><p> <?= $GRATIS ?></p><br><br>

			<input type="radio" name="tipo_pago" value="2" <?= $aux_precio ? "checked='checked'" : ""; ?>><p> <?= $DE_PAGO ?>:</p><br>
			<input id="mini" type="text" name="taquilla_unidad" placeholder="00" <?= $aux_precio ? "required='required'" : "" ?> value="<?= $items['precio'] > 0 ? $aux_precio_datos[0] : '' ?>"> , <input id="mini" type="text" name="taquilla_decimal" placeholder="00" <?= $aux_precio ? "required='required'" : "" ?> value="<?= $items['precio'] > 0 ? $aux_precio_datos[1] : '' ?>"><p> €</p><br>
			<!--
			<input type="checkbox" name="anticipada" value="anticipada">   <input id="mini" type="text" name="anticipada_unidad" required="required" placeholder="00"> , <input id="mini" type="text" name="anticipada_decimal" required="required" placeholder="00"><p> € <?= $PRECIO_VENTA ?></p><br>
			-->
			<!--
			<b>Venta de entradas on-line:</b>
			<input type="text" name="url_entradas">
			<div class="mini">Introduce la dirección de la página web a través de la cual se gestionará la venta de entradas.</div>
			-->
		</div>

		<div class="boto-red">+ <?= $INFORMACION ?></div>
		<div class="categoria-evento">
			<div class="tit"><?= $telf_contact ?>:</div>
			<input type="text" name='telf' value="<?= $items['telf'] ?>">
			<div class="tit"><?= $DIRECCION_MAIL ?></div>
			<input type="text" name='email' value="<?= $items['email'] ?>">
			<div class="tit">Web:</div>
			<input type="text" name='web' value="<?= $items['web'] ?>"><br><br>
			<input type="hidden" name="destacado" value="<?= $items['destacado'] ?>">
			<input type="hidden" name="fecha_publi_ini" value="<?= $items['fecha_publi_ini'] ?>">
			<input type="hidden" name="fecha_publi_end" value="<?= $items['fecha_publi_end']?>">
			<input type="hidden" name="eventosId" value="<?= $items["id"]; ?>">
			<input type="hidden" name="imagen" value="<?= $items["imagen"]; ?>">
			<input type="button" onclick="validate(this.form);" class="button black" value="<?= $SIGUIENTE  ?>" >
		</div>
	</form>
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

<script>
$(function() {

	if ($("input[name='subcategoriasId[]']:checked").length >= 3) {
		$("input[name='subcategoriasId[]']").each(function() {
			if (!$(this).is(':checked')) {
				$(this).attr("disabled", true);
			}
		});
	}

	$("input[name='subcategoriasId[]']").on('change', function() {
		if ($("input[name='subcategoriasId[]']:checked").length == 3) {
			$("input[name='subcategoriasId[]']").each(function() {
				if (!$(this).is(':checked')) {
					$(this).attr("disabled", true);
				}
			});
		} else if ($("input[name='subcategoriasId[]']:checked").length < 3) {
			$("input[name='subcategoriasId[]']").each(function() {
				$(this).attr("disabled", false);
			});
		}
	});

	$( "#horario1, #horario2, #horario3, #horario4, #horario5, #horario6" ).timepicker({
		step: 15,
		timeFormat: 'H:i'
	});

	$( "#tipo_horario_fixed" ).change(function () {
		if($(this).is(':checked')) {
			$( "#horario1" ).attr("required", true).attr("disabled", false);
			$( "#horario2" ).attr("required", true).attr("disabled", false);
			$( "#horario3" ).attr("required", false).attr("disabled", true);
			$( "#horario4" ).attr("required", false).attr("disabled", true);
			$( "#horario5" ).attr("required", false).attr("disabled", true);
			$( "#horario6" ).attr("required", false).attr("disabled", true);
		}
	});

	$( "#tipo_horario_range" ).change(function () {
		if($(this).is(':checked')) {
			$( "#horario1" ).attr("required", false).attr("disabled", true);
			$( "#horario2" ).attr("required", false).attr("disabled", true);
			$( "#horario3" ).attr("required", false).attr("disabled", false);
			$( "#horario4" ).attr("required", false).attr("disabled", false);
			$( "#horario5" ).attr("required", false).attr("disabled", false);
			$( "#horario6" ).attr("required", false).attr("disabled", false);
		}
	});

	$( "#tipo_cuando_day" ).change(function () {
		if($(this).is(':checked')) {
			$( "#fecha1" ).attr("required", true).attr("disabled", false);
			$( "#fecha2" ).attr("required", false).attr("disabled", true);
			$( "#fecha3" ).attr("required", false).attr("disabled", true);
		}
	});

	$( "#tipo_cuando_range" ).change(function () {
		if($(this).is(':checked')) {
			$( "#fecha1" ).attr("required", false).attr("disabled", true);
			$( "#fecha2" ).attr("required", true).attr("disabled", false);
			$( "#fecha3" ).attr("required", true).attr("disabled", false);
		}
	});

	$( "#fecha1" ).datepicker({
	  defaultDate: "+4D",
	  changeMonth: true,
	  numberOfMonths: 1,
	  dateFormat: "yy-mm-dd"
	});

	$( "#fecha2" ).datepicker({
	  defaultDate: "+4D",
	  changeMonth: true,
	  numberOfMonths: 2,
	  dateFormat: "yy-mm-dd",
	  onClose: function( selectedDate ) {
	  	if (selectedDate === '') {
			$( "#fecha3" ).datepicker( "option", {"minDate": selectedDate, "maxDate": selectedDate} );
	  	} else {
			var maxDate32DaysAfter = $(this).datepicker('getDate');
	  		maxDate32DaysAfter.setDate(maxDate32DaysAfter.getDate() + 32);

	  		$( "#fecha3" ).datepicker( "option", {"minDate": selectedDate, "maxDate": maxDate32DaysAfter} );
	  	}
	  }
	});

	$( "#fecha3" ).datepicker({
	  defaultDate: "+1w",
	  changeMonth: true,
	  numberOfMonths: 2,
	  dateFormat: "yy-mm-dd",
	  onClose: function( selectedDate ) {
		if (selectedDate === '') {
			$( "#fecha2" ).datepicker( "option", {"maxDate": selectedDate, "minDate": selectedDate} );
	  	} else {
			var maxDate32DaysBefore = $(this).datepicker('getDate');
	  		maxDate32DaysBefore.setDate(maxDate32DaysBefore.getDate() - 32);

	  		$( "#fecha2" ).datepicker( "option", {"maxDate": selectedDate, "minDate": maxDate32DaysBefore} );
	  	}
	  }
	});
});
</script>

<? include('views/includes/footer.php'); ?>