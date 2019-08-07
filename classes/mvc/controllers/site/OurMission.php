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
		return $view;
	}
}