<?php

	// Home
	Router::connect('/', array('controller' => 'walks', 'action' => 'home'));

	// Walks
	Router::connect('/walks/', array('controller' => 'walks', 'action' => 'index'));
	Router::connect('/walks/null', array('controller' => 'walks', 'action' => 'null'));
	Router::connect('/walks/grades', array('controller' => 'walks', 'action' => 'grades'));
	Router::connect('/walks/import', array('controller' => 'walks', 'action' => 'import'));
	Router::connect('/walks/:id', array('controller' => 'walks', 'action' => 'view'));

	// Pages
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
