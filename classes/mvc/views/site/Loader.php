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

	public function loader_js() {
		return '<script>
	$(document).ready(() => $(".loader-container").fadeOut("1000", () => console.log(`## PIZZYGO PAGE LOADED ##`)));
</script>';
	}
}