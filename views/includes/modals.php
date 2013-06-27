
<!-- compra credits -->
<div class="modal hide fade" id=""><div class="modal_text" style="margin-top:80px;"><?= $modal_compra ?></div> 
<div class="boto"><input width="80" type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>

<!-- modificar + informacion -->

<div class="modal hide fade" id="modificarinfo"><div class="modal_text"style="margin-top:40px"><div class="modal_tit">Modificar + <?= $INFORMACION ?>
</div><?= $modal_inf ?></div> 
<div class="boto"><input type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>

<!-- modificar CUANDO -->

<div class="modal hide fade" id="modificarcuando"><div class="modal_text"style="margin-top:20px"><div class="modal_tit">Modificar <?= $CUANDO ?></div><?= $modal_cuan ?></div> 
<div class="boto"><input type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>

<!-- modificar DONDE -->

<div class="modal hide fade" id="modificardonde"><div class="modal_text"style="margin-top:40px"><div class="modal_tit">Modificar <? $DONDE ?></div><?= $modal_dond ?></div> 
<div class="boto"><input type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>
<!-- modificar PRECIO -->

<div class="modal hide fade" id="modificarprecio"><div class="modal_text"style="margin-top:40px"><div class="modal_tit">Modificar <?= $PRECIO ?></div><?= $modal_prix ?></div> 
<div class="boto"><input type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>
<!-- modificar cambios con cargo -->

<div class="modal hide fade" id=""><div class="modal_text"style="margin-top:70px"><div class="modal_tit"><?= $publi_canvi ?></div><?= $modal_cargo ?></div> 
<div class="boto"><input type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>

<!-- modificar cancelacion -->

<div class="modal hide fade" id="modificarcancelacion"><div class="modal_text"style="margin-top:20px"><div class="modal_tit"><?= $publi_cancel ?>
</div><?= $modal_cancel ?></div> 
<div class="boto"><input type="button" class="button boto" value="Cerrar" onclick=""></div> 
</div>



<!-- registrar ahora -->

<div class="modal hide fade" id="modalsignup"><div class="modal_text"style="margin-top:60px"><div class="modal_tit"></div><?= $modal_now ?></div> 
<a class="button boto" onclick="window.location.href = 'login/login';"><?= $CERRAR ?></a> 
</div>

<!-- modificar cuenta activada -->


<div class="modal hide fade" id="cuentaactivada">
	<div class="modal_text" style="margin-top:90px">
		<div class="modal_tit"><?= $modal_active ?></div> 
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?= $CERRAR ?></button>
	</div>
</div>

