<? include('views/includes/top.php'); ?>
<div class='inside'>
	<h2><?= $DATOS_CUENTA ?></h2>
	<div class='control-group'>
		<label class='control-label'><?= $NOMBRE_USUARIO ?></label>
		<div class='controls'>
			<input disabled="disabled" type='text' name='username' value='<?= $items['username'] ?>'>
		</div>
	</div>

	<div class='control-group'>
		<label class='control-label'><?= $DIRECCION_MAIL ?></label>
		<div class='controls'>
			<input disabled="disabled" type='text' name='email' value='<?= $items['email'] ?>'>
		</div>
	</div>

	<input disabled="disabled" type="hidden" name="accountsId" value="<?= $_SESSION["accountId"]; ?>">

	<!-- <input disabled="disabled" type="button" class="button black" value="Guardar" onclick="validate(this.form);"></form> -->
	<div class="text_cuenta">
		<input id="newsletter" name="newsletter" value="1" type="checkbox" <?= $items['newsletter'] ? "checked='checked'" : "" ?> onclick="setNewsletter();">
		<div class="regis_text" style="width:290px;"><?= $RECIBIR_NEWSLETTER ?></div>
	</div>

	<div class="text_cuenta"><a href="accounts/index/user"><?= $CANVIAR_NOMBRE ?></a></div>
	<div class="text_cuenta"><a href="accounts/index/email"><?= $CANVIAR_MAIL ?></a></div>
	<div class="text_cuenta"><a href="accounts/index/password"><?= $CANVIAR_CONTRASENYA ?></a></div>
</div>

<script type="text/javascript">
function setNewsletter () {
	var isChecked = $("#newsletter").is(":checked") ? 1 : 0;
	$.ajax({
		type: "POST",
		url: "accounts/updateNewsletter",
		data: {value: isChecked}
	})
	.done(function (data) { alert("<?= $CAMBIARNEWSLETTEROK ?>"); })
	.fail(function () { alert("<?= $CAMBIARNEWSLETTERERROR ?>"); });
}
</script>

<? include('views/includes/footer.php'); ?>