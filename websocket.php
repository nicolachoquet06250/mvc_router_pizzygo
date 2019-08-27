<?php

use mvc_router\dependencies\Dependency;

require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/autoload.php';

// Run the server application through the WebSocket protocol on port 2108
$dependency_factory = Dependency::get_wrapper_factory()->get_dependency_wrapper();
$dependency_factory->get_service_websocket()
	->route('/chat', $dependency_factory->get_websocket_pizzygo_chat_controller())
	->route('/echo', $dependency_factory->get_websocket_default_controller())
	->run();