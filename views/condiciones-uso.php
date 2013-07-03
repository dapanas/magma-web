<style>
.inside b{
	font-size: 12px;
}
</style>

<? include('views/includes/top.php'); ?>
<div id="ayuda" >
<img src="views/img/fondo-la-app.png" id="la-app-fondo">

<div id="promo">

<?= $cond_uso ?>
</div>
<div class="inside" style="width: 500px;text-align: justify;; font-size: 11px;font-family: 'FreeSet-book';">
<?= $CONDICIONES_USO ?>
</div>
</div>
<? include('views/includes/footer.php'); ?>