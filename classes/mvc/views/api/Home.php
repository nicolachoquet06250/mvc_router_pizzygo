<?php


namespace mvc_router\mvc\views\pizzygo\api;


use mvc_router\mvc\View;

class Home extends View {
	public function header($content_type = self::JSON) {
		parent::header($content_type);
	}

	public function render(): string {
		$this->header();
		return $this->inject->get_service_json()->encode(
			[
				'title' => $this->get('title'),
			]
		);
	}
}