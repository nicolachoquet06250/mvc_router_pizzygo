<?php


namespace mvc_router\services;


use Firebase\JWT\JWT;
use mvc_router\data\gesture\pizzygo\entities\User;
use mvc_router\http\errors\Exception401;
use ReflectionException;

class OAuth extends Service {
	/** @var \mvc_router\services\Session $session */
	public $session;
	/** @var \mvc_router\data\gesture\pizzygo\managers\User $userManager */
	public $userManager;

	protected $iat = 1356999524;
	protected $nbf = 1357000000;
	protected $consumer_key = 'nicolaschoquet06';
	protected $algorythme = 'HS256';

	/**
	 * @return bool|string|null
	 */
	public function get_access_token() {
		return $this->session->has('jwt') ? $this->session->get('jwt') : false;
	}

	/**
	 * @param bool $in_array
	 * @return array|string
	 */
	public function get_algorythme($in_array = false) {
		return $in_array ? [$this->algorythme] : $this->algorythme;
	}

	/**
	 * @return string
	 */
	public function get_key() {
		return $this->consumer_key;
	}

	/**
	 * @return bool|User
	 */
	public function user() {
		$access_token = $this->get_access_token();
		if($access_token) {
			$token   = JWT::decode($access_token, $this->get_key(), $this->get_algorythme(true));
			$data    = $token->data;
			$user_id = is_array($data) ? $data['id'] : $data->id;
			$user    = $this->userManager->get_all_from_id($user_id);
			return $user ? $user : false;
		}
		return false;
	}

	/**
	 * @return bool
	 */
	public function is_connected() {
		$router = $this->inject->get_router();
		return $this->session->has('jwt') || $router->get('oauth_token');
	}

	protected function get_token_array(User $user) {
		$url = $this->inject->get_router()->get_base_url();
		return [
			"iss"  => $url,
			"aud"  => $url,
			"iat"  => $this->iat,
			"nbf"  => $this->nbf,
			"data" => [
				"id"        => $user->get('id'),
				"firstname" => $user->get('first_name'),
				"lastname"  => $user->get('last_name'),
				"email"     => $user->get('email')
			]
		];
	}

	public function get_jwt(User $user) {
		return JWT::encode(
			$this->get_token_array($user),
			$this->get_key(),
			$this->get_algorythme()
		);
	}

	/**
	 * @param User $user
	 * @return mixed
	 * @throws ReflectionException
	 * @throws Exception401
	 */
	public function connect_user(User $user) {
		$passwordService = $this->inject->get_service_password();
		$router = $this->inject->get_router();
		$session = $this->inject->get_service_session();
		if ($user && $passwordService->is_valid($router->post('password'), $user->get('password'))) {
			$session->set('jwt', $this->get_jwt($user));
			return $session->get('jwt');
		}
		throw new Exception401('Login failed !', 0, Error::JSON);
	}
}