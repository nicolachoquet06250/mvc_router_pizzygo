<?php


namespace mvc_router\mvc\views\pizzygo;

class OurMission extends Loader {
	public function render(): string {
		$this->header();
		$logo = $this->get('logo');

		return "<!DOCTYPE html>
<html lang='{$this->translate->get_default_language()}'>
	<head>
		{$this->materializeCssV1Top()}
			<link rel='icon' href='{$logo}' />
            <link rel='apple-touch-icon' href='{$logo}' />
            <link rel='apple-touch-icon-precomposed' href='{$this}' />
		<title>{$this->get('title')}</title>
	</head>
	<body>
		<h1>{$this->get('title')}</h1>
	</body>
</html>";
	}
}