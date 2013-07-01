<? include('views/includes/top.php'); ?>
<div id="publicaciones" class="inside">
<h2><?= $hist ?></h2>

<h3><?= $eve_publi ?></h3>

<div ><div id="table1">
<div class="arrow-right"></div>
<strong><?= $now ?></strong>
<table>
<thead>
<tr><th><?= $date ?></th><th><?= $TITULO ?></th></tr>
</thead>
<tbody>
<? foreach($items_ahora as $item): ?>
<tr>
<td><?= mysql_to_fecha($item['fecha_inicio']) ?></td><td><a href="eventos/detalle/<?=$item['id']?>"><?= $item['titulo_'.$lang] ?></a></td>
</tr>
<? endforeach; ?>
</tbody>
</table>
</div>
</div>


<div ><div id="table2">
<div class="arrow-right"></div>
<strong><?= $ante ?></strong>
<table>
<thead>
<tr><th><?= $date ?></th><th><?= $TITULO ?></th></tr>
</thead>
<tbody>
<? foreach($items_anteriores as $item): ?>
<tr>
<td><?= mysql_to_fecha($item['fecha_inicio']) ?></td><td> <a href="eventos/detalle/<?=$item['id']?>"> <?= $item['titulo_'.$lang] ?><!-- </a> --></td>
</tr>
<? endforeach; ?>
</tbody>
</table></div>

</div>
<h3><?= $desta_publi ?></h3>

<div ><div id="table3">
<div class="arrow-right"></div>
<strong><?= $now ?></strong>
<table>
<thead>
<tr><th><?= $date ?></th><th><?= $TITULO ?></th></tr>
</thead>
<tbody>
<? foreach($destacados_ahora as $item): ?>
<tr>
<td><?= mysql_to_fecha($item['fecha_inicio']) ?></td><td><a href="eventos/detalle/<?=$item['id']?>"><?= $item['titulo_'.$lang] ?></a></td>
</tr>
<? endforeach; ?>
</tbody>
</table>
</div>
</div>


<div ><div id="table4">
<div class="arrow-right"></div>
<strong><?= $ante ?></strong>
<table>
<thead>
<tr><th><?= $date ?></th><th><?= $TITULO ?></th></tr>
</thead>
<tbody>
<? foreach($destacados_anteriores as $item): ?>
<tr>
<td><?= mysql_to_fecha($item['fecha_inicio']) ?></td><td> <a href="eventos/detalle/<?=$item['id']?>"><?= $item['titulo_'.$lang] ?><!-- </a> --></td>
</tr>
<? endforeach; ?>
</tbody>
</table></div>

</div>

</div>
<script>
$('#table1 > table,#table2> table,#table3> table,#table4> table').hide();
$('.arrow-right, .arrow-right > strong').live('click',function(){
		$(this).next().next().show();
		$(this).addClass("arrow-down").removeClass('arrow-right');
});

$('.arrow-down, .arrow-down > strong').live('click',function(){
		$(this).next().next().hide();
		$(this).addClass("arrow-right").removeClass('arrow-down');
});

</script>
<? include('views/includes/footer.php'); ?>