<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;

require_once __DIR__.'/Loader.php';

class Home extends Loader {
	protected function pizzygo_body() {
		$title = strtoupper($this->get('title-h1'));
		return "<div class=\"pizzygo-parallax-container parallax-container\">
                <div class=\"pizzygo-parallax parallax\">
                    <img src=\"https://pizzygo.fr/wp-content/uploads/2016/09/home.jpg\" alt=\"home image\">
                </div>
                <div class=\"pizzygo-over-parallax container\">
                    <div class=\"pizzygo-home-top-space row\"></div>
                    <div class=\"row\">
                        <div class=\"col s12 l10 offset-l1 white-text\">
                            <h1 class=\"pizzygo-title center-align\">{$title}</h1>
                        </div>
                        <div class=\"col s12 l9 offset-l3 white-text\">
                            <div class=\"row\">
                                <div class=\"input-field col s12 l6\">
                                    <label for=\"pizzygo-search_motor\">Renseigne ici ton adresse</label>
                                    <input type=\"search\" class=\"input-field\" data-longitude=\"\" data-latitude=\"\" name=\"pizzygo-search_motor\" id=\"pizzygo-search_motor\" />
                                </div>
                                <ul id='pizzygo-address-dropdown' class='pizzygo-dropdown'>

                                </ul>
                                <div class=\"col s12 l3 center-align\">
                                    <button class=\"btn waves-effect waves-light btn-large orange darken-1\"
                                            type=\"button\" name=\"pizzygo-send_search\" id=\"pizzygo-send_search\">
                                        Rechercher <i class=\"material-icons right\">search</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class=\"pizzygo-home-top-space-2 col l12\"></div>
                        <div class=\"col s12 l9 offset-l3\">
                            <img src=\"https://pizzygo.fr/wp-content/uploads/2016/09/steps.png\" class=\"responsive-img\" alt=\"image body\" />
                        </div>
                    </div>
                </div>
            </div>";
	}

	protected function pizzygo_header() {
		return "<nav class=\"pizzygo-global-menu\" style=\"position: fixed; width: 100%; z-index: 2;\">
                <div class=\"nav-wrapper\">
                    <a href=\"/home\" class=\"brand-logo\">
                        <img class=\"pizzygo-logo\" src=\"{$this->get('logo')}\" alt=\"logo\">
                    </a>
                    <a href=\"#\" data-target=\"pizzygo-mobile-menu\" class=\"sidenav-trigger\">
                        <i class=\"material-icons black-text\">menu</i>
                    </a>
                    <ul id=\"pizzygo-menu-bar\" class=\"right hide-on-med-and-down\"></ul>
                </div>
            </nav>
            <ul class=\"pizzygo-sidenav sidenav black\" id=\"pizzygo-mobile-menu\"></ul>";
	}

	protected function pizzygo_footer() {
		return "<div class=\"row\" id=\"pizzygo-presentation-on-small-height\">

            </div>
            <div class=\"section white\" id=\"pizzygo-home\">
                <div class=\"row container\">
                    <div class=\"col s12\">
                        <div class=\"col s12 l4\">
                            <h5 class=\"subheader orange-text\">Paiements Sécurisés</h5>
                            <div class=\"row\">
                                <div class=\"col s12\">
                                    <img src=\"https://pizzygo.fr/wp-content/uploads/2016/09/payment.png\" alt=\"\" />
                                </div>
                            </div>
                        </div>
                        <div class=\"col s12 l4\">
                            <h5 class=\"subheader orange-text\">Le Concept</h5>
                            <div class=\"row\">
                                <div class=\"col s12 pizzygo-light\">
                                    PizzyGo connecte les amoureux de Pizzas avec les
                                    meilleures Pizzerias locales. Que ce soit seul, en famille,
                                    <br>
                                    entre amis, ou encore en amoureux, déguster une pizza
                                    doit rester une expérience hors du commun.
                                </div>
                            </div>
                        </div>
                        <div class=\"col s12 l4\">
                            <h5 class=\"subheader orange-text\">Informations</h5>
                            <div class=\"row\">
                                <div class=\"col s12 pizzygo-light\">
                                    Vous êtes restaurateurs et vous voulez rejoindre la famille PizzyGo ou avoir
                                    plus d'informations? Ecrivez-nous : <a class=\"pizzygo-basic-link\" href=\"mailto:contact@pizzygo.fr\">contact@pizzygo.fr</a>.
                                    <br><br>
                                    Vous avez une pizzeria préférée et elle n'est pas encore référencée?
                                    Contactez-nous à l'adresse : <a class=\"pizzygo-basic-link\" href=\"mailto:nicolas@pizzygo.fr\">nicolas@pizzygo.fr</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
	}

	protected function modals() {
		return "<div id=\"pizzygo-modal-connection\" class=\"modal pizzygo-modal pizzygo-modal-connection\">
            <div class=\"modal-content row\">
                <div class=\"col s12 l6 pizzygo-connection-modal-connect\" id=\"pizzygo-connection-modal-connect-header-title\">
                    <h4>CONNEXION</h4>
                </div>
                <div class=\"col s12 l6 pizzygo-connection-modal-inscription\" id=\"pizzygo-connection-modal-inscription-header-title\">
                    <h4>INSCRIPTION</h4>
                </div>
                <div class=\"col s12 l6 pizzygo-connection-modal-connect\" id=\"pizzygo-connection-modal-connect-header-button\">
                    <a class=\"orange-text pizzygo-change-link\" href=\"#inscription\">CRÉER UN COMPTE</a>
                </div>
                <div class=\"col s12 l6 pizzygo-connection-modal-inscription\" id=\"pizzygo-connection-modal-inscription-header-button\">
                    <a class=\"orange-text pizzygo-change-link\" href=\"#connect\">J'AI UN COMPTE</a>
                </div>
                <div class=\"row pizzygo-connection-modal-connect\" id=\"pizzygo-connection-modal-connect-content\">
                    <div class=\"input-field col s12\">
                        <label for=\"pizzygo-connection-email\">Identifiant ou adresse de messagerie <span class=\"red-text\">*</span></label>
                        <input type=\"email\" id=\"pizzygo-connection-email\">
                    </div>
                    <div class=\"input-field col s12\">
                        <label for=\"pizzygo-connection-password\">Mot de passe <span class=\"red-text\">*</span></label>
                        <input type=\"password\" id=\"pizzygo-connection-password\">
                    </div>
                </div>
                <div class=\"row pizzygo-connection-modal-inscription\" id=\"pizzygo-connection-modal-inscription-content\">
                    <div class=\"input-field col s12\">
                        <label for=\"pizzygo-inscription-email\">Adresse de messagerie <span class=\"red-text\">*</span></label>
                        <input type=\"email\" id=\"pizzygo-inscription-email\">
                    </div>
                    <div class=\"input-field col s12\">
                        <label for=\"pizzygo-inscription-password\">Mot de passe <span class=\"red-text\">*</span></label>
                        <input type=\"password\" id=\"pizzygo-inscription-password\">
                    </div>
                </div>
                <div class=\"row pizzygo-connection-modal-connect\" id=\"pizzygo-connection-modal-connect-button\">
                    <div class=\"col s6\">
                        <a href=\"dashboard.html\" class=\"waves-effect waves-light btn-large orange\">
                            Connexion
                        </a>
                    </div>
                    <div class=\"col s12 l6\">
                        <label>
                            <input type=\"checkbox\" id=\"pizzygo-remember-me-checkbox\"/>
                            <span>Se souvenir de moi</span>
                        </label>
                    </div>
                </div>
                <div class=\"row pizzygo-connection-modal-inscription\" id=\"pizzygo-connection-modal-inscription-button\">
                    <div class=\"col s6\">
                        <a href=\"dashboard.html\" class=\"waves-effect waves-light btn-large orange\">
                            Inscription
                        </a>
                    </div>
                </div>
                <div class=\"row pizzygo-connection-modal-connect\" id=\"pizzygo-connection-modal-connect-forget-password\">
                    <div class=\"col s12\">
                        <a href=\"#\" class=\"orange-text\">Mot de passe perdu ?</a>
                    </div>
                </div>
                <div class=\"row pizzygo-connection-modal-inscription\" id=\"pizzygo-connection-modal-inscription-forget-password\"></div>
                <div class=\"row\">
                    <div class=\"col s12 pizzygo-light\">
                        Connectez-vous avec les réseaux sociaux:
                    </div>
                    <div class=\"col s12\">
                        <a class=\"btn-floating waves-effect waves-light orange white-text center-align pizzygo-social-network-icon pizzygo-bold\">
                            f
                        </a>
                    </div>
                </div>
            </div>
        </div>";
	}

	public function render(): string {
		$this->header();

		return "<!Doctype html>
	<html lang='{$this->translate->get_default_language()}'>
		<head>
			{$this->materializeCssV1Top()}
            <link rel=\"icon\" href=\"{$this->get('logo')}\" />
            <link rel=\"apple-touch-icon\" href=\"{$this->get('logo')}\" />
            <link rel=\"apple-touch-icon-precomposed\" href=\"{$this->get('logo')}\" />
            {$this->css()}
			<title>{$this->get('title')}</title>
		</head>
		<body>
			{$this->loader_render()}
			<header>{$this->pizzygo_header()}</header>
			<main>{$this->pizzygo_body()}</main>
			<footer>{$this->pizzygo_footer()}</footer>
			<div>{$this->modals()}</div>
		</body>
		{$this->js()}
	</html>";
	}

	public function css() {
		return "<link rel='stylesheet' href='/static/dist/css/theme.css' />";
	}

	public function js() {
		return "
		<script src='/static/dist/js/libs/ChartJS/Chart.min.js'></script>
		<script src='/static/dist/js/classes/Login.js'></script>
		<script src='/static/dist/js/classes/Addresses.js'></script>
		<script src='/static/dist/js/classes/Roles.js'></script>
		<script src='/static/dist/js/classes/OrderDetails.js'></script>
		<script src='/static/dist/js/classes/CategoriesVariants.js'></script>
		<script src='/static/dist/js/classes/RolesEnum.js'></script>
		<script src='/static/dist/js/classes/OrderStatus.js'></script>
		<script src='/static/dist/js/classes/UserPhones.js'></script>
		<script src='/static/dist/js/classes/UserEmails.js'></script>
		<script src='/static/dist/js/classes/User.js'></script>
		<script src='/static/dist/js/classes/Users.js'></script>
		<script src='/static/dist/js/classes/ProductCategory.js'></script>
		<script src='/static/dist/js/classes/ProductCategories.js'></script>
		<script src='/static/dist/js/classes/Product.js'></script>
		<script src='/static/dist/js/classes/Products.js'></script>
		<script src='/static/dist/js/classes/Order.js'></script>
		<script src='/static/dist/js/classes/Orders.js'></script>
		<script src='/static/dist/js/requires.js'></script>
		<script src='/static/dist/js/index.js'></script>";
	}
}