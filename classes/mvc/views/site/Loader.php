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
		$_32x32 = $logo['32x32'];
		$_192x192 = $logo['192x192'];
		$_180x180 = $logo['180x180'];
		$_270x270 = $logo['270x270'];
		return "<link rel='icon' href='{$_32x32}' sizes='32x32' />
<link rel='icon' href='{$_192x192}' sizes='192x192' />
<link rel='apple-touch-icon-precomposed' href='{$_180x180}' />
<meta name='msapplication-TileImage' content='{$_270x270}' />";
	}
}