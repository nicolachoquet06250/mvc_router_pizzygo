<?php


namespace mvc_router\mvc\views\pizzygo;

class OurMission extends Loader {
	public function render(): string {
		$this->header();

		return "<!DOCTYPE html>
<html lang='{$this->translate->get_default_language()}'>
	<head>
		{$this->materializeCssV1Top()}
		{$this->logo($this->get('logo'))}
		<title>{$this->get('title')}</title>
	</head>
	<body>
		<h1>{$this->get('title')}</h1>
	</body>
</html>";
	}
}