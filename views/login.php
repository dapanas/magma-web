<? include('views/includes/top.php'); ?>
<div id="login" >


<div class="inside">
<h2><?= $INICIAR_SESION ?></h2>
<div class="col " style="width: 311px; border-right: 1px dotted black;">
<form name="login" action="login/doLogin" method="POST">
<label><?= $NOMBRE_USUARIO ?></label>
<input type="text" required="required" style="width: 270px;" name="username">
<label><?= $CONTRASENYA ?></label>
<input type="password" required="required" style="width: 270px;" name="password"><br><br>
<input type="checkbox" name="remember" checked="checked" > <?= $MANTENER_SESION ?>
<input type="button" onclick="validate(this.form);" class="button black" value="<?= $INICIAR_SESION ?>">
</form>


<a href="accounts/recuperarPassword" id="lex" style="color: #404040;"><?= $HAS_OLVIDADO ?></a>

</div>
<div class="col right" style="vertical-align:top;">
<div style="margin-bottom:25px;line-height: 17px;"><?= $TODAVIA_NO ?><br>
<?= $REGISTRATE ?></div>
<a class="button black" href="accounts/add"><?= $REGISTRARSE ?></a>
</div>

</div>
</div>

<? if ($activate != -1 and $activate == 'activate'): ?>
<script>
$(document).ready(function(){
	$('#cuentaactivada').modal('show');
});
</script>
<? endif; ?>
<? include('views/includes/footer.php'); ?>