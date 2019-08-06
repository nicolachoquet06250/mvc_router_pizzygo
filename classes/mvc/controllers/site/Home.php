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
		$view->assign('title-h1', 'TROUVE UNE PIZZA PRÈS DE CHEZ TOI');
		$view->assign('title', 'PizzyGo - Une pizza près de chez moi');
		$view->assign('logo', 'https://pizzygo.fr/wp-content/uploads/2018/11/logoLAST.png');
		return $view;
	}
}