<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;

class OurMission extends View {
	public function render(): string {
		return "<!DOCTYPE html>
		<html lang='{$this->translate->get_default_language()}'>
			<head>
				{$this->materializeCssV1Top()}
				<title>{$this->get('title')}</title>
			</head>
			<body>
				<h1>{$this->get('title')}</h1>
			</body>
		</html>";
	}
}