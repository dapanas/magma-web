<!-- compra credits -->
<div class="modal hide fade" id="">
	<div class="modal_text" style="margin-top:80px;">
		<?= $modal_compra ?>
	</div>
	<div class="boto">
		<input width="80" type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
	</div>
</div>

<!-- modificar + informacion -->
<div class="modal hide fade" id="modificarinfo">
	<div class="modal_text"style="margin-top:40px">
		<div class="modal_tit">Modificar + <?= $INFORMACION ?></div>
		<?= $modal_inf ?>
	</div> 
	<div class="boto">
		<input type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
	</div> 
</div>

<!-- modificar CUANDO -->
<div class="modal hide fade" id="modificarcuando">
	<div class="modal_text"style="margin-top:20px">
		<div class="modal_tit">Modificar <?= $CUANDO ?></div>
		<?= $modal_cuan ?>
	</div>
	<div class="boto">
		<input type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
	</div> 
</div>

<!-- modificar DONDE -->
<div class="modal hide fade" id="modificardonde">
	<div class="modal_text"style="margin-top:40px">
		<div class="modal_tit">Modificar <? $DONDE ?></div>
		<?= $modal_dond ?>
	</div>
	<div class="boto">
		<input type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
	</div> 
</div>

<!-- modificar PRECIO -->
<div class="modal hide fade" id="modificarprecio">
	<div class="modal_text"style="margin-top:40px">
		<div class="modal_tit">Modificar <?= $PRECIO ?></div>
		<?= $modal_prix ?></div>
		<div class="boto">
			<input type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
		</div> 
</div>

<!-- modificar cambios con cargo -->
<div class="modal hide fade" id="">
	<div class="modal_text"style="margin-top:70px">
		<div class="modal_tit"><?= $publi_canvi ?></div>
		<?= $modal_cargo ?>
	</div>
	<div class="boto">
		<input type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
	</div> 
</div>

<!-- modificar cancelacion -->
<div class="modal hide fade" id="modificarcancelacion">
	<div class="modal_text"style="margin-top:20px">
		<div class="modal_tit"><?= $publi_cancel ?></div>
		<?= $modal_cancel ?>
	</div>
	<div class="boto">
		<input type="button" class="button boto" value="<?= $CERRAR ?>" data-dismiss="modal">
	</div>
</div>

<!-- registrar ahora -->
<div class="modal hide fade" id="modalsignup">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_now ?>
	</div>
	<br>
	<button class="btn" onclick="window.location.href = 'login/login';"><?= $CERRAR ?></button> 
</div>

<!-- modificar cuenta activada -->
<div class="modal hide fade" id="cuentaactivada">
	<div class="modal_text" style="margin-top:90px">
		<div class="modal_tit"><?= $modal_active ?></div>
		<br>
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?= $CERRAR ?></button>
	</div>
</div>

<!-- recuperar contraseña -->
<div class="modal hide fade" id="modalrecuperarpassword">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_recuperarpassword ?>
	</div>
	<br>
	<a class="button boto" onclick="window.location.href = 'login/login';"><?= $CERRAR ?></a> 
</div>

<!-- recuperar usuario -->
<div class="modal hide fade" id="modalrecuperarusuario">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_recuperarusuario ?>
	</div>
	<a class="button boto" onclick="window.location.href = 'login/login';"><?= $CERRAR ?></a> 
</div>

<!-- cambiar usuario -->
<div class="modal hide fade" id="modalcambiarusuario">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_cambiarusuario ?>
	</div>
	<a class="button boto" onclick="window.location.href = 'accounts/index';"><?= $CERRAR ?></a> 
</div>

<!-- cambiar email -->
<div class="modal hide fade" id="modalcambiarcorreo">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_cambiarcorreo ?>
	</div>
	<a class="button boto" onclick="window.location.href = 'accounts/index';"><?= $CERRAR ?></a> 
</div>

<!-- cambiar password -->
<div class="modal hide fade" id="modalcambiarpassword">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_cambiarpassword ?>
	</div>
	<a class="button boto" onclick="window.location.href = 'accounts/index';"><?= $CERRAR ?></a> 
</div>

<!-- actualizar datos de contacto -->
<div class="modal hide fade" id="modalactualizarinfo">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_actualizarinfo ?>
	</div>
	<a class="button boto" onclick="window.location.href = 'accounts/index';"><?= $CERRAR ?></a> 
</div>

<!-- actualizar datos de facturacion -->
<div class="modal hide fade" id="modalactualizarfacturacion">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_actualizarinfofacturacion ?>
	</div>
	<a class="button boto" onclick="window.location.href = 'accountsfacturacion';"><?= $CERRAR ?></a> 
</div>
