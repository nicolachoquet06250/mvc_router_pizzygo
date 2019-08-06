<?php


namespace mvc_router\mvc\controllers\pizzygo\backoffice;


use Exception;
use mvc_router\mvc\Controller;
use mvc_router\mvc\views\Translation;
use mvc_router\router\Router;
use mvc_router\services\Logger;

class Translations extends Controller {
	/** @var \mvc_router\services\Translate $translation */
	public $translation;

	/**
	 * @http  both
	 * @route /backoffice/translations
	 *
	 * @param Router                                                $router
	 * @param \mvc_router\mvc\views\pizzygo\backoffice\Translations $translations_view
	 * @return \mvc_router\mvc\views\pizzygo\backoffice\Translations
	 */
	public function index(Router $router, \mvc_router\mvc\views\pizzygo\backoffice\Translations $translations_view) {
		$lang = $this->translation->get_default_language();
		$translations_view->assign('regenerate_translation', false);
		if($router->get('lang')) {
			$this->translation->set_default_language($router->get('lang'));
			$lang = $this->translation->get_default_language();
		}

		if(!empty($router->post())) {
			if($router->post('add')) {
				$key = $router->post('key');
				$value = $router->post('value');
				$this->translation->add_key(str_replace('_', ' ', $key), $value);
			}
			else {
				foreach ($router->post() as $key => $value) {
					$this->translation->write_translated(urldecode(str_replace('_', ' ', $key)), $value, $lang);
				}
			}
		}

		if($router->get('key_to_remove')) {
			$this->translation->remove_key($router->get('key_to_remove'));
		}

		$translations_view->assign('router', $router);
		$translations_view->assign('lang', $lang);

		return $translations_view;
	}

	/**
	 * @http  post
	 * @route /backoffice/translations/regenerate
	 *
	 * @param Logger $logger
	 * @param Router $router
	 * @return string
	 * @throws Exception
	 */
	public function regenerate_translations(Logger $logger, Router $router) {
		if($router->post('regenerate')) {
			$logger->types(Logger::CONSOLE);
			$logger->separator('--------------------------------------------------------------');

			$logger->log('Command: php exe.php generate:translation');
			$logger->log_separator();
			$logger->log($this->inject->get_commands()->run('generate:translations'));
			$logger->log_separator();

			$reload_page = $this->translation->__('Recharger la page');

			return "<input type='button' value='{$reload_page}' onclick='window.location.reload()' />";
		}
		return '';
	}
}