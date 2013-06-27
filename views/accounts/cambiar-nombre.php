<? include('views/includes/top.php'); ?>
<div class='inside'><h2><?= $DATOS_CUENTA ?></h2>

<div class="col" id="borde_dret">

<div class='control-group'><label class='control-label'><?= $NOMBRE_USUARIO ?></label>

<div class='controls'><input disabled="disabled" type='text' name='username' value='<?= $items['username'] ?>'></div></div>


<div class='control-group'><label class='control-label'><?= $DIRECCION_MAIL ?></label>

<div class='controls'><input disabled="disabled" type='text' name='email' value='<?= $items['email'] ?>'></div></div>



<div class="text_cuenta" style="margin-top:26px;"><a href="accounts/index/user"><?= $CANVIAR_NOMBRE ?></a></div>
<div class="text_cuenta"><a href="accounts/index/email"><?= $CANVIAR_MAIL ?></a></div>
<div class="text_cuenta"><a href="accounts/index/password"><?= $CANVIAR_CONTRASENYA ?></a></div></div>


<div class="col" style="vertical-align:top;">
<form class='form' action='accounts/doEdit' method='POST' enctype='multipart/form-data'>
<h3 id="none"><?= $CANVIAR_NOMBRE ?></h3>
<div class='control-group'><label class='control-label'><?= $NUEVO_NOMBRE ?>:<div class="vermell">*</div></label>

<div class='controls'><input id="min" type='text' name='username' value='<?= $items['username'] ?>'></div></div>
<input type="hidden" name="accountsId" value="<?= $_SESSION["accountId"]; ?>">
<input type="button" class="button black" value="<?= $GUARDAR_T ?>" onclick="validate(this.form);">
</div>

</form>
</div>
<? include('views/includes/footer.php'); ?>