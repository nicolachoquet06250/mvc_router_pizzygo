<?php


namespace mvc_router\mvc\controllers\pizzygo\api;


use mvc_router\mvc\Controller;
use mvc_router\router\Router;
use mvc_router\services\Error;
use mvc_router\services\Session;
use OAuthException;
use ReflectionException;

class OAuth extends Controller {
	protected $req_url = '';
	protected $auth_url = '';
	protected $acc_url = '';
	protected $api_url = '';

	protected $consumer_key = 'nicolaschoquet06';
	protected $consumer_secret = 'nicolaschoquet06';

	/**
	 * /login
	 *
	 * @param Router  $router
	 * @param Session $session
	 * @param Error   $errors
	 * @return false|string|void
	 * @throws ReflectionException
	 */
	public function login(Router $router, Session $session, Error $errors) {
		if(!$router->get('oauth_token') && $session->get('state') == 1) $session->set('state', 0);
		try {
			$oauth = new \OAuth(
				$this->consumer_key,
				$this->consumer_secret,
				OAUTH_SIG_METHOD_HMACSHA1,
				OAUTH_AUTH_TYPE_URI
			);
			$oauth->enableDebug();
			if(!$router->get('oauth_token') && !$session->get('state')) {
				$request_token_info = $oauth->getRequestToken($this->req_url);
				$session->set('secret', $request_token_info['oauth_token_secret']);
				$session->set('state', 1);
				return $errors->redirect302("{$this->auth_url}?oauth_token={$request_token_info['oauth_token']}");
			} else if($session->get('state') === 1) {
				$oauth->setToken($router->get('oauth_token'), $session->get('secret'));
				$access_token_info = $oauth->getAccessToken($this->acc_url);
				$session->set('state', 2);
				$session->set('token', $access_token_info['oauth_token']);
				$session->set('secret', $access_token_info['oauth_token_secret']);
			}
			$oauth->setToken($session->get('token'), $session->get('secret'));
			$oauth->fetch("{$this->api_url}/user.json");
			return $this->json($oauth->getLastResponse());
		} catch(OAuthException $e) {
			return $errors->error400($e->getMessage());
		}
	}

	/**
	 * @route /oauth/request_token
	 */
	public function request_token() {}

	/**
	 * @route /oauth/authorize
	 */
	public function authorize() {}

	/**
	 * @route /oauth/access_token
	 */
	public function access_token() {}
}