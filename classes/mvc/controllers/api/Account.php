<?php


namespace mvc_router\mvc\controllers\pizzygo\api;


use mvc_router\mvc\Controller;

class Account extends Controller {
	/**
	 * @route /api/login/logged
	 */
	public function logged() {
		return $this->json(
			[
				'logged' => false,
			]
		);
	}
}