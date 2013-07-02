<? include('views/includes/top.php'); ?>

<div id="evento-info" class='inside'>
	<h2><?= $cancel_even ?></h2>
	<p class="col"> <?= $cancel_even_confirm ?></p>
	<form class='form' action='eventos/doDelete' method='POST' enctype='multipart/form-data'>
		<input type="hidden" name="id" value="<?= $items['id'] ?>">
		<input type="submit" class="button red" value="<?= $OK_CANCEL_EVENT ?>" style="padding: 0 24px;">
	</form>
	<br>
</div>

<? include('views/includes/footer.php'); ?>
