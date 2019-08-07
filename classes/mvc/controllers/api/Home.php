<?php


namespace mvc_router\mvc\controllers\pizzygo\api;


use mvc_router\mvc\Controller;

class Home extends Controller {
	/**
	 * @route /api/home
	 * @param \mvc_router\mvc\views\pizzygo\api\Home $view
	 * @return \mvc_router\mvc\views\pizzygo\api\Home
	 */
	public function index(\mvc_router\mvc\views\pizzygo\api\Home $view): \mvc_router\mvc\views\pizzygo\api\Home {
		$view->assign('title', 'Pizzygo');
		return $view;
	}
}