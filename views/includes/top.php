<!DOCTYPE html>
<html>
	<head>
		<title>MAGMA | Agenda de Mallorca</title>
		<meta name="title" content="MAGMA | Agenda de Mallorca">
	    <meta name="author" content="Php Ninja">
		<meta name="description" content="Magma. Agenda de Mallorca">
		<meta name="keywords" content="Agenda, Mallorca, eventos">
	   	<base href="<?= $base_url ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="image_src" rel="image_src" href="" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="views/lib/css/normalize.css" rel="stylesheet" type="text/css" />
        <link href="views/lib/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="views/lib/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
        <link href="views/lib/css/style.css" rel="stylesheet" type="text/css" />

		<link rel="shortcut icon" href="favicon.ico" >
		<link rel="icon" type="image/gif" href="animated_favicon1.gif" >

		<script src='views/lib/js/jquery.js'></script>
		<script language="javascript" type="text/javascript" src="views/lib/js/bootstrap.js"></script>			
		<script language="javascript" type="text/javascript" src="views/lib/js/easySlider1.7.js"></script>	
		<script language="javascript" type="text/javascript" src="views/lib/js/functions.js"></script>		
		<script language="javascript" type="text/javascript" src="views/lib/js/formvalider.js"></script>		
		<script language="javascript" type="text/javascript" src="views/lib/js/custom.js"></script>		
				<script language="javascript" type="text/javascript" src="views/lib/js/jquery.jqEasyCharCounter.min.js"></script>		

	</head>
	<body>
	<div id="container">
		<div class="idioma"><a href="index.php?lang=esp">CAST</a><div class="barra"></div><a href="index.php?lang=cat">CAT</a></div>
    	<div id="sidebar">
	           <a href="<?= $base_url ?>"><img src="views/img/logo.jpg"></a>
	<? if ($LOGEDIN): ?>
	<ul>
		<li class="title"><?= $dat_men ?></li>
		<li><a href="accounts/"><?= $cuenta_men ?></a></li>
		<li><a href="accounts/index/contacto"><?= $conta_men ?></a></li>
		<li><a href="accountsfacturacion"><?= $fact_men ?></a></li>
	</ul>
	
	<ul>	
		<li class="title"><?= $publi_men ?></li>
		<li><a href="eventos/add"><?= $publi_even ?></a></a></li>
		<li><a href="eventos/destacado"><?= $public_desta ?></a></li>
		<li><a href="eventos/user"><?= $hist ?></a></li>
	</ul>
	<!--
	<ul>
	
	<li class="title"><?= $CR ?></li>
	<li><a href="accounts/comprarCreditos"><?= $Comprar_credits ?></a></li>
	<li><a href="accounts/creditosDisponibles"><?= $credi_disponible ?></a></li>

	</ul>
-->
	<? endif; ?>
	</div>
	<div id="content">
	<div id="supermenu">
	<? if ($LOGEDIN): ?>
	<?= $_SESSION['username'] ?>  <img src="views/img/barra_negra.jpg" class="barra_negra"> <a href="login/logout"><?= $out ?></a>
	<? else: ?>
		<a href="login/login"><?= $INICIAR_SESION ?></a> <img src="views/img/barra_negra.jpg" class="barra_negra"> <a href="accounts/add"><?= $REGISTRARSE ?></a>
	<? endif; ?>
	</div>
	<div id="submenu">
	<a href="page/app"><?= $LA_APP ?></a> <img src="views/img/barra_blanca.jpg" class="barra_blanca"> <a href="page/publicaciones"><?= $PUBLICACIONES_PUBLICIDAD ?></a> <img src="views/img/barra_blanca.jpg" class="barra_blanca"> <a href="page/ayuda"><?= $AYUDA ?></a> <img src="views/img/barra_blanca.jpg" class="barra_blanca"> <a href="page/contacto"><?= $CONTACTO ?></a>
	</div>