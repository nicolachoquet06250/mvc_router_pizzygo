<?php


namespace mvc_router\mvc\controllers\pizzygo;


use mvc_router\mvc\Controller;
use mvc_router\mvc\views\pizzygo\LoginPage;
use mvc_router\mvc\views\pizzygo\TestWebsocket;
use mvc_router\services\Trigger;

class Home extends Controller {
	/**
	 * @route /home
	 * @param \mvc_router\mvc\views\pizzygo\Home $view
	 * @param Trigger                            $triggers
	 * @return \mvc_router\mvc\views\pizzygo\Home
	 */
	public function index(\mvc_router\mvc\views\pizzygo\Home $view, Trigger $triggers): \mvc_router\mvc\views\pizzygo\Home {
		$view->assign('title-h1', 'TROUVE UNE PIZZA PRÈS DE CHEZ TOI');
		$view->assign('title', 'PizzyGo - Une pizza près de chez moi');
		$logo_base = 'https://pizzygo.fr/wp-content/uploads/2018/11/cropped-favicon-1-';
		$view->assign('logo', [
			'32x32' => $logo_base.'32x32.png',
			'180x180' => $logo_base.'180x180.png',
			'192x192' => $logo_base.'192x192.png',
			'270x270' => $logo_base.'270x270.png',
		]);
		return $view;
	}

	/**
	 * @route /test/websocket
	 * @param TestWebsocket $testWebsocketView
	 * @return TestWebsocket
	 */
	public function test_websocket(TestWebsocket $testWebsocketView) {
		return $testWebsocketView;
	}

	/**
	 * @http_method get
	 * @route       /login
	 * @param LoginPage $loginPage
	 * @return LoginPage
	 */
	public function login(LoginPage $loginPage): LoginPage {
		return $loginPage;
	}
}