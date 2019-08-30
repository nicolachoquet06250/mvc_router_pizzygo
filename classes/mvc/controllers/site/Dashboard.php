<?php


namespace mvc_router\mvc\controllers\pizzygo;


use mvc_router\mvc\Controller;
use mvc_router\services\Error;
use mvc_router\services\OAuth;
use mvc_router\services\UrlGenerator;

class Dashboard extends Controller {
	/**
	 * @route /dashboard/me
	 * @param OAuth                                   $authService
	 * @param Error                                   $errors
	 * @param \mvc_router\mvc\views\pizzygo\Dashboard $dashboardView
	 * @param UrlGenerator                            $urlGenerator
	 * @return \mvc_router\mvc\views\pizzygo\Dashboard
	 */
	public function index(OAuth $authService, Error $errors, \mvc_router\mvc\views\pizzygo\Dashboard $dashboardView, UrlGenerator $urlGenerator) {
		$logo_base = 'https://pizzygo.fr/wp-content/uploads/2018/11/cropped-favicon-1-';
		$dashboardView->assign('logo', [
			'32x32' => $logo_base.'32x32.png',
			'180x180' => $logo_base.'180x180.png',
			'192x192' => $logo_base.'192x192.png',
			'270x270' => $logo_base.'270x270.png',
		]);
		if($authService->is_connected()) {
			$user = $authService->user();
			$dashboardView->assign('user', $user);
			return $dashboardView;
		}
		$home_url = $urlGenerator->get_url_from_ctrl_and_method($this->inject->get_home_pizzygo_controller(), 'index');
		return $errors->redirect301($home_url);
	}
}