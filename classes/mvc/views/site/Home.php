<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;

class Home extends View {
	protected function body() {
		return "<h1>{$this->get('title')}</h1>";
	}

	public function render(): string {
		$this->header();

		return "<!Doctype html>
	<html lang='{$this->translate->get_default_language()}'>
		<head>
			{$this->bootstrapV4Top()}
			<title>{$this->get('title')}</title>
		</head>
		<body>
			{$this->body()}
		</body>
	</html>";
	}
}