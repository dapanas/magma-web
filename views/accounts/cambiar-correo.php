<? include('views/includes/top.php'); ?>
<div class='inside'>
	<h2><?= $DATOS_CUENTA ?></h2>
	<div class="col" id="borde_dret">
		<div class='control-group'><label class='control-label'><?= $NOMBRE_USUARIO ?></label>
			<div class='controls'>
				<input disabled="disabled" type='text' name='username' value='<?= $items['username'] ?>'>
			</div>
		</div>
		<div class='control-group'><label class='control-label'><?= $DIRECCION_MAIL ?></label>
			<div class='controls'>
				<input disabled="disabled" type='text' name='email' value='<?= $items['email'] ?>'>
			</div>
		</div>

		<div class="text_cuenta" style="margin-top:26px;"><a href="accounts/index/user"><?= $CANVIAR_NOMBRE ?></a></div>
		<div class="text_cuenta"><a href="accounts/index/email"><?= $CANVIAR_MAIL ?></a></div>
		<div class="text_cuenta"><a href="accounts/index/password"><?= $CANVIAR_CONTRASENYA ?></a></div>
	</div>

	<div class="col" style="vertical-align:top;">
		<form class='form' id="formcambiarcorreo" action='accounts/doEdit' method='POST' enctype='multipart/form-data'>
			<h3 id="none"><?= $CANVIAR_MAIL ?></h3>
			<div class='control-group'><label class='control-label'><?= $NUEVO_MAIL ?>:<div class="vermell">*</div></label>
				<div class='controls'>
					<input id="min" required="required" type='text' name='email' value='<?= $items['email'] ?>'>
				</div>
			</div>
			<div class='control-group'><label class='control-label'><?= $REPITE_MAIL ?>:<div class="vermell">*</div></label>
				<div class='controls'>
					<input id="min" required="required" type='text' name='email_verificacion' value='<?= $items['email'] ?>'>
				</div>
			</div>
			<input type="hidden" name="accountsId" value="<?= $_SESSION["accountId"]; ?>">
			<input type="button" href="#modalcambiarcorreo" class="button black" value="<?= $GUARDAR_T ?>" onclick="doForm(this.form);">
		</form>
	</div>
</div>
<? include('views/includes/footer.php'); ?>