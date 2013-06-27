<? include('views/includes/top.php'); ?>
<div class='inside'><h2><?= $DATOS_PERDIDOS ?></h2>

<div class="col" id="borde_dret">
<form class='form' action='accounts/edit' method='POST' enctype='multipart/form-data'>

<p style="padding-left:0px;"><?= $USUARIO_OLVIDADO ?></p><br>

<div class='control-group'><label class='control-label'><?= $DIRECCION_MAIL ?>:</label>

<div class='controls'><input id="min" type='text' name='email' value=''></div></div>

<br><input type="submit" class="button black" value="Enviar">

</div>

<div class="col" style="vertical-align:top;">
<p style="padding-left:0px;"><?= $CONTRASENYA_OLVIDADA ?></p><br>
<div class='control-group'><label class='control-label'><?= $NOMBRE_USUARIO ?></label>

<div class='controls'><input id="min" type='text' name='email' value=''></div></div>
<br><input type="button" class="button black" value="Enviar" onclick="">
</div>
</div>
<? include('views/includes/footer.php'); ?>