<?php


namespace mvc_router\mvc\controllers\pizzygo\api;


use Firebase\JWT\JWT;
use mvc_router\mvc\Controller;
use mvc_router\router\Router;
use mvc_router\services\Error;
use mvc_router\services\Password;
use mvc_router\services\Session;
use OAuthException;
use ReflectionException;

class OAuth extends Controller {
	protected $req_url = '/oauth/request_token';
	protected $auth_url = '/oauth/authorize';
	protected $acc_url = '/oauth/access_token';
	protected $api_url = '/api/home';

	protected $consumer_key = 'nicolaschoquet06';
	protected $consumer_secret = 'nicolaschoquet06';

	protected $iat = 1356999524;
	protected $nbf = 1357000000;

	/** @var \mvc_router\services\OAuth $authService */
	public $authService;

	/**
	 * @http_method post
	 * @route       /login-user
	 *
	 * @param Router   $router
	 * @param Session  $session
	 * @param Error    $errors
	 * @param Password $passwordService
	 * @return false|string|void
	 * @throws ReflectionException
	 */
	public function login(Router $router, Session $session, Error $errors, Password $passwordService) {
		if(!$router->get('oauth_token') && $session->get('state') === 1) $session->set('state', 0);
		$userManager = $this->inject->get_pizzygo_user_manager();
		if(!$session->get('state')) {
			$user = null;
			if ($router->post('email') && $router->post('password')) {
				$user = $userManager->get_all_from_email($router->post('email'));
			} elseif ($router->post('pseudo') && $router->post('password')) {
				$user = $userManager->get_all_from_pseudo($router->post('pseudo'));
			}
			if ($user && $passwordService->is_valid($router->post('password'), $user->get('password'))) {
				$url = $router->get_base_url();
				$token = [
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
				$session->set('jwt', JWT::encode($token, $this->consumer_key));
				return $this->json(
					[
						"message" => "Successful login.",
						"jwt"     => $session->get('jwt'),
					]
				);
			}
			$errors->error401('Access denied !', Error::JSON);
		}
		$jwt = $router->get('oauth_token');
		$jwt = JWT::decode($jwt, $this->consumer_key);
		$userInfos = $jwt->data;
		$user = $userManager->get_all_from_id($userInfos->id);
		if($user) {
			return $this->json(
				[
					'id' => $user->get('id'),
					'jwt' => JWT::encode($jwt, $this->consumer_key),
				]
			);
		}
		$errors->error401('Access denied !', Error::JSON);
	}

	/**
	 * @http_method   get
	 * @route         /logout-user
	 * @param Router  $router
	 * @param Session $session
	 * @param Error   $errors
	 */
	public function logout(Router $router, Session $session, Error $errors) {
		$session->unset('jwt')
			? $errors->redirect301(
				($router->get('referer')
					? $router->get('referer') : $router->get_base_url().'?lo=1'))
				: $errors->redirect301($router->get_base_url().'?lo=0');
	}

	/**
	 * @route /oauth/request_token
	 */
	public function request_token() {
		$this->authService->get_access_token();
	}

	/**
	 * @route /oauth/authorize
	 */
	public function authorize() {}

	/**
	 * @route /oauth/access_token
	 */
	public function access_token() {}
}