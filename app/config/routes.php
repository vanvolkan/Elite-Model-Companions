<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/models', array('controller' => 'elite_models', 'action' => 'index'));
	Router::connect('/models/*', array('controller' => 'elite_models', 'action' => 'view'));
	Router::connect('/models/:slug', array('controller' => 'elite_models', 'action' => 'view'), array('slug' => '[-a-z0-9]+', 'pass' => array('slug')));
	Router::connect('/guide', array('controller' => 'pages', 'action' => 'display', 'guide'));
	Router::connect('/rates/rates-table', array('controller' => 'pages', 'action' => 'display', 'rates', 'ratesTable'));
	Router::connect('/rates', array('controller' => 'pages', 'action' => 'display', 'rates'));
	Router::connect('/bookings/*', array('controller' => 'bookings', 'action' => 'book'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/employment', array('controller' => 'employments', 'action' => 'index'));
	Router::connect('/employment/:action/*', array('controller' => 'employments'));
	Router::connect('/contact', array('controller' => 'contacts', 'action' => 'index'));
	Router::connect('/contact/:action/*', array('controller' => 'contacts'));
	Router::connect('/admin/:controller/:action/*', array(
	    'action' => null, 'prefix' => 'admin', 'admin' => true
	));
	
	Router::connect('/admin', array('controller' => 'users', 'action' => 'index', 'admin' => true));
	
	Router::connect('/sitemap', array('controller' => 'sitemaps', 'action' => 'index')); 
	Router::connect('/sitemap/:action/*', array('controller' => 'sitemaps')); 

	// Optional
	Router::connect('/robots/:action/*', array('controller' => 'sitemaps', 'action' => 'robot'));

	Router::parseExtensions();