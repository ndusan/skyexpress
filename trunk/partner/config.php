<?php

 
  //Admin app root
 define('ADMIN_APP_ROOT', '/SkyExpress/admin/');
 
  //Application Directory - need to change
 define('APP_ROOT', '/SkyExpress/partner/');
 
 //Site
 define('WEBSITE', 'http://localhost');
 
 //Database params
 define('HOST', 'localhost');
 define('USERNAME', 'root');
 define('PASSWORD', '');
 define('DATABASE', 'skyexpress');
 
 
 
 //Routes
 $routes = array(
 
 				//About partner - details
 				array('url' => '/^aboutus\/?$/', 'controller' => 'aboutus', 'view' => 'index'),
 				array('url' => '/^aboutus\/edit\/?$/', 'controller' => 'aboutus', 'view' => 'edit'),
				array('url' => '/^aboutus\/(?P<id>\d+)\/update\/?$/', 'controller' => 'aboutus', 'view' => 'update'),
				array('url' => '/^aboutus\/messages\/?$/', 'controller' => 'aboutus', 'view' => 'messages'),
				array('url' => '/^aboutus\/messages\/(?P<id>\d+)\/?$/', 'controller' => 'aboutus', 'view' => 'messages'),
				array('url' => '/^aboutus\/files\/?$/', 'controller' => 'aboutus', 'view' => 'files'),
				 				
 				//Clients route
 				array('url' => '/^clients\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'clients', 'view' => 'index'),
 				array('url' => '/^clients\/?$/', 'controller' => 'clients', 'view' => 'index'),
 				array('url' => '/^clients\/add\/?$/', 'controller' => 'clients', 'view' => 'add'),
 				array('url' => '/^clients\/create\/?$/', 'controller' => 'clients', 'view' => 'create'),
				array('url' => '/^clients\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'clients', 'view' => 'edit'),
				array('url' => '/^clients\/(?P<id>\d+)\/update\/?$/', 'controller' => 'clients', 'view' => 'update'),
				array('url' => '/^clients\/search\/?$/', 'controller' => 'clients', 'view' => 'index'),
 				array('url' => '/^clients\/(?P<id>\d+)\/details\/?$/', 'controller' => 'clients', 'view' => 'details'),
 				
 				//Sessions route
                                array('url' => '/^\/?$/', 'controller' => 'login', 'view' => 'index'),
                                array('url' => '/^login\/access$/', 'controller' => 'login', 'view' => 'access'),
                                array('url' => '/^login\/delete$/', 'controller' => 'login', 'view' => 'delete'),
 				
 				//Home page
 				array('url' => '/^home\/?$/', 'controller' => 'home', 'view' => 'index'),

                                //Lost password
                                array('url' => '/^lost\/?$/', 'controller' => 'login', 'view' => 'lost'),
                                array('url' => '/^lost\/send\/?$/', 'controller' => 'login', 'view' => 'send'),
                                array('url' => '/^new\/(?P<password>[\*a-zA-Z0-9]+)\/?$/', 'controller' => 'login', 'view' => 'new'),

 				//Jobs route
 				array('url' => '/^jobs\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'jobs', 'view' => 'index'),
 				array('url' => '/^jobs\/add\/?$/', 'controller' => 'jobs', 'view' => 'add'),
 				array('url' => '/^jobs\/create\/?$/', 'controller' => 'jobs', 'view' => 'create'),
				array('url' => '/^jobs\/(?P<id>\d+)\/delete\/(?P<client_fk>\d+)\/?$/', 'controller' => 'jobs', 'view' => 'delete'),
				array('url' => '/^jobs\/send\/(?P<client_fk>\d+)\/?$/', 'controller' => 'jobs', 'view' => 'send'),
				array('url' => '/^jobs\/(?P<id>\d+)\/details\/?$/', 'controller' => 'jobs', 'view' => 'details'),
				array('url' => '/^jobs\/calc\/?$/', 'controller' => 'jobs', 'view' => 'calculator'),
				array('url' => '/^jobs\/calc\/create\/?$/', 'controller' => 'jobs', 'view' => 'calc_create'),
				array('url' => '/^jobs\/calc\/(?P<id>\d+)\/delete\/?$/', 'controller' => 'jobs', 'view' => 'calc_delete'),
 				
				//Tickets route
 				array('url' => '/^tickets\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'tickets', 'view' => 'index'),
 				array('url' => '/^tickets\/add\/?$/', 'controller' => 'tickets', 'view' => 'add'),
 				array('url' => '/^tickets\/create\/?$/', 'controller' => 'tickets', 'view' => 'create'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/details\/?$/', 'controller' => 'tickets', 'view' => 'details'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/answers\/?$/', 'controller' => 'tickets', 'view' => 'answers'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/myanswer\/?$/', 'controller' => 'tickets', 'view' => 'myanswer')
 					
 				);

 //The Server root
 define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);
 
 //Directory structure
 define('DS', '/');

 //MVC pathc
 
 define('MODEL_PATH', SERVER_ROOT.APP_ROOT.'models'.DS);
 define('VIEW_PATH', SERVER_ROOT.APP_ROOT.'views'.DS);
 define('CONTROLLER_PATH', SERVER_ROOT.APP_ROOT.'controllers'.DS);
 
 
 include('lib/database.php');
 include('lib/controller.php');
 include('lib/model.php');
 include('lib/view.php');
 
   
?>