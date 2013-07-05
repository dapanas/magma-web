<? include('views/includes/top.php'); ?>
<div id="evento-info" class='inside'>
	<? $params = gett(); ?>
	<? 
	if (!isset($op) || $op != 'edit'):
		if (isset($items['destacado']) && $items['destacado'] == 1):
	?>
		<h2><?= $public_desta ?></h2>
		<img src="views/img/step3.jpg"><br>
		<h3><?= $VERI ?></h3>
		<div class="mini"><?= $REVISA_TOT ?></div>
		<div class="boto-red"><?= $PERIODO_PUBLICACION ?></div>
		<div class="categoria-evento">
			<table>
				<tr><td><b><?= $PERI ?></b></td><td><b><?= $FECHA_PUBLICACION ?></b></td></tr>
				<tr>
					<td>
						<?= $_SESSION['addDestacado']['periodo'] ?>
						<?
						if ($_SESSION['addDestacado']['periodo'] > 1)
							echo 'semanas';
						else
							echo 'semana';
						?>
					</td>
					<td>
						<?= mysql_to_fecha($_SESSION['addDestacado']['fecha_publi_ini']) ?> - <?= mysql_to_fecha($_SESSION['addDestacado']['fecha_publi_end']) ?>
					</td>
				</tr>
			</table>
		</div>
		<?
		else:
		?>
		<h2><?= $publi_even ?></h2>
		<h3 class="light book"><?= $INFORMACION ?> · <span class="demibold"><?= $RESUMEN ?></span> · <?= $CONFIRMACION ?></h3>
		<?
		endif;
	else:
	?>
	<h2><?= $INFO_EVENTO ?></h2>
	<? endif; ?>
	
	<div class="boto-red" style="margin-top:4px"><?= $INFO_EVENTO ?></div>
	<h3 style="border:none;">General </h3>
	<div class="categoria-evento">
		<div class="tit"><?= $CATEGORIA_ACTO ?>: </div>
		<p>
			<? foreach ($items['categoriasId'] as $categoriaId): ?>
			<?= $items['categoria_'.$lang][$categoriaId]['categoria'] ?><br>
			<? endforeach; ?>

			<? foreach ($items['subcategoriasId'] as $subcategoriaId): ?>
			<?= $items['subcategoria_'.$lang][$subcategoriaId]['subcategoria'] ?> (<?= $items['subcategoria_'.$lang][$subcategoriaId]['categoria'] ?>) <br>
			<? endforeach; ?>
		</p>
		<br>
		<div class="tit"><?= $TITULO ?>: </div>
		<p><?= $items['titulo_'.$lang] ?></p>
		<br><br>
		
		<div class="tit"><?= $DESCRIPCION ?>:</div>
		<p><?= $items['descripcion_'.$lang] ?></p>
		<br><br>
		
		<div class="tit"><?= $IMAGEN ?>:</div>
		<? if($items['imagen'] != '') :?>
		<img class="img_evento" src="data/img/<?= $items['imagen'] ?>">
		<? else :?>
		<p><?= $NOIMG ?></p>
		<? endif; ?>
	</div>

	<div class="boto-red"><?= $DONDE ?>
		<div class="interrogant pull-right"><a href="#modificardonde" data-toggle="modal">?</a></div>
	</div>
	<div class="categoria-evento">
		<div class="tit"><?= $LUGAR_ACTO ?>:</div>
		<p><?= $items['lugar'] ?></p>
		<br><br>
		<div class="tit"><?= $DIRECCION_LUGAR_ACTO ?>:</div>
		<p><?= $items['direccion'] ?></p>
		<br><br>
		<div class="tit"><?= $MUNICIPIO_LUGR_ACTO ?>:</div>
		<p><?= $items['municipio_'.$lang] ?></p>
	</div>

	<div class="boto-red"><?= $CUANDO ?>
		<div class="interrogant pull-right"><a href="#modificarcuando" data-toggle="modal">?</a></div>
	</div>
	<div class="categoria-evento">
		<div class="tit"><?= $FECHA_ACTO ?>:</div>
		<p>
			<?
			$dias = $items['dias_semana'] != "" ? explode(",", $items['dias_semana']) : array();
			if (count($dias) > 0) {
				$i = 0;
				foreach($dias as $dia) {
					if ($i > 0) echo " · ";
					echo $DIAS_SEMANA[$dia];
					$i++;
				}
			}
			?>
		</p>
		<br>
		<p>
			<? if ($items['fecha_fin'] != $items['fecha_inicio']): ?>
			Entre el <?= mysql_to_fecha($items['fecha_inicio']) ?> <?= $I_EL ?> <?= mysql_to_fecha($items['fecha_fin']) ?>
			<? else: ?>
			<?= $DIA ?> <?= mysql_to_fecha($items['fecha_inicio']) ?>
			<? endif; ?>
		</p>
		<br><br>
		<div class="tit"><?= $hor_event ?>:</div>
		<p>
			<? if ($items['hora_inicio'] != ''): ?>
			<?= $items['hora_inicio'] ?>h - <?= $items['hora_final'] ?>h
			<? endif; ?>
			<? if ($items['hora_inicio2'] != ''): ?>
			/ <?= $items['hora_inicio2'] ?>h - <?= $items['hora_final2'] ?>h
			<? endif; ?>
		</p>
	</div>

	<div class="boto-red"><?= $PRECIO ?>
		<div class="interrogant pull-right"><a href="#modificarprecio" data-toggle="modal">?</a></div>
	</div>
	<div class="categoria-evento">
		<div class="tit"><?= $PRECIO_ACTO ?>:</div>
		<p>
			<?
			if ($items['precio'] > 0)
				echo number_format($items['precio'],2,",",".").'&euro;';
			else
				echo $GRATIS
			?>

			<? if ($items['precio_anticipado'] > 0): ?>
			(Venta anticipada: <?= number_format($items['precio_anticipado'],2,",",".") ?> &euro;)
			<? endif; ?>
		</p>
	</div>

	<div class="boto-red">+ <?= $INFORMACION ?>
		<div class="interrogant pull-right"><a href="#modificarinfo" data-toggle="modal">?</a></div>
	</div>
	<div class="categoria-evento">
		<div class="tit"><?= $telf_contact ?>:</div>
		<p><?= $items['telf'] ?></p>
		<br><br>
		<div class="tit"><?= $DIRECCION_MAIL ?></div>
		<p><?= $items['email'] ?></p>
		<br><br>
		<div class="tit">Web:</div>
		<p><?= $items['web'] ?></p>
	</div>

	<?
	if (isset($op) && $op != 'edit' && isset($items['destacado']) && $items['destacado'] == 1):
	?>

	<div class="boto-red"><?= $CONCEPTF ?></div>
	<div class="categoria-evento">
		<table>
			<tr><th><?= $CONCEPTF ?></th><th><?= $PRECIO ?></th><th>IVA (21%)</th><th>TOTAL</th></tr>
			<?
			$precios = array(0,100,180,255,320);
			$iva = $total = 0;
			$iva = $precios[$_SESSION['addDestacado']['periodo']] * 0.21;
			$total = $precios[$_SESSION['addDestacado']['periodo']] + $iva;
			?>
			<tr>
				<td>Pub. <?= $destacado_lang ?> <?= $_SESSION['addDestacado']['periodo'] ?> sem.</td>
				<td><?= $precios[$_SESSION['addDestacado']['periodo']]?>€</td>
				<td><?= number_format($iva,2,",",".") ?>€</td>
				<td><?= number_format($total,2,",",".") ?>€</td>
			</tr>
		</table>
	</div>
	
	<div class="boto-red"><?= $dir ?></div>
	<div class="categoria-evento">
		<div class="tit"><?= $NOMBRE_RAZON ?> :</div> <?= $_SESSION['addDestacado']['facturacion']['nombre'] ?>
		<div class="tit"><?= $DIRECCION ?>:</div> <?= $_SESSION['addDestacado']['facturacion']['direccion'] ?>
		<div class="tit"><?= $MUNICIPIO ?>:</div> <?= $_SESSION['addDestacado']['facturacion']['municipiosId'] ?>
		<div class="tit"><?= $PROVINCIA ?>: </div> <?= $_SESSION['addDestacado']['facturacion']['provincia'] ?>
		<div class="tit"><?= $postal ?>:</div> <?= $_SESSION['addDestacado']['facturacion']['codigopostal'] ?>
		<div class="tit"><?= $NIF_CIF ?>: </div> <?= $_SESSION['addDestacado']['facturacion']['nifcif'] ?>
	</div>
	<? endif; ?>

	<br><br><br>
	<?
	if (!isset($op) or $op != 'edit'):
		if (isset($items['destacado']) && $items['destacado'] == 1):
	?>
		<input type="button" class="button black" value="Anterior" onclick="window.location.href='eventos/edit/<?=$params['a']?>/addD'">
		<input type="button" class="button black" value="<?= $SIGUIENTE ?>" onclick="window.location.href='eventos/facturacionDestacado/<?=$items['id']?>'">
		<?
		else:
		?>
		<input type="button" class="button black" value="Anterior" onclick="window.location.href='eventos/edit/<?=$params['a']?>/add'" style="padding: 0 24px;">
		<input type="button" class="button black" value="<?= $SIGUIENTE ?>" onclick="window.location.href='eventos/confirmar/<?=$items['id']?>'">
		<?
		endif;
	elseif (isset($params['i']) && $params['i'] == "add"):
	?>
		<input type="button" class="button black" value="Anterior" onclick="window.location.href='eventos/edit/<?=$params['a']?>/add'" style="padding: 0 24px;">
		<input type="button" class="button black" value="<?= $SIGUIENTE ?>" onclick="window.location.href='eventos/confirmar/<?=$params['a']?>'">
	<?
	else:
	?>

		<? if ($items['cancelado'] != "1" && $items['publicado'] == "1"): ?>
		<input type="button" class="button black" value="<?= $PUBLI_CAN ?>" onclick="window.location.href='eventos/edit/<?=$items['id']?>'">
		<input type="button" class="button black" value="<?= $PUBLI_CANC ?>" onclick="window.location.href='eventos/delete/<?=$items['id']?>'">
		<? endif; ?>
		<br><br>

	<script type="text/javascript">
		$('.interrogant').show();
	</script>
	<?
	endif;
	?>
</div>

<? include('views/includes/footer.php'); ?>
