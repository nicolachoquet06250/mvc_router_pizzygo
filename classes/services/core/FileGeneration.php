<?php


namespace mvc_router\services\core;



class FileGeneration extends \mvc_router\services\FileGeneration {
	public function generate_base_htaccess($custom_dir) {
		$htaccess_php = '<?php

mvc_router\dependencies\Dependency::get_wrapper_factory()->get_dependency_wrapper()->get_router()
	->root_route(\'home_pizzygo_controller\')->inspect_controllers();
';
		if(!is_file(__DIR__.'../../../htaccess.php')) {
			file_put_contents(__DIR__.'../../../htaccess.php', $htaccess_php);
		}
		parent::generate_base_htaccess($custom_dir);
	}
}