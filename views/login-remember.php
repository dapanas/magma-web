<? include('views/includes/top.php'); ?>
<div class='inside'><h2><?= $DATOS_PERDIDOS ?></h2>
	<div class="col" id="borde_dret">
		<form class='form' id="formrecuperarpassword" action='accounts/doRecuperarUsuario' method='POST' enctype='multipart/form-data'>
			<p style="padding-left:0px;"><?= $USUARIO_OLVIDADO ?></p><br>
			<div class='control-group'><label class='control-label'><?= $DIRECCION_MAIL ?><div class="vermell">*</div></label>
				<div class='controls'>
					<input id="min" type='text' name='email' value='' required="required">
				</div>
			</div>
			<br>
			<input type="button" href="#modalrecuperarusuario" class="button black" value="Recuperar Usuario" onClick="doForm(this.form);">
		</form>
	</div>

	<div class="col" style="vertical-align:top;">
		<form class='form' id="formrecuperarusuario" action='accounts/doRecuperarPassword' method='POST' enctype='multipart/form-data'>
			<p style="padding-left:0px;"><?= $CONTRASENYA_OLVIDADA ?></p><br>
				<div class='control-group'><label class='control-label'><?= $NOMBRE_USUARIO ?><div class="vermell">*</div></label>
					<div class='controls'>
						<input id="min" type='text' name='username' value='' required="required">
					</div>
				</div>
				<br>
				<input type="button" href="#modalrecuperarpassword" class="button black" value="Recuperar Contraseña" onClick="doForm(this.form);">
		</form>
	</div>
</div>
<? include('views/includes/footer.php'); ?>