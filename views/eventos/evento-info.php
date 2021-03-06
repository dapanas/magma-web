<? include('views/includes/top.php'); ?>

<script src="admin/views/jQuery-ui-1.8.16/minified/jquery.ui.core.min.js"></script>
<script src="admin/views/jQuery-ui-1.8.16/minified/jquery.ui.datepicker.min.js"></script>
<script src="admin/views/jQuery-ui-1.8.16/i18n/jquery.ui.datepicker-es.js"></script>
<script src="views/lib/js/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="views/lib/css/jquery.timepicker.css">
<link rel="stylesheet" href="admin/views/jQuery-ui-1.8.16/themes/base/jquery.ui.all.css">

<style type="text/css">
.categoria > ul {
	padding-left: 0px;
	list-style: none;
}

.categoria > ul > li > ul {
	padding-left: 0px;
	list-style: none;
}
</style>

<div id="evento-info" class='inside'>
	<?  if ($destacado): ?>
	<h2><?= $public_desta ?></h2>
	<!-- <h3 class="light">Fechas publicación · <b><?= $INFORMACION ?></b> · <?= $RESUMEN ?> · <?= $CONFIRMACION ?></h3> -->
	<img src="views/img/step2.jpg">
	<br>
	<? else:?>
	<h2><?= $publi_even ?></h2>
	<h3 class="light book"><span class="demibold"><?= $INFORMACION ?></span> · <?= $RESUMEN ?> · <?= $CONFIRMACION ?></h3>
	<? endif;?>

	<form id="formaddnew" action="eventos/doAdd" method="post" name="form1" enctype="multipart/form-data">
		<div class="boto-red">General</div>
		<div class="categoria-evento">
			<div class="tit"><?= $CATEGORIA_ACTO ?>: <div class="vermell">*</div></div>
			<div class="categoria">
				<?= $checkboxesCategoriasSubcategorias ?>
			</div>
			<div class="mini"><?= $MAXIMO_3_CATS ?></div>
			<br>

			<div class="tit"><?= $TITULO ?>: <div class="vermell">*</div></div>
			<input type="text" name='titulo_<?= $lang ?>' maxlength="50" value='' required="required">
			<div class="mini"><?= $PUEDES_ESCRIBIR_50 ?></div>
			
			<div class="tit"><?= $DESCRIPCION ?>:</div>
			<textarea maxlength="350" name='descripcion_<?= $lang ?>' value=''></textarea>
			<div class="mini"><?= $PUEDES_ESCRIBIR_350 ?> </div>

			<div class="tit"><?= $IMAGEN ?>:</div>
			<!-- <img class="img_evento" src="views/img/slider1.jpg"> -->
			<input type="file" name="imagen" value="Seleccionar archivo"><!-- <div class="file">01.jpge</div> --><br>
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
			<input type="radio" id="tipo_cuando_day" name="tipo_cuando" value="1" checked="checked">
			<p>Día</p>
			<div>
				<p>El día</p>
				<input id="fecha1" type="text" value="" name="fecha1" required="required" />
			</div>
			<br>

			<input type="radio" id="tipo_cuando_range" name="tipo_cuando" value="2">
			<p><?= $RANGO_DE_FECHAS ?></p>
			<div>
				<p for="fecha2">Desde</p>
				<input id="fecha2" type="text" value="" name="fecha2" disabled="disabled" />
				<br />
				<p for="fecha3"><?= $HASTA ?></p>
				<input id="fecha3" type="text" value="" name="fecha3" disabled="disabled" />
			</div>
			<br>
			<div class="tit" style="margin-bottom:13px;"><?= $hor_event ?>: <!-- <div class="vermell">*</div> --></div>
			<?
				$DS['cat'] = array('','Dl','Dt','Dc','Dj','Dv','Ds','Dg');
				$DS['esp'] = array('','L','M','X','J','V','S','D');
			
			?><p>
			<input type="checkbox" value="1" name="dias_semana[]"> <?= $DS[$lang][1] ?>&nbsp;&nbsp;
			<input type="checkbox" value="2" name="dias_semana[]"> <?= $DS[$lang][2] ?>&nbsp;&nbsp;
			<input type="checkbox" value="3" name="dias_semana[]"> <?= $DS[$lang][3] ?>&nbsp;&nbsp; 
			<input type="checkbox" value="4" name="dias_semana[]"> <?= $DS[$lang][4] ?>&nbsp;&nbsp; 
			<input type="checkbox" value="5" name="dias_semana[]"> <?= $DS[$lang][5] ?>&nbsp;&nbsp; 
			<input type="checkbox" value="6" name="dias_semana[]"> <?= $DS[$lang][6] ?>&nbsp;&nbsp; 
			<input type="checkbox" value="7" name="dias_semana[]"> <?= $DS[$lang][7] ?>&nbsp;&nbsp; </p>
			<br><br>

			<input type="radio" id="tipo_horario_none" name="tipo_horario" value="0" checked='checked'>
			<p><?= $SIN_HORARIO ?></p>
			<br>

			<input type="radio" id="tipo_horario_fixed" name="tipo_horario" value="1">
			<p><?= $FIJO ?></p>
			<div>
				<p>De</p>
				<input type="text" id="horario1" name="horario1" style="width:75px;" disabled="disabled">
				<p>a</p>
				<input type="text" id="horario2" name="horario2" style="width:75px;" disabled="disabled">
			</div>
			<br>

			<input type="radio" id="tipo_horario_range" name="tipo_horario" value="2">
			<p><? if ($lang=='cat') echo 'Interval';else echo 'Intervalo';?></p>
			<div>
				<p>De</p>
				<input type="text" id="horario3" name="horario3" style="width:75px;" disabled="disabled">
				<p>a</p>
				<input type="text" id="horario4" name="horario4" style="width:75px;" disabled="disabled">
				<br>
				<p><? if ($_SESSION['lang'] == 'cat') echo 'i';else echo 'y'; ?></p>
				<br>
				<p>De</p>
				<input type="text" id="horario5" name="horario5" style="width:75px;" disabled="disabled">
				<p>a</p>
				<input type="text" id="horario6" name="horario6" style="width:75px;" disabled="disabled">
			</div>
		</div>
		<br>

		<div class="boto-red"><?= $PRECIO ?></div>
		<div class="categoria-evento">
			<div class="tit" style="margin-bottom:18px"><?= $PRECIO_ACTO ?>: <div class="vermell">*</div></div>
			<input type="radio" name="tipo_pago" value="1" checked="checked">
			<p> <?= $GRATIS ?></p><br><br>
			<input type="radio" name="tipo_pago" value="2"><p> <?= $DE_PAGO ?>:</p><br>
			<input id="mini" type="text" name="taquilla_unidad" placeholder="00"> , <input id="mini" type="text" name="taquilla_decimal"  placeholder="00"><p> €</p><br>

			<!--
			<input type="checkbox" name="anticipada" value="anticipada">   <input style="margin-top: 10px;" id="mini" type="text" name="anticipada_unidad" placeholder="00"> , <input id="mini" type="text" name="anticipada_decimal"  placeholder="00"><p> € <?= $PRECIO_VENTA ?></p><br>
			-->

			<!--
			<b>Venta de entradas on-line:</b>
			<input type="text" name="url_entradas">
			<div class="mini">Introduce la dirección de la página web a través de la cual se gestionará la venta de entradas.</div>
			-->
		</div>

		<div class="boto-red" style="margin-top: 25px;">+ <?= $INFORMACION ?></div>
		<div class="categoria-evento">
			<div class="tit" style="margin-top: 10px;"><?= $telf_contact ?>:</div>
			<input type="text" name='telf' value="">
			<div class="tit" style="margin-top: 10px;"><?= $DIRECCION_MAIL ?></div>
			<input type="text" name='email' value="">
			<div class="tit">Web:</div>
			<input type="text" name='web' value="" style="margin-bottom: 15px;"><br>
			<input type="hidden" name="destacado" value="<?= $destacado ?>">
			<input type="hidden" name="periodo" value="<?= isset($params['periodo']) ? $params['periodo'] : ''; ?>">
			<input type="hidden" name="fecha_publi_ini" value="<?= $params['fecha_publi_ini'] ?>">
			<input type="hidden" name="fecha_publi_end" value="<?= $params['fecha_publi_end']?>">
			<? if (isset($destacado) && $destacado == 1): ?>
			<input type="button" class="button black" value="Anterior" onclick="history.back(-1)" style="padding: 0 26px;position:relative;left:-15px;">
			<? endif; ?>
			<? if (!isset($op) or $op != 'edit'): ?>
			<input type="button" onclick="extraValidate(this.form);" class="button black" value="<?= $SIGUIENTE ?> " style="margin-left: -14px;position:relative;left:-15px;">
			<? else: ?>
			<input type="button" onclick="window.location.href='eventos/edit/<?=$eventosId?>'" class="button black" value="<?= $MODIFICAR_EVENTO ?>" >
			<input type="button" onclick="window.location.href='eventos/edit/<?=$eventosId?>'" class="button black" value="<?= $CANCELAR_EVENTO ?>" >
			<? endif; ?>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('input[name="titulo_esp"],input[name="titulo_cat"]').jqEasyCounter({
			'maxChars': 50,
			'maxCharsWarning': 45
		});
	$('textarea[name="descripcion_esp"],textarea[name="descripcion_cat"]').jqEasyCounter({
			'maxChars': 350,
			'maxCharsWarning': 345
		});		
</script>

<script type="text/javascript">
function extraValidate (form) {
	if ($("input[name='subcategoriasId[]']:checked").length >= 1) {
		validate(form);
	} else {
		alert("Debe seleccionar al menos una cateogría");
		$("input[name='subcategoriasId[]']").focus();
	}
}

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

	$( "#tipo_horario_none" ).change(function () {
		if($(this).is(':checked')) {
			$( "#horario1" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario2" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario3" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario4" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario5" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario6" ).attr("required", false).attr("disabled", true).val("");
		}
	});

	$( "#tipo_horario_fixed" ).change(function () {
		if($(this).is(':checked')) {
			$( "#horario1" ).attr("required", true).attr("disabled", false);
			$( "#horario2" ).attr("required", true).attr("disabled", false);
			$( "#horario3" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario4" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario5" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario6" ).attr("required", false).attr("disabled", true).val("");
		}
	});

	$( "#tipo_horario_range" ).change(function () {
		if($(this).is(':checked')) {
			$( "#horario1" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario2" ).attr("required", false).attr("disabled", true).val("");
			$( "#horario3" ).attr("required", true).attr("disabled", false);
			$( "#horario4" ).attr("required", true).attr("disabled", false);
			$( "#horario5" ).attr("required", true).attr("disabled", false);
			$( "#horario6" ).attr("required", true).attr("disabled", false);
		}
	});

	$( "#tipo_cuando_day" ).change(function () {
		if($(this).is(':checked')) {
			$( "#fecha1" ).attr("required", true).attr("disabled", false);
			$( "#fecha2" ).attr("required", false).attr("disabled", true).val("");
			$( "#fecha3" ).attr("required", false).attr("disabled", true).val("");
		}
	});

	$( "#tipo_cuando_range" ).change(function () {
		if($(this).is(':checked')) {
			$( "#fecha1" ).attr("required", false).attr("disabled", true).val("");
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

	$( "#tipo_pago_gratis" ).change(function () {
		if($(this).is(':checked')) {
			$( "input[name='taquilla_unidad']" ).attr("required", false).attr("disabled", true).val("");
			$( "input[name='taquilla_decimal']" ).attr("required", false).attr("disabled", true).val("");
		}
	});

	$( "#tipo_pago_no_gratis" ).change(function () {
		if($(this).is(':checked')) {
			$( "input[name='taquilla_unidad']" ).attr("required", true).attr("disabled", false);
			$( "input[name='taquilla_decimal']" ).attr("required", true).attr("disabled", false);
		}
	});
});
</script>

<? include('views/includes/footer.php'); ?>
