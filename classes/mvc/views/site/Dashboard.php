<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\data\gesture\pizzygo\entities\User;

class Dashboard extends Loader {
	public function render(): string {
		$this->header();
		/** @var User $user */
		$user = $this->get('user');
		$title = "Dashboard - {$user->get('first_name')} {$user->get('last_name')}";

		return "<!DOCTYPE html>
<html lang='{$this->translate->get_default_language()}'>
	<head>
		{$this->materializeCssV1Top()}
		{$this->logo($this->get('logo'))}
		<title>{$title}</title>
	</head>
	<body>
		<h1>{$title}</h1>
	</body>
</html>";
	}
}