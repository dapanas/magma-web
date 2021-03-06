<!DOCTYPE html>
<html>
	<head>
		<title><?= $base_title ?> | BackOffice </title>
		<meta name="title" content="BackOffice">
	    <meta name="author" content="Php Ninja">
		<meta name="description" content="BackOffice">

		<meta charset="utf-8">
		<base href="<?= $base_url ?>" content="<?= $base_url ?>">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   	<link href="views/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	   	<link href="views/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	   	<link href="views/css/main.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="views/jQuery-ui-1.8.16/themes/base/jquery.ui.all.css">

	 	<script src="views/js/jquery.js">	</script>	

		<script src="views/jQuery-ui-1.8.16/minified/jquery.ui.core.min.js"></script>
		<script src="views/jQuery-ui-1.8.16/minified/jquery.ui.widget.min.js"></script>
		<script src="views/jQuery-ui-1.8.16/minified/jquery.ui.mouse.min.js"></script>
		<script src="views/jQuery-ui-1.8.16/minified/jquery.ui.datepicker.min.js"></script>
		<script src="views/jQuery-ui-1.8.16/minified/jquery.ui.sortable.min.js"></script>
		<script src="views/jQuery-ui-1.8.16/i18n/jquery.ui.datepicker-es.js"></script>
		<script src="views/jQuery-ui-1.8.16/jquery.timepicker.js"></script>
		<script>
		var BASE_URL = '<?= $base_url ?>';
		</SCRIPT>
		<script type="text/javascript" src="views/js/functions.js"></script>
		<script src="views/js/pagination3.js"></script>

	</head>
	<?php flush(); ?>
	<body>
	<div id="overlay" style="display:none;"><?= SENDING ?> ...</div>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><?= $base_title ?></a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
             <i class="icon-user"></i> admin 
            </p>
            <ul class="nav">

              <li><a href="<?= $base_url ?>../">Ir a la página</a></li>
            <li><a href="login/logout">Cerrar Sesión</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<div class="container-fluid">
		
   


	<div class="row-fluid">
    <div class="span2">
          <div class="well sidebar-nav well-small">
            <ul class="nav nav-list">
              


<!--		
<? foreach($menu as $item): ?>
			   <li><a href="show/table/<?= $item[0] ?>"><i class="icon-book"></i>    <?= $item[1] ?></a></li>
			<? endforeach;?>
-->

              
			<ul class="nav">
			
<li class="nav-header">EVENTOS</li>
	   <li class="active"><a href="show/table/eventos"><i class="icon-book"></i>    Eventos</a></li>
		   <li><a href="show/table/categorias"><i class="icon-book"></i>    Categorías</a></li>
		   <li><a href="show/table/subcategorias"><i class="icon-book"></i>    Subcategorías</a></li>
					  <li><a href="show/table/municipios"><i class="icon-book"></i>    Municipios</a></li>
      
         <li class="nav-header">PAGOS</li>
         	   <li><a href="show/table/payments"><i class="icon-book"></i>    Transacciones</a></li>	 
<!--          	   <li><a href="show/table/creditos"><i class="icon-book"></i> Créditos</a></li>	   --> 
<!--          	   <li><a href="show/table/opciones"><i class="icon-book"></i> Opciones</a></li>	    -->
		   <li class="nav-header">PUBLICIDAD</li>
         	   <li><a href="show/table/publicidad"><i class="icon-book"></i>    Publicidad</a></li>	   
	
   <li class="nav-header">USUARIOS</li>
		   <li><a href="show/table/accounts"><i class="icon-book"></i>    Usuarios</a></li>
		   <li><a href="show/table/accounts_facturacion"><i class="icon-book"></i> Facturación</a></li>
		   <li><a href="newsletter/index"><i class="icon-book"></i>    Newsletter</a></li>

  
            </ul>
          </ul>


          
          </div><!--/.well -->
        </div><!--/span-->
	
		<div  id="main" class="span10" >
