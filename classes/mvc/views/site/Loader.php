<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;


class Loader extends View {
	public function loader_render() {
		return '<div class="loader-container">
            <div class="row">
                <div class="col s12 l2 offset-l5">
                    <img src="https://pizzygo.fr/wp-content/uploads/2018/11/logoLAST.png" class="responsive-img" alt="LOGO" />
                </div>
            </div>
            <div class="loader"></div>
        </div>';
	}

	public function logo(array $logo) {
		$logos = [
			(isset($logo['32x32']) ? "<link rel='icon' href='{$logo['32x32']}' sizes='32x32' />" : ''),
			(isset($logo['192x192']) ? "<link rel='icon' href='{$logo['192x192']}' sizes='192x192' />" : ''),
			(isset($logo['180x180']) ? "<link rel='apple-touch-icon-precomposed' href='{$logo['180x180']} />" : ''),
			(isset($logo['270x270']) ? "<meta name='msapplication-TileImage' content='{$logo['270x270']}' />" : ''),
		];

		$final_logos = '';
		foreach ($logos as $logo) {
			$final_logos .= $logo;
		}
		return $final_logos;
	}
}