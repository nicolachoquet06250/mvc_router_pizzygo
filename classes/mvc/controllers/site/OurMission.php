<?php


namespace mvc_router\mvc\controllers\pizzygo;


use mvc_router\mvc\Controller;

class OurMission extends Controller {
	/**
	 * @route /notre-mission
	 * @param \mvc_router\mvc\views\pizzygo\OurMission $view
	 * @return \mvc_router\mvc\views\pizzygo\OurMission
	 */
	public function index(\mvc_router\mvc\views\pizzygo\OurMission $view): \mvc_router\mvc\views\pizzygo\OurMission {
		$view->assign('title', 'Pizzygo | Notre Mission');
		$logo_base = 'https://pizzygo.fr/wp-content/uploads/2018/11/cropped-favicon-1-';
		$view->assign('logo', [
			'32x32' => $logo_base.'32x32.png',
			'180x180' => $logo_base.'180x180.png',
			'192x192' => $logo_base.'192x192.png',
			'270x270' => $logo_base.'270x270.png',
		]);
		return $view;
	}
}