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
	<div class="boto">
	<input type="button" class="button boto" onclick="window.location.href = 'login/login';" value="<?= $CERRAR ?>">
	</div>
</div>

<!-- modificar cuenta activada -->
<div class="modal hide fade" id="cuentaactivada">
	<div class="modal_text" style="margin-top:90px">
		<div class="modal_tit"><?= $modal_active ?></div>
		</div>
		<div class="boto">
			<input type="button" class="button boto" data-dismiss="modal" aria-hidden="true" value="<?= $CERRAR ?>">
	</div>
</div>

<!-- recuperar contraseña -->
<div class="modal hide fade" id="modalrecuperarpassword">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_recuperarpassword ?>
	</div>
	<div class="boto">
			<input type="button" class="button boto" data-dismiss="modal" aria-hidden="true" value="<?= $CERRAR ?>">
	</div>
</div>

<!-- recuperar usuario -->
<div class="modal hide fade" id="modalrecuperarusuario">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_recuperarusuario ?>
	</div>
	<div class="boto">
			<input type="button" class="button boto" onclick="window.location.href = 'login/login';" value="<?= $CERRAR ?>">
	</div>
	

</div>

<!-- cambiar usuario -->
<div class="modal hide fade" id="modalcambiarusuario">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_cambiarusuario ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" onclick="window.location.href = 'accounts/index';" value="<?= $CERRAR ?>"> 
	</div>
</div>

<!-- cambiar email -->
<div class="modal hide fade" id="modalcambiarcorreo">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_cambiarcorreo ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" onclick="window.location.href = 'accounts/index';" value="<?= $CERRAR ?>"> 
	</div>
</div>

<!-- cambiar password -->
<div class="modal hide fade" id="modalcambiarpassword">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_cambiarpassword ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" onclick="window.location.href = 'accounts/index';" value="<?= $CERRAR ?>"> 
</div>
</div>

<!-- actualizar datos de contacto -->
<div class="modal hide fade" id="modalactualizarinfo">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_actualizarinfo ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" onclick="window.location.href = 'accounts/index/contacto';" value="<?= $CERRAR ?>"> 
	</div>
</div>

<!-- actualizar datos de facturacion -->
<div class="modal hide fade" id="modalactualizarfacturacion">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $modal_actualizarinfofacturacion ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" onclick="window.location.href = 'accountsfacturacion';" value="<?= $CERRAR ?>"> 
	</div>
</div>

<!-- actualizar newsletter OK -->
<div class="modal hide fade" id="modalactualizarnewsletterok">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $CAMBIARNEWSLETTEROK ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" data-dismiss="modal" aria-hidden="true" value="<?= $CERRAR ?>"> 
	</div>
</div>

<!-- actualizar newsletter OK -->
<div class="modal hide fade" id="modalactualizarnewslettererror">
	<div class="modal_text"style="margin-top:60px">
		<div class="modal_tit"></div>
		<?= $CAMBIARNEWSLETTERERROR ?>
	</div>
	<div class="boto">
	<input type="button" class="button boto" data-dismiss="modal" aria-hidden="true" value="<?= $CERRAR ?>"> 
	</div>
</div>