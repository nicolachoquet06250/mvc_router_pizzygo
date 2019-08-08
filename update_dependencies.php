<?php

	use mvc_router\confs\Conf;
	use mvc_router\dependencies\Dependency;

	require_once __DIR__.'/../autoload.php';

	Dependency::extend_dependency('mvc_router\services\FileGeneration',
								  'mvc_router\services\core\FileGeneration', [
		'name' => 'service_generation',
		'file' => __DIR__.'/services/FileGeneration.php',
		'type' => Dependency::NONE,
	]);

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
		],
		[
			'class' => 'mvc_router\mvc\controllers\pizzygo\backoffice\Translations',
			'name' => 'translations_backoffice_pizzygo_controller',
			'file' => __DIR__.'/classes/mvc/controllers/site/backoffice/Translations.php'
		],
		[
			'class' => 'mvc_router\mvc\controllers\pizzygo\api\Account',
			'name' => 'account_api_pizzygo_controller',
			'file' => __DIR__.'/classes/mvc/controllers/api/Account.php'
		],
		[
			'class' => 'mvc_router\mvc\controllers\pizzygo\OurMission',
			'name' => 'our_mission_pizzygo_controller',
			'file' => __DIR__.'/classes/mvc/controllers/site/OurMission.php'
		]
	);

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\Loader',
									  'loader_pizzygo_view',
									  __DIR__.'/classes/mvc/views/site/Loader.php',
									  'mvc_router\mvc\View');

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\Home',
									  'home_pizzygo_view',
									  __DIR__.'/classes/mvc/views/site/Home.php',
									  'mvc_router\mvc\View');

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\api\Home',
									  'home_pizzygo_api_view',
								  	__DIR__.'/classes/mvc/views/api/Home.php',
								  	'mvc_router\mvc\View');

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\backoffice\Translations',
									  'translations_backoffice_pizzygo_view',
									  __DIR__.'/classes/mvc/views/site/backoffice/Translations.php',
									  'mvc_router\mvc\View');

	Dependency::add_custom_dependency('mvc_router\mvc\views\pizzygo\OurMission',
									  'our_mission_pizzygo_view',
									  __DIR__.'/classes/mvc/views/site/OurMission.php',
									  'mvc_router\mvc\View');


	
	// parameters are arrays
	Conf::extend_confs();
