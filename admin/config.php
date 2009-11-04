<?php

 
//Application Directory - need to change
 define('PARTNER_APP_ROOT', '/SkyExpress/partner/');
 
//Application Directory - need to change
 define('APP_ROOT', '/SkyExpress/admin/');
 
 //Site
 define('WEBSITE', 'http://localhost');
 
 //Database params
 define('HOST', 'localhost');
 define('USERNAME', 'root');
 define('PASSWORD', '');
 define('DATABASE', 'skyexpress');
 
 //Routes
 $routes = array(
 
 				//Admins route
 				array('url' => '/^admins\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'admins', 'view' => 'index'),
 				array('url' => '/^admins\/add\/?$/', 'controller' => 'admins', 'view' => 'add'),
 				array('url' => '/^admins\/create\/?$/', 'controller' => 'admins', 'view' => 'create'),
				array('url' => '/^admins\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'admins', 'view' => 'edit'),
				array('url' => '/^admins\/(?P<id>\d+)\/update\/?$/', 'controller' => 'admins', 'view' => 'update'),
				array('url' => '/^admins\/(?P<id>\d+)\/status\/?$/', 'controller' => 'admins', 'view' => 'status'),

 				//Partners route
 				array('url' => '/^partners\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'partners', 'view' => 'index'),
 				array('url' => '/^partners\/?$/', 'controller' => 'partners', 'view' => 'index'),
 				array('url' => '/^partners\/add\/?$/', 'controller' => 'partners', 'view' => 'add'),
 				array('url' => '/^partners\/create\/?$/', 'controller' => 'partners', 'view' => 'create'),
				array('url' => '/^partners\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'partners', 'view' => 'edit'),
				array('url' => '/^partners\/(?P<id>\d+)\/update\/?$/', 'controller' => 'partners', 'view' => 'update'),
				array('url' => '/^partners\/(?P<id>\d+)\/details\/?$/', 'controller' => 'partners', 'view' => 'details', 'submenu' => 'details_description'),
 				array('url' => '/^partners\/(?P<id>\d+)\/details\/log\/?$/', 'controller' => 'partners', 'view' => 'details', 'submenu' => 'details_log'),
 				array('url' => '/^partners\/(?P<id>\d+)\/details\/other\/?$/', 'controller' => 'partners', 'view' => 'details', 'submenu' => 'details_other'),
 				array('url' => '/^partners\/(?P<id>\d+)\/status\/?$/', 'controller' => 'partners', 'view' => 'status'),
 				array('url' => '/^partners\/send_message\/?$/', 'controller' => 'partners', 'view' => 'send_message'),
 				array('url' => '/^partners\/send\/?$/', 'controller' => 'partners', 'view' => 'send'),
 				array('url' => '/^partners\/job\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'partners', 'view' => 'job'),
 				array('url' => '/^partners\/job\/(?P<id>\d+)\/details\/?$/', 'controller' => 'partners', 'view' => 'job_details'),
 				array('url' => '/^partners\/created_job\/(?P<id>\d+)\/details\/?$/', 'controller' => 'partners', 'view' => 'created_job_details'),
 				array('url' => '/^partners\/job\/create\/?$/', 'controller' => 'partners', 'view' => 'job_create'),
 				array('url' => '/^partners\/job\/(?P<id>\d+)\/update\/?$/', 'controller' => 'partners', 'view' => 'job_update'),
 				array('url' => '/^partners\/job\/(?P<id>\d+)\/status\/?$/', 'controller' => 'partners', 'view' => 'job_status'),

 				//Sessions route
                                array('url' => '/^\/?$/', 'controller' => 'login', 'view' => 'index'),
                                array('url' => '/^login\/access$/', 'controller' => 'login', 'view' => 'access'),
                                array('url' => '/^login\/delete$/', 'controller' => 'login', 'view' => 'delete'),

 				//Home page
 				array('url' => '/^home\/?$/', 'controller' => 'home', 'view' => 'index'),

 				//Documents route
 				array('url' => '/^documents\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'documents', 'view' => 'index'),
 				array('url' => '/^documents\/add\/?$/', 'controller' => 'documents', 'view' => 'add'),
 				array('url' => '/^documents\/create\/?$/', 'controller' => 'documents', 'view' => 'create'),
				array('url' => '/^documents\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'documents', 'view' => 'edit'),
				array('url' => '/^documents\/(?P<id>\d+)\/update\/?$/', 'controller' => 'documents', 'view' => 'update'),
				array('url' => '/^documents\/(?P<id>\d+)\/status\/?$/', 'controller' => 'documents', 'view' => 'status'),

 				//Public files route
 				array('url' => '/^public_files\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'public_files', 'view' => 'index'),
 				array('url' => '/^public_files\/add\/?$/', 'controller' => 'public_files', 'view' => 'add'),
 				array('url' => '/^public_files\/create\/?$/', 'controller' => 'public_files', 'view' => 'create'),
				array('url' => '/^public_files\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'public_files', 'view' => 'edit'),
				array('url' => '/^public_files\/(?P<id>\d+)\/update\/?$/', 'controller' => 'public_files', 'view' => 'update'),
				array('url' => '/^public_files\/(?P<id>\d+)\/status\/?$/', 'controller' => 'public_files', 'view' => 'status'),

 				//Articles route
 				array('url' => '/^articles\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'articles', 'view' => 'index', 'submenu' => 'article'),
 				array('url' => '/^articles\/create\/?$/', 'controller' => 'articles', 'view' => 'create', 'submenu' => 'article'),
 				array('url' => '/^articles\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'articles', 'view' => 'index', 'submenu' => 'article', 'action' => 'edit'),
 				array('url' => '/^articles\/(?P<id>\d+)\/update\/?$/', 'controller' => 'articles', 'view' => 'update', 'submenu' => 'article'),
 				array('url' => '/^articles\/(?P<id>\d+)\/status\/?$/', 'controller' => 'articles', 'view' => 'status', 'submenu' => 'article'),

 				array('url' => '/^articles\/article_type\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'articles', 'view' => 'index', 'submenu' => 'article_type'),
 				array('url' => '/^articles\/article_type\/create\/?$/', 'controller' => 'articles', 'view' => 'create', 'submenu' => 'article_type'),
 				array('url' => '/^articles\/article_type\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'articles', 'view' => 'index', 'submenu' => 'article_type', 'action' => 'edit'),
 				array('url' => '/^articles\/article_type\/(?P<id>\d+)\/update\/?$/', 'controller' => 'articles', 'view' => 'update', 'submenu' => 'article_type'),
 				array('url' => '/^articles\/article_type\/(?P<id>\d+)\/status\/?$/', 'controller' => 'articles', 'view' => 'status', 'submenu' => 'article_type'),


 				array('url' => '/^articles\/specific_article\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'articles', 'view' => 'index', 'submenu' => 'specific_article'),
 				array('url' => '/^articles\/specific_article\/create\/?$/', 'controller' => 'articles', 'view' => 'create', 'submenu' => 'specific_article'),
 				array('url' => '/^articles\/specific_article\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'articles', 'view' => 'index', 'submenu' => 'specific_article', 'action' => 'edit'),
 				array('url' => '/^articles\/specific_article\/(?P<id>\d+)\/update\/?$/', 'controller' => 'articles', 'view' => 'update', 'submenu' => 'specific_article'),
 				array('url' => '/^articles\/specific_article\/(?P<id>\d+)\/status\/?$/', 'controller' => 'articles', 'view' => 'status', 'submenu' => 'specific_article'),

 				//Discounts route
 				array('url' => '/^discounts\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'discounts', 'view' => 'index'),
 				array('url' => '/^discounts\/add\/?$/', 'controller' => 'discounts', 'view' => 'add'),
 				array('url' => '/^discounts\/create\/?$/', 'controller' => 'discounts', 'view' => 'create'),
 				array('url' => '/^discounts\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'discounts', 'view' => 'index', 'submenu' => 'edit'),
 				array('url' => '/^discounts\/(?P<id>\d+)\/update\/?$/', 'controller' => 'discounts', 'view' => 'update'),

 				//Currencies route
 				array('url' => '/^currencies\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'currencies', 'view' => 'index'),
 				array('url' => '/^currencies\/add\/?$/', 'controller' => 'currencies', 'view' => 'add'),
 				array('url' => '/^currencies\/create\/?$/', 'controller' => 'currencies', 'view' => 'create'),
				array('url' => '/^currencies\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'currencies', 'view' => 'edit'),
				array('url' => '/^currencies\/(?P<id>\d+)\/update\/?$/', 'controller' => 'currencies', 'view' => 'update'),
				array('url' => '/^currencies\/(?P<id>\d+)\/status\/?$/', 'controller' => 'currencies', 'view' => 'status'),

				//Tickets route
 				array('url' => '/^tickets\/?(page\/)?(?P<page>\d*)\/?$/', 'controller' => 'tickets', 'view' => 'index'),
 				array('url' => '/^tickets\/add\/?$/', 'controller' => 'tickets', 'view' => 'add'),
 				array('url' => '/^tickets\/create\/?$/', 'controller' => 'tickets', 'view' => 'create'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/details\/?$/', 'controller' => 'tickets', 'view' => 'details'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/answers\/?$/', 'controller' => 'tickets', 'view' => 'answers'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/myanswer\/?$/', 'controller' => 'tickets', 'view' => 'myanswer'),
 				array('url' => '/^tickets\/(?P<id>\d+)\/cancel\/?$/', 'controller' => 'tickets', 'view' => 'cancel'),

                                //News route
 				array('url' => '/^news\/?(page\/)?(?P<page>\d?)\/?$/', 'controller' => 'news', 'view' => 'index'),
 				array('url' => '/^news\/add\/?$/', 'controller' => 'news', 'view' => 'add'),
 				array('url' => '/^news\/create\/?$/', 'controller' => 'news', 'view' => 'create'),
 				array('url' => '/^news\/(?P<id>\d+)\/edit\/?$/', 'controller' => 'news', 'view' => 'edit'),
 				array('url' => '/^news\/(?P<id>\d+)\/update\/?$/', 'controller' => 'news', 'view' => 'update'),
                                array('url' => '/^news\/(?P<id>\d+)\/status\/?$/', 'controller' => 'news', 'view' => 'status')
 				
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