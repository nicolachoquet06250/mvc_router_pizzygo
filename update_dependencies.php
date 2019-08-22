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

	// parameters are arrays
	Dependency::add_custom_dependencies(
		[
			'class'  => 'mvc_router\mvc\views\pizzygo\Loader',
			'name'   => 'loader_pizzygo_view',
			'file'   => __DIR__.'/classes/mvc/views/site/Loader.php',
			'parent' => 'mvc_router\mvc\View'
		],
		[
			'class'  => 'mvc_router\mvc\views\pizzygo\Home',
			'name'   => 'home_pizzygo_view',
			'file'   => __DIR__.'/classes/mvc/views/site/Home.php',
			'parent' => 'mvc_router\mvc\View'
		],
		[
			'class'  => 'mvc_router\mvc\views\pizzygo\api\Home',
			'name'   => 'home_pizzygo_api_view',
			'file'   => __DIR__.'/classes/mvc/views/api/Home.php',
			'parent' => 'mvc_router\mvc\View'
		],
		[
			'class'  => 'mvc_router\mvc\views\pizzygo\backoffice\Translations',
			'name'   => 'translations_backoffice_pizzygo_view',
			'file'   => __DIR__.'/classes/mvc/views/site/backoffice/Translations.php',
			'parent' => 'mvc_router\mvc\View'
		],
		[
			'class'  => 'mvc_router\mvc\views\pizzygo\OurMission',
			'name'   => 'our_mission_pizzygo_view',
			'file'   => __DIR__.'/classes/mvc/views/site/OurMission.php',
			'parent' => 'mvc_router\mvc\View'
		],
		[
			'class'  => 'mvc_router\data\gesture\pizzygo\managers\User',
			'name'   => 'pizzygo_user_manager',
			'file'   => __DIR__.'/classes/datas/managers/User.php',
			'parent' => 'mvc_router\data\gesture\Manager'
		],
		[
			'class'  => 'mvc_router\data\gesture\pizzygo\entities\User',
			'name'   => 'pizzygo_user_entity',
			'file'   => __DIR__.'/classes/datas/entities/User.php',
			'parent' => 'mvc_router\data\gesture\Entity'
		],
		[
			'class'  => 'mvc_router\services\Password',
			'name'   => 'service_password',
			'file'   => __DIR__.'/classes/services/Password.php',
			'parent' => 'mvc_router\services\Service'
		]
	);
	
	// parameters are arrays
	Conf::extend_confs(
		[
			'class' => [
				'old' => 'mvc_router\confs\Mysql',
				'new' => 'mvc_router\confs\pizzygo\Mysql'
			],
			'name' => 'mysql',
			'file' => __DIR__.'/classes/confs/Mysql.php',
		]
	);
