<?php

	use mvc_router\confs\Conf;
	use mvc_router\dependencies\Dependency;

	require_once __DIR__.'/../autoload.php';

	// parameters are arrays
	Dependency::add_custom_controllers(
		[
			'class' => 'mvc_router\mvc\controllers\pizzygo\Home',
			'name' => 'home_pizzygo_controller',
			'file' => __DIR__.'/classes/mvc/controllers/site/Home.php'
		],
		[
			'class' => 'mvc_router\mvc\controllers\pizzygo\api\Home',
			'name' => 'home_pizzygo_api_controller',
			'file' => __DIR__.'/classes/mvc/controllers/api/Home.php'
		]
	);

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\Home', 'home_pizzygo_view',
									  __DIR__.'/classes/mvc/views/site/Home.php',
									  'mvc_router\mvc\View');

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\api\Home', 'home_pizzygo_api_view',
								  	__DIR__.'/classes/mvc/views/api/Home.php',
								  	'mvc_router\mvc\View');
	
	// parameters are arrays
	Conf::extend_confs();
