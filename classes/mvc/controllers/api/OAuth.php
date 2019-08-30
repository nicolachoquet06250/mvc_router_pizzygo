<?php


namespace mvc_router\mvc\controllers\pizzygo\api;


use mvc_router\data\gesture\pizzygo\managers\User;
use mvc_router\http\errors\Exception401;
use mvc_router\mvc\Controller;
use mvc_router\router\Router;
use mvc_router\services\Error;
use mvc_router\services\Json;
use mvc_router\services\Session;
use ReflectionException;

class OAuth extends Controller {
	/**
	 * @http_method post
	 * @route       /oauth/login
	 *
	 * @param Router                     $router
	 * @param User                       $userManager
	 * @param \mvc_router\services\OAuth $authService
	 * @param Json                       $jsonService
	 * @return false|string|void
	 * @throws Exception401
	 * @throws ReflectionException
	 */
	public function login(Router $router, User $userManager, \mvc_router\services\OAuth $authService, Json $jsonService) {
		if(!$authService->is_connected()) {
			$user = null;
			if ($router->post('email') && $router->post('password')) {
				$user = $userManager->get_all_from_email($router->post('email'));
			} elseif ($router->post('pseudo') && $router->post('password')) {
				$user = $userManager->get_all_from_pseudo($router->post('pseudo'));
			}
			$authService->connect_user($user);
		}
		$user = $authService->user();
		if($user) {
			return $this->json(
				[
					'status' => 'success',
					'id' => $user->get('id'),
					'user' => $user->to_json(),
					'jwt' => $authService->get_access_token(),
				]
			);
		}
		throw new Exception401('Access denied !', 0, Error::JSON);
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
	 * @route /test/is_connected
	 * @return false|string
	 */
	public function test_is_connected() {
		return $this->var_dump($this->inject->get_service_oauth()->is_connected())
			   .'<br>'
			   .'<a href="'.$this->inject->get_url_generator()->get_url_from_ctrl_and_method($this->inject->get_home_pizzygo_controller(), 'login').'">Forum return</a>';
	}

	/**
	 * @route /test/connected_user
	 * @return false|string
	 */
	public function test_connected_user() {
		return $this->var_dump($this->inject->get_service_oauth()->user())
			   .'<br>'
			   .'<a href="'.$this->inject->get_url_generator()->get_url_from_ctrl_and_method($this->inject->get_home_pizzygo_controller(), 'login').'">Forum return</a>';
	}
}