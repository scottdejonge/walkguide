<?php
	
	Router::parseExtensions('json', 'xml', 'kml', 'csv');

	// Home
	Router::connect('/', array('controller' => 'walks', 'action' => 'home'));

	// Users
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/sign-up', array('controller' => 'users', 'action' => 'add'));
	Router::connect('/profile', array('controller' => 'users', 'action' => 'view'));
	Router::connect('/profile/edit', array('controller' => 'users', 'action' => 'edit'));

	// Walks
	Router::connect('/walks/', array('controller' => 'walks', 'action' => 'index'));

	// Walk Scripts
	Router::connect('/walks/points', array('controller' => 'walks', 'action' => 'points'));
	Router::connect('/walks/null', array('controller' => 'walks', 'action' => 'null'));
	Router::connect('/walks/grades', array('controller' => 'walks', 'action' => 'grades'));
	Router::connect('/walks/import', array('controller' => 'walks', 'action' => 'import'));

	// Walk Views
	Router::connect('/walks/:id', array('controller' => 'walks', 'action' => 'view'));
	Router::connect('/walks/:id/kml', array('controller' => 'walks', 'action' => 'kml'));

	// Pages
	Router::connect('/about/', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
