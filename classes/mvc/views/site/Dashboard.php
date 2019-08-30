<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\data\gesture\pizzygo\entities\Role;
use mvc_router\data\gesture\pizzygo\entities\User;

class Dashboard extends Loader {

	/** @var \mvc_router\services\UrlGenerator $url_generator */
	public $url_generator;

	/**
	 * @param User $user
	 * @return string
	 */
	protected function dashboard_user(User $user) {
		$title = "Dashboard - {$user->get('first_name')} {$user->get('last_name')}";

		$notre_mission_url = $this->url_generator
			->get_url_from_ctrl_and_method(
				$this->inject->get_our_mission_pizzygo_controller(),
				'index'
			);

		return "<!DOCTYPE html>
<html lang='{$this->translate->get_default_language()}'>
	<head>
		{$this->materializeCssV1Top()}
		{$this->logo($this->get('logo'))}
    	{$this->css()}
		<title>{$title}</title>
	</head>
    <body id=\"pizzygo-dashboard-vendor\">
        <div class=\"loader-container\">
            <div class=\"row\">
                <div class=\"col s12 l2 offset-l5\">
                    <img src=\"https://pizzygo.fr/wp-content/uploads/2018/11/logoLAST.png\" class=\"responsive-img\" alt=\"LOGO\" />
                </div>
            </div>
            <div class=\"loader\"></div>
        </div>
        <header>
            <nav class=\"pizzygo-global-menu\" style=\"position: fixed; width: 100%; z-index: 1;\">
                <div class=\"nav-wrapper\">
                    <a href=\"../index.html\" class=\"brand-logo\">
                        <img class=\"pizzygo-logo\"
                             src=\"https://pizzygo.fr/wp-content/uploads/2018/11/logoLAST.png\"
                             alt=\"logo\">
                    </a>
                    <a href=\"#\" data-target=\"pizzygo-mobile-menu\" class=\"sidenav-trigger\">
                        <i class=\"material-icons black-text\">menu</i>
                    </a>
                    <ul id=\"pizzygo-menu-bar\" class=\"right hide-on-med-and-down\"></ul>
                </div>
            </nav>
            <nav class=\"pizzygo-notifications-menu hide-on-med-and-down\"
                 id=\"pizzygo-notifications-menu\"
                 style=\"position: fixed; width: 100%; z-index: 1;\">
                <div class=\"nav-wrapper orange\">
                    <div class=\"row\">
                        <div class=\"col s12 m8 offset-m4\">
                            <ul class=\"right\">
                                <li>
                                    <a class=\"black-text\" href=\"{$notre_mission_url}\">
                                        <div class=\"row\">
                                            <div class=\"col s2\">
                                                <i class=\"material-icons\">notifications_none</i>
                                            </div>
                                            <div class=\"col s3\">
                                                <span class=\"new badge red\" data-badge-caption=\"\">3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class=\"black-text\" href=\"{$notre_mission_url}\">
                                        <div class=\"row\">
                                            <div class=\"col s2\">
                                                <i class=\"material-icons\">help_outline</i>
                                            </div>
                                            <div class=\"col s3\">
                                                <span class=\"new badge waves-green\" data-badge-caption=\"\">0</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class=\"black-text\" href=\"{$notre_mission_url}\">
                                        <div class=\"row\">
                                            <div class=\"col s2\">
                                                <i class=\"material-icons\">volume_up</i>
                                            </div>
                                            <div class=\"col s3\">
                                                <span class=\"new badge blue-grey\" data-badge-caption=\"\">0</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href=\"#orders\" class=\"black-text pizzygo-action-link\">
                                        <div class=\"row\">
                                            <div class=\"col s2\">
                                                <i class=\"material-icons black-text\">shopping_cart</i>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <ul class=\"pizzygo-sidenav sidenav black\" id=\"pizzygo-mobile-menu\">
                <li>
                    <a class=\"white-text\" href=\"$notre_mission_url\">La mission de PizzyGo</a>
                </li>
                <li>
                    <div class=\"card grey lighten-5 z-depth-1\">
                        <div class=\"row valign-wrapper pizzygo-dashboard-pseudo\">
                            <div class=\"col s8\">
                                <a href=\"#\" data-target=\"pizzygo-account-menu\"
                                   class=\"show-on-medium-and-down show-on-medium-and-up
                                          sidenav-trigger pizzygo-dashboard-pseudo-link pizzygo-basic-link\">
                                    NICOLACHOQUET06250
                                </a>
                            </div>
                            <div class=\"col s2 valign-wrapper\">
                                <img src=\"https://secure.gravatar.com/avatar/c839c43c09787678ac89f3176fa47817?s=96&d=mm&r=g\"
                                     class=\"circle responsive-img pizzygo-dashboard-profil-image\"
                                     alt=\"\"/>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href=\"#\" data-target=\"pizzygo-dashboard-menu\" class=\"show-on-medium-and-down show-on-medium-and-up sidenav-trigger white-text\">
                        <i class=\"material-icons white-text\">menu</i>
                        Menu vendeur
                    </a>
                </li>
            </ul>
            <ul class=\"pizzygo-sidenav sidenav indigo darken-4 white-text\" id=\"pizzygo-dashboard-menu\">
                <li class=\"pizzygo-bold\">
                    <div class=\"row\" style=\"padding-top: 15px;\">
                        <div class=\"col s3\">
                            <div class=\"circle\"
                                 style=\"width: 50px;
                                 height: 50px;
                                 background-image: url(/static/images/pexels-photo-459793.jpeg);
                                 background-repeat: no-repeat;
                                 background-attachment: fixed;
                                 background-position: center;
                                 background-size: cover;\">
                            </div>
                        </div>
                        <div class=\"col s9\">
                            Ma Boutique
                        </div>
                    </div>
                    <hr>
                </li>
                <li class=\"hide-on-med-and-up show-on-medium\">
                    <div class=\"row\">
                        <div class=\"col s6\">
                            <a class=\"white-text\" href=\"{$notre_mission_url}\">
                                <div class=\"row\">
                                    <div class=\"col s2\">
                                        <i class=\"material-icons\">notifications_none</i>
                                    </div>
                                    <div class=\"col s6\">
                                        <span class=\"new badge red\" data-badge-caption=\"\">3</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=\"col s6\">
                            <a class=\"white-text\" href=\"{$notre_mission_url}\">
                                <div class=\"row\">
                                    <div class=\"col s2\">
                                        <i class=\"material-icons\">help_outline</i>
                                    </div>
                                    <div class=\"col s6\">
                                        <span class=\"new badge waves-green\" data-badge-caption=\"\">0</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class=\"hide-on-med-and-up show-on-medium\">
                    <div class=\"row\">
                        <div class=\"col s6\">
                            <a class=\"white-text\" href=\"{$notre_mission_url}\">
                                <div class=\"row\">
                                    <div class=\"col s2\">
                                        <i class=\"material-icons\">volume_up</i>
                                    </div>
                                    <div class=\"col s6\">
                                        <span class=\"new badge blue-grey\" data-badge-caption=\"\">0</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=\"col s6\">
                            <a class=\"white-text\" href=\"{$notre_mission_url}\">
                                <div class=\"row\">
                                    <div class=\"col s12 center-align\">
                                        <i class=\"material-icons\">library_books</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class=\"active\">
                    <a href=\"#home\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">home</i> Accueil
                    </a>
                </li>
                <li>
                    <a href=\"#products\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">style</i> Produits
                    </a>
                </li>
                <li>
                    <a href=\"#orders\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">shopping_cart</i> Commandes
                    </a>
                </li>
                <li>
                    <a href=\"#customers\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">person</i> Clients
                    </a>
                </li>
                <li>
                    <a href=\"#stats\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">donut_small</i> Rapports
                    </a>
                </li>
                <li>
                    <a href=\"#settings\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">settings</i> Réglages
                    </a>
                </li>
                <li>
                    <a href=\"#schedules\" class=\"white-text pizzygo-action-link\">
                        <i class=\"material-icons white-text\">schedule</i> Mes horaires
                    </a>
                </li>
                <li>
                    <a href=\"#\" class=\"white-text pizzygo-menu-bar-disconnect\">
                        <i class=\"material-icons white-text\">power_settings_new</i> Déconnexion
                    </a>
                </li>
            </ul>
        </header>
        <main>
            <div class=\"row pizzygo-action-link-content\" id=\"home\">
                <div class=\"col s12\">
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col s12\">
                                <div class=\"row\">
                                    <div class=\"col s5 center-align\" style=\"padding-top: 40px;\">
                                        <i class=\"material-icons grey-text grey lighten-2 circle\"
                                           style=\"font-size: 105px\">person_outline</i>
                                    </div>
                                    <div class=\"col s7\">
                                        <h1 class=\"light-blue-text\" style=\"font-size: 25px;\">Bienvenu sur le tableau de bord de PizzyGo</h1>
                                        {$user->get('first_name')} {$user->get('last_name')}
                                        <br>
                                        <span style=\"font-size: 12px;\"><i class=\"material-icons\" style=\"font-size: 12px;\">access_time</i> Last login: 8h 50min (5 décembre 2018)</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col s12\">
                                <div class=\"row\" id=\"pizzygo-vendor-dashboard-home\"></div>
                            </div>
                            <div class=\"col s12\">
                                <canvas id=\"pizzygo-stats-home-amounts\" width=\"400\" height=\"200\"></canvas>
                                <canvas id=\"pizzygo-stats-home-numbers\" width=\"400\" height=\"200\"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Done -->
            <div class=\"row pizzygo-action-link-content\" id=\"products\">
                <div class=\"col s12\">
                    <h2 class=\"z-depth-3\" style=\"font-size: 25px; padding: 20px;\">
                        <i class=\"material-icons\">style</i>
                        Produits
                    </h2>
                </div>
                <div class=\"row\" id=\"pizzygo-vendor-dashboard-products\"></div>
            </div> <!-- Done -->
            <div class=\"row pizzygo-action-link-content\" id=\"orders\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h2 class=\"z-depth-3\" style=\"font-size: 25px; padding: 20px;\">
                            <i class=\"material-icons\">shopping_cart</i>
                            Liste des commandes
                        </h2>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col s12\">
                        <div class=\"card\">
                            <div class=\"card-title\" style=\"padding-top: 5px; padding-left: 5px; padding-bottom: 5px;\">
                                <button class=\"btn btn-small indigo darken-4 white-text\"onclick=\"window.print()\">Imprimmer</button>
                                <button class=\"btn btn-small indigo darken-4 white-text\" onclick=\"utils.functions.create_orders_pdf()\">PDF</button>
                                <button class=\"btn btn-small indigo darken-4 white-text\" onclick=\"utils.functions.create_orders_excel()\">Excel</button>
                                <button class=\"btn btn-small indigo darken-4 white-text\" onclick=\"utils.functions.create_orders_csv()\">Csv</button>
                            </div>
                            <div class=\"card-content\">
                                <table class=\"responsive-table\">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i class=\"material-icons\">more_horiz</i>
                                            </th>
                                            <th>
                                                Tri
                                            </th>
                                            <th>
                                                Acheté
                                            </th>
                                            <th>
                                                Adresse de livraison
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Montant brute des ventes
                                            </th>
                                            <th>
                                                Gains
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id=\"pizzygo-order-table-content\"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Done -->
            <div class=\"row pizzygo-action-link-content\" id=\"customers\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h2 class=\"z-depth-3\" style=\"font-size: 25px; padding: 20px;\">
                            <i class=\"material-icons\">person</i>
                            Clients
                        </h2>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col s12\">
                        <ul class=\"collection\">
                            <li class=\"collection-item avatar\">
                                <img src=\"http://materializecss.com/images/yuna.jpg\" alt=\"\" class=\"circle\">
                                <span class=\"title\">Nicolas Choquet</span>
                                <p>
                                    Description
                                </p>
                                <a href=\"#\" class=\"secondary-content\" onclick=\"$('#pizzygo-customer-detail-modal').modal('open')\">
                                    <i class=\"material-icons\">search</i>
                                </a>
                            </li>
                            <li class=\"collection-item avatar\">
                                <img src=\"http://materializecss.com/images/yuna.jpg\" alt=\"\" class=\"circle\">
                                <span class=\"title\">Yann Choquet</span>
                                <p>
                                    Description
                                </p>
                                <a href=\"#\" class=\"secondary-content\" onclick=\"$('#pizzygo-customer-detail-modal').modal('open')\">
                                    <i class=\"material-icons\">search</i>
                                </a>
                            </li>
                            <li class=\"collection-item avatar\">
                                <img src=\"http://materializecss.com/images/yuna.jpg\" alt=\"\" class=\"circle\">
                                <span class=\"title\">Karine Loubet</span>
                                <p>
                                    Description
                                </p>
                                <a href=\"#\" class=\"secondary-content\" onclick=\"$('#pizzygo-customer-detail-modal').modal('open')\">
                                    <i class=\"material-icons\">search</i>
                                </a>
                            </li>
                            <li class=\"collection-item avatar\">
                                <img src=\"http://materializecss.com/images/yuna.jpg\" alt=\"\" class=\"circle\">
                                <span class=\"title\">Laurie Zink</span>
                                <p>
                                    Description
                                </p>
                                <a href=\"#\" class=\"secondary-content\" onclick=\"$('#pizzygo-customer-detail-modal').modal('open')\">
                                    <i class=\"material-icons\">search</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- Done -->
            <div class=\"row pizzygo-action-link-content\" id=\"stats\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h2 class=\"z-depth-3\" style=\"font-size: 25px; padding: 20px;\">
                            <i class=\"material-icons\">donut_small</i>
                            Rapports
                        </h2>
                    </div>
                </div>
            </div>
            <div class=\"row pizzygo-action-link-content\" id=\"settings\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h2 class=\"z-depth-3\" style=\"font-size: 25px; padding: 20px;\">
                            <i class=\"material-icons\">settings</i>
                            Réglages
                        </h2>
                    </div>
                </div>
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col s12\">

                            <div class=\"card\">
                                <div class=\"card-content\">
                                    <div class=\"card-title\">
                                        <h5 class=\"title\">Informations personnels</h5>
                                    </div>
                                    <div class=\"row\">
                                        <div class=\"col s12\">
                                            <div class=\"input-field file-field\">
                                                <div class=\"btn orange\">
                                                    <span>Fichier</span>
                                                    <input type=\"file\">
                                                </div>
                                                <div class=\"file-path-wrapper\">
                                                    <input class=\"file-path validate\" type=\"text\">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"col s12\">
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-name\">Nom</label>
                                                <input type=\"text\"
                                                       id=\"pizzygo-settings-name\" />
                                            </div>
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-surname\">Prénom</label>
                                                <input type=\"text\"
                                                       id=\"pizzygo-settings-surname\" />
                                            </div>
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-email\">Email principal</label>
                                                <input type=\"email\"
                                                       id=\"pizzygo-settings-email\" />
                                            </div>
                                            <div class=\"row\" id=\"pizzygo-settings-secondary-emails\">
                                                <div class=\"col s12\" id=\"pizzygo-settings-secondary-emails-list\"></div>
                                                <div class=\"col s12\">
                                                    <div class=\"input-field\">
                                                        <label for=\"pizzygo-settings-secondary-email\">Emails secondaires</label>
                                                        <input type=\"email\"
                                                               id=\"pizzygo-settings-secondary-email\" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-phone\">Téléphone</label>
                                                <input type=\"tel\"
                                                       id=\"pizzygo-settings-phone\" />
                                            </div>
                                            <div class=\"row\" id=\"pizzygo-settings-secondary-phones\">
                                                <div class=\"col s12\" id=\"pizzygo-settings-secondary-phones-list\"></div>
                                                <div class=\"col s12\">
                                                    <div class=\"input-field\">
                                                        <label for=\"pizzygo-settings-secondary-phone\">Téléphones secondaires</label>
                                                        <input type=\"email\"
                                                               id=\"pizzygo-settings-secondary-phone\" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"card\">
                                <div class=\"card-content\">
                                    <div class=\"card-title\">
                                        <h5 class=\"title\">Changer mon mot de passe</h5>
                                    </div>
                                    <div class=\"row\">
                                        <div class=\"col s12\">
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-old-password\">Mot de passe actuelle (<span class=\"red-text\">*</span>) </label>
                                                <input type=\"password\" id=\"pizzygo-settings-old-password\" />
                                            </div>
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-new-password\">Nouveau mot de passe (<span class=\"red-text\">*</span>) </label>
                                                <input type=\"password\" id=\"pizzygo-settings-new-password\" />
                                            </div>
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-confirm-new-password\">Confirmer le nouveau mot de passe (<span class=\"red-text\">*</span>) </label>
                                                <input type=\"password\" id=\"pizzygo-settings-confirm-new-password\" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"card\">
                                <div class=\"card-content\">
                                    <div class=\"card-title\">
                                        <h5 class=\"title\">Informations bancaire</h5>
                                    </div>
                                    <div class=\"row\">
                                        <div class=\"col s12\">
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-paypal-email\">Email Paypal</label>
                                                <input type=\"email\" id=\"pizzygo-settings-paypal-email\" />
                                            </div>
                                            <div class=\"input-field\">
                                                <label for=\"pizzygo-settings-paypal-password\">Mot de passe Paypal</label>
                                                <input type=\"password\" id=\"pizzygo-settings-paypal-password\" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!-- Done -->
            <div class=\"row pizzygo-action-link-content\" id=\"schedules\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h2 class=\"z-depth-3\" style=\"font-size: 25px; padding: 20px;\">
                            <i class=\"material-icons\">schedule</i>
                            Mes Horaires
                        </h2>
                    </div>
                </div>
                <div class=\"row\">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    Lundi
                                </th>
                                <th>
                                    Mardi
                                </th>
                                <th>
                                    Mercredi
                                </th>
                                <th>
                                    Jeudi
                                </th>
                                <th>
                                    Vendredi
                                </th>
                                <th>
                                    Samedi
                                </th>
                                <th>
                                    Dimanche
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Matinée
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-lundi-ouvert\">Ouvre à</label>
                                        <input id=\"matine-lundi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-lundi-ferme\">Ferme à</label>
                                        <input id=\"matine-lundi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-mardi-ouvert\">Ouvre à</label>
                                        <input id=\"matine-mardi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-mardi-ferme\">Ferme à</label>
                                        <input id=\"matine-mardi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-mercredi-ouvert\">Ouvre à</label>
                                        <input id=\"matine-mercredi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-mercredi-ferme\">Ferme à</label>
                                        <input id=\"matine-mercredi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-jeudi-ouvert\">Ouvre à</label>
                                        <input id=\"matine-jeudi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-jeudi-ferme\">Ferme à</label>
                                        <input id=\"matine-jeudi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-vendredi-ouvert\">Ouvre à</label>
                                        <input id=\"matine-vendredi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-vendredi-ferme\">Ferme à</label>
                                        <input id=\"matine-vendredi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-samedi-ouvert\">Ouvre à</label>
                                        <input id=\"matine-samedi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-samedi-ferme\">Ferme à</label>
                                        <input id=\"matine-samedi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-dimanche-ouvert\">Ouvre à</label>
                                        <input id=\"matine-dimanche-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"matine-dimanche-ferme\">Ferme à</label>
                                        <input id=\"matine-dimanche-ferme\" type=\"number\" />
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Midi
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Après-midi
                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-lundi-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-lundi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-lundi-ferme\">Ferme à</label>
                                        <input id=\"aprem-lundi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-mardi-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-mardi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-mardi-ferme\">Ferme à</label>
                                        <input id=\"aprem-mardi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-mercredi-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-mercredi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-mercredi-ferme\">Ferme à</label>
                                        <input id=\"aprem-mercredi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-jeudi-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-jeudi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-jeudi-ferme\">Ferme à</label>
                                        <input id=\"aprem-jeudi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-vendredi-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-vendredi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-vendredi-ferme\">Ferme à</label>
                                        <input id=\"aprem-vendredi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-samedi-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-samedi-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-samedi-ferme\">Ferme à</label>
                                        <input id=\"aprem-samedi-ferme\" type=\"number\" />
                                    </div>

                                </td>
                                <td>
                                    <div class=\"pizzygo-switch switch\">
                                        <label>
                                            Fermé
                                            <input type=\"checkbox\">
                                            <span class=\"lever\"></span>
                                            Ouvert
                                        </label>
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-dimanche-ouvert\">Ouvre à</label>
                                        <input id=\"aprem-dimanche-ouvert\" type=\"number\" />
                                    </div>
                                    <div class=\"input-field\">
                                        <label for=\"aprem-dimanche-ferme\">Ferme à</label>
                                        <input id=\"aprem-dimanche-ferme\" type=\"number\" />
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <div class=\"modal pizzygo-modal\" id=\"pizzygo-order-detail-modal\">
            <div class=\"modal-content\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h5 id=\"pizzygo-order-detail-modal-title\"></h5>
                        <table id=\"pizzygo-order-detail-modal-products\" class=\"striped\">
                            <thead>
                                <tr>
                                    <th>
                                        Nom du produit
                                    </th>
                                    <th>
                                        Prix du produit
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"modal pizzygo-modal\" id=\"pizzygo-all-order-modal\">
            <div class=\"modal-content\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h5 id=\"pizzygo-all-order-modal-title\"></h5>
                        <p id=\"pizzygo-all-order-modal-address\"></p>
                        <p id=\"pizzygo-all-order-modal-status\"></p>
                        <span id=\"pizzygo-all-order-modal-date\"></span>
                        <table id=\"pizzygo-all-order-modal-products\" class=\"striped\">
                            <thead>
                            <tr>
                                <th>
                                    Nom du produit
                                </th>
                                <th>
                                    Prix du produit
                                </th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                        </table>
                        <p id=\"pizzygo-all-order-modal-comment\"></p>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <div class=\"row\">
                    <div class=\"col s12 center-align m4 offset-m4\">
                        <a href=\"javascript:window.print()\" class=\"btn btn-floating orange\">
                            <i class=\"material-icons\">local_printshop</i>
                        </a>
                        <a href=\"#\" data-order-id=\"\" class=\"btn btn-floating orange\" onclick=\"utils.functions.create_order_pdf($(this).data('order-id'))\">
                            <i class=\"material-icons\">picture_as_pdf</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"modal pizzygo-modal\" id=\"pizzygo-customer-detail-modal\">
            <div class=\"modal-content\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h2 class=\"pizzygo-title\"></h2>
                    </div>
                    <div class=\"col s12\">
                        <div class=\"row\">
                            <div class=\"col s12 describe\"></div>
                            <div class=\"col s12 emails\"></div>
                            <div class=\"col s12 phones\"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    {$this->js()}
</html>";
	}

	/**
	 * @param User $user
	 * @return string
	 */
	protected function dashboard_vendor(User $user) {
		return "";
	}

	/**
	 * @param User $user
	 * @return string
	 */
	protected function dashboard_admin(User $user) {
		return "";
	}

	private function get_real_user_role() {
		switch ($this->get('role')) {
			case 'customer':
				return Role::USER;
			case 'admin':
				return Role::ADMIN;
			case 'vendor':
				return Role::VENDOR;
			default:
				return $this->get('user')->get('role');
		}
	}

	public function render(): string {
		$this->header();
		$user = $this->get('user');

		switch ($this->get_real_user_role()) {
			case Role::USER:
				return $this->dashboard_user($user);
			case Role::VENDOR:
				return $this->dashboard_vendor($user);
			case Role::ADMIN:
				return $this->dashboard_admin($user);
			default:
				return '';
		}
	}

	public function js() {
		return "
		<script src='/static/dist/js/index.js'></script>";
	}

	public function css() {
		return "<link rel='stylesheet' href='/static/dist/css/theme.css' />
        <link rel='stylesheet' href='/static/dist/css/print/theme.css' media='print' />";
	}
}