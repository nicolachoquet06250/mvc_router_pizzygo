<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;

class LoginPage extends View {
	public function render(): string {
		return "
	<!DOCTYPE html>
	<html lang='{$this->translate->get_default_language()}'>
		<head>
			<meta charset='utf-8'>
			<title>Connection</title>
		</head>
		<body>
			<h2>From email</h2>
			<form method='post' action='/login-user'>
				<input type='email' name='email' placeholder='Email' /><br>
				<input type='password' name='password' placeholder='Password' /><br>
				<input type='submit' value='Submit' />
			</form>
			
			<h2>From pseudo</h2>
			<form method='post' action='/login-user'>
				<input type='text' name='pseudo' placeholder='Pseudo' /><br>
				<input type='password' name='password' placeholder='Password' /><br>
				<input type='submit' value='Submit' />
			</form>
		</body>
	</html>		
";
	}
}