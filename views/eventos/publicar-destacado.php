<? include('views/includes/top.php'); ?>
<script src="admin/views/jQuery-ui-1.8.16/minified/jquery.ui.core.min.js"></script>


	
		<script src="admin/views/jQuery-ui-1.8.16/minified/jquery.ui.datepicker.min.js"></script>
	
		<script src="admin/views/jQuery-ui-1.8.16/i18n/jquery.ui.datepicker-es.js"></script>
		<link rel="stylesheet" href="admin/views/jQuery-ui-1.8.16/themes/base/jquery.ui.all.css">		
<div id="evento-info" class='inside'>
<h2><?= $public_desta ?></h2>
<img src="views/img/step1.jpg"><br>
<h3>Periodo de publicación</h3>
<form name="form1" method="post" action="eventos/add/destacado">
<input type="radio" required="required" name="periodo" value="1" checked> <b>1 <?= $SEMANA ?>:</b> 100&euro;<br>
<input type="radio" required="required" name="periodo" value="2"> <b>2 <?= $SEMANAS ?>:</b> 180&euro; (10% DTO.) <br>
<input type="radio" required="required" name="periodo" value="3"> <b>3 <?= $SEMANAS ?>:</b> 255&euro; (15% DTO.) <br>
<input type="radio" required="required" name="periodo" value="4"> <b>4 <?= $SEMANAS ?>:</b> 320&euro; (20% DTO.)
<br><br>
<div class="mini">
<?= $IVA_NO_INCLUIDO ?>.<br>
<?= $PRECIO_FINAL ?>
</div>


<b><?=$FECHA_PUBLICACION?>:</b><div class="vermell">*</div>

<input type="text" required="required" value="" name="fecha_publi_ini">
<div class="mini">

<?= $RECUERDA_PUBLICAR?>
</div>


<input type="button" onclick="validate(this.form);" class="button black" value="<?= $SIGUIENTE ?>">
</form>

<script>
var today = new Date();
var tomorrow = new Date();
tomorrow.setDate(today.getDate()+4);

$('input[name="fecha_publi_ini"]').datepicker({ minDate: tomorrow, dateFormat: 'dd/mm/yy',});



</script>

</div>
<? include('views/includes/footer.php'); ?>