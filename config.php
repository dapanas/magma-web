<?

$config = Config::singleton();

	$config->set('lang','cat');
	$config->set('currency','eur');
	$config->set('base_url','http://localhost/produccion/web/');
		$config->set('mail_from','notificaciones@publicaenmagma.com');
	$config->set('db_prefix','');

    $PATH = dirname(__FILE__);
	$config->set('path',$PATH."/"); 
	
	$config->set('data_dir',$PATH.'/data/');
 
	$config->set('controllersFolder', 'controllers/');
	$config->set('modelsFolder', 'models/');
	$config->set('viewsFolder', 'views/');
 
	$config->set('dbhost', 'localhost');
	$config->set('dbname', 'db446242235');
	$config->set('dbuser', 'root');
	$config->set('dbpass', '');
	$config->set('URLS',array());





