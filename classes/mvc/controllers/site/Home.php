<?php


namespace mvc_router\mvc\controllers\pizzygo;


use mvc_router\mvc\Controller;

class Home extends Controller {
	/**
	 * @route /home
	 * @param \mvc_router\mvc\views\pizzygo\Home $view
	 * @return \mvc_router\mvc\views\pizzygo\Home
	 */
	public function index(\mvc_router\mvc\views\pizzygo\Home $view) {
		$view->assign('title', 'Pizzygo');
		return $view;
	}
}