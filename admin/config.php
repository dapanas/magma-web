<?

$config = Config::singleton();

	$config->set('lang','esp');
	$config->set('base_title','magma');
	$config->set('base_url','http://publicaenmagma.es/produccion/web/admin/');
	$config->set('base_url_data','http://publicaenmagma.es/produccion/web/data/');
	$config->set('db_prefix','');
	$config->set('tabla_default','eventos');
    $config->set('validUser','test');
    $config->set('validPass','test');

	/* Toggles */
	$config->set('developer_mode',1);
	$config->set('combo_add',0);
	$config->set('delete_permission',1);



	$config->set('big_h',327);
	$config->set('big_w',960);
	$config->set('img_content_w',503);
	$config->set('img_content_h',0);
	$config->set('thumb_h',180);
	$config->set('thumb_w',260);
	



    $PATH = dirname(__FILE__);

	$config->set('path',$PATH); 
	
	$config->set('setup_dir',$PATH.'/setup/');
	$config->set('data_dir',$PATH.'/../data/');

	$config->set('controllersFolder', 'controllers/');
	$config->set('modelsFolder', 'models/');
	$config->set('viewsFolder', 'views/');
  
	$config->set('dbhost', 'db446242235.db.1and1.com');
	$config->set('dbname', 'db446242235');
	$config->set('dbuser', 'dbo446242235');
	$config->set('dbpass', 'vivalavida');
