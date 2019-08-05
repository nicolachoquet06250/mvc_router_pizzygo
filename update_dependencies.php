<?php

	use mvc_router\confs\Conf;
	use mvc_router\dependencies\Dependency;

	require_once '/home/nicolas/Bureau/php_workspace/mvc_router/autoload.php';

	// parameters are arrays
	Dependency::add_custom_controllers();
	
	// parameters are arrays
	Conf::extend_confs()
