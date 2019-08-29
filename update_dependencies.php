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
		],
		[
			'class' => 'mvc_router\mvc\controllers\pizzygo\api\OAuth',
			'name' => 'auth_pizzygo_controller',
			'file' => __DIR__.'/classes/mvc/controllers/api/OAuth.php'
		]
	);

	$data_gesture_classes = [];
	$dw = Dependency::get_wrapper_factory()->get_dependency_wrapper();
	$fs = $dw->get_service_fs();
	$get_table_name = function ($path) {
		$table_name = explode('/', $path)[count(explode('/', $path)) - 1];
		return explode('.', $table_name)[0];
	};
	$fs->browse_dir(function ($path) use (&$data_gesture_classes, $dw, $get_table_name) {
		$table_name = $get_table_name($path);
		$class_name = $table_name;
		preg_match_all('/[A-Z][a-z]+/', $table_name, $matches);
		$matches = $dw->get_helpers()->array_flatten($matches);
		$matches = array_map(function ($match) {
			return strtolower($match);
		}, $matches);
		$table_name = implode('_', $matches);
		$data_gesture_classes[] = [
			'class' => 'mvc_router\data\gesture\pizzygo\entities\\'.$class_name,
			'name' => 'pizzygo_'.$table_name.'_entity',
			'file' => $path,
			'parent' => 'mvc_router\data\gesture\Entity'
		];
	}, false, __DIR__.'/classes/datas/entities');
	$fs->browse_dir(function ($path) use (&$data_gesture_classes, $dw, $get_table_name) {
		$table_name = $get_table_name($path);
		$class_name = $table_name;
		preg_match_all('/[A-Z][a-z]+/', $table_name, $matches);
		$matches = $dw->get_helpers()->array_flatten($matches);
		$matches = array_map(function ($match) {
			return strtolower($match);
		}, $matches);
		$table_name = implode('_', $matches);
		$data_gesture_classes[] = [
			'class' => 'mvc_router\data\gesture\pizzygo\managers\\'.$class_name,
			'name' => 'pizzygo_'.$table_name.'_manager',
			'file' => $path,
			'parent' => 'mvc_router\data\gesture\Manager'
		];
	}, false, __DIR__.'/classes/datas/managers');

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
			'class'  => 'mvc_router\mvc\views\pizzygo\TestWebsocket',
			'name'   => 'test_websocket_view',
			'file'   => __DIR__.'/classes/mvc/views/site/TestWebsocket.php',
			'parent' => 'mvc_router\mvc\View'
		],
		[
			'class'  => 'mvc_router\mvc\views\pizzygo\LoginPage',
			'name'   => 'login_page_view',
			'file'   => __DIR__.'/classes/mvc/views/site/LoginPage.php',
			'parent' => 'mvc_router\mvc\View'
		]
	);

	Dependency::add_custom_dependencies(
		[
			'class'  => 'mvc_router\services\Password',
			'name'   => 'service_password',
			'file'   => __DIR__.'/classes/services/Password.php',
			'parent' => 'mvc_router\services\Service'
		],
		[
			'class'  => 'mvc_router\services\OAuth',
			'name'   => 'service_oauth',
			'file'   => __DIR__.'/classes/services/OAuth.php',
			'parent' => 'mvc_router\services\Service',
		]
	);

	Dependency::add_custom_dependencies(...$data_gesture_classes);

	Dependency::add_custom_dependencies(
		[
			'class'  => 'mvc_router\websockets\controllers\pizzygo\MyChat',
			'name'   => 'websocket_pizzygo_chat_controller',
			'file'   => __DIR__.'/classes/websockets/controllers/MyChat.php'
		]
	);

	Dependency::extend_dependencies(
		[
			'class' => [
				'old' => 'mvc_router\services\FileGeneration',
				'new' => 'mvc_router\services\core\FileGeneration'
			],
			'name' => Dependency::FILE_GENERATION_SERVICE,
			'file' => __DIR__.'/classes/services/core/FileGeneration.php',
			'parent' => 'mvc_router\services\Service',
			'type' => Dependency::NONE,
		],
		[
			'class' => [
				'old' => 'mvc_router\commands\TestCommand',
				'new' => 'mvc_router\commands\core\TestCommand'
			],
			'name' => Dependency::TEST_COMMAND,
			'file' => __DIR__.'/classes/commands/TestCommand.php',
			'parent' => 'mvc_router\commands\Command',
			'type' => Dependency::NONE
		],
		[
			'class' => [
				'old' => 'mvc_router\commands\StartCommand',
				'new' => 'mvc_router\commands\core\StartCommand'
			],
			'name' => Dependency::START_COMMAND,
			'file' => __DIR__.'/classes/commands/StartCommand.php',
			'parent' => 'mvc_router\commands\Command',
			'type' => Dependency::NONE
		]
	);
	
	// parameters are arrays
	Conf::extend_confs(
		[
			'class' => [
				'old' => 'mvc_router\confs\Mysql',
				'new' => 'mvc_router\confs\pizzygo\Mysql'
			],
			'name' => Conf::MYSQL,
			'file' => __DIR__.'/classes/confs/Mysql.php',
		]
	);
