<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;

class LoginPage extends View {

	/**
	 * @return string
	 */
	protected function get_menu() {
		$urlGenerator = $this->inject->get_url_generator();
		$test_is_connected_link = $urlGenerator->get_url_from_ctrl_and_method($this->inject->get_auth_pizzygo_controller(), 'test_is_connected');
		$connected_user_link = $urlGenerator->get_url_from_ctrl_and_method($this->inject->get_auth_pizzygo_controller(), 'test_connected_user');
		$logout_link = $urlGenerator->get_url_from_ctrl_and_method($this->inject->get_auth_pizzygo_controller(), 'logout');
		$is_connected = $this->inject->get_service_oauth()->is_connected();
		return $is_connected ? "<div>
				<a href='{$test_is_connected_link}'>Test Connected</a>
				<a href='{$connected_user_link}'>Connected User</a>
				<a href='{$logout_link}'>Logout</a>
			</div>" : '';
	}

	/**
	 * @return string
	 */
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
			<form method='post' action='/oauth/login'>
				<input type='email' name='email' placeholder='Email' /><br>
				<input type='password' name='password' placeholder='Password' /><br>
				<input type='submit' value='Submit' />
			</form>
			
			<h2>From pseudo</h2>
			<form method='post' action='/oauth/login'>
				<input type='text' name='pseudo' placeholder='Pseudo' /><br>
				<input type='password' name='password' placeholder='Password' /><br>
				<input type='submit' value='Submit' />
			</form>
			{$this->get_menu()}
		</body>
	</html>		
";
	}
}