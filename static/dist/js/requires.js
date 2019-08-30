'use strict';

let CONSTANT = {
	ROLES: {
		ADMIN: 0,
		SUPADMIN: 1,
		CUSTOMER: 2,
		VENDOR: 3
	},
	urls: {
		ws: '/api',
		api_addresses: 'api-adresse.data.gouv.fr/search/'
	}
};
let callbacks = {
	disconnect: (disconnected, current_page) => {
		if(disconnected) {
			$('#pizzygo-menu-bar').html(`<li><a class="black-text" href="/notre-mission">La mission de PizzyGo</a></li>
                    <li><a class="black-text modal-trigger" id="connect-modal-link" href="#pizzygo-modal-connection">Connexion</a></li>
                    <li><a class="black-text modal-trigger" id="inscription-modal-link" href="#pizzygo-modal-connection">S'inscrire</a></li>`);
			$('#pizzygo-mobile-menu').html(`<li><a class="white-text" href="notre-mission">La mission de PizzyGo</a></li>
                        <li><a class="white-text modal-trigger" id="connect-modal-link" href="#pizzygo-modal-connection">Connexion</a></li>`);
			if(current_page !== 'index') {
				window.location.href = '/';
			}
		}
		else {
			alert('Une erreur est survenu lors de la deconnection !! veuillez réessayer plus tards');
		}
	},
	pizzygo_menu_bar_disconnect_click: (e, current_page) => {
		e.preventDefault();
		Login.get_connected_user((status, user) => {
			let roles = [];
			for(let i in user.roles) {
				roles[i] = user.roles[i].role;
			}
			if(utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles))
				$('#pizzygo-account-menu').sidenav('close');
		});
		Login.disconnect(disconnected => callbacks.disconnect(disconnected, current_page));
	},
	pizzygo_login: (status, user, current_page) => {
		if(status) {
			let roles = [];
			for(let i in user.roles) {
				roles[i] = user.roles[i].role;
			}
			let trigger = (utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles) ? 'sidenav' : 'dropdown') + '-trigger';
			let complete_name = user.first_name + ' ' + user.last_name;
			let target = utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles) ? 'pizzygo-account-menu' : 'pizzygo-dashboard-dropdown';
			let profil_image = user.profil_img !== '' ? CONSTANT.urls.ws.replace('/index.php', '') + user.profil_img : 'https://materializecss.com/images/yuna.jpg';

			let html = (utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles) && current_page === 'vendor') ? `<li>
                            <a href="#" data-target="pizzygo-dashboard-menu" class="show-on-medium-and-down show-on-medium-and-up sidenav-trigger">
                                <i class="material-icons black-text">menu</i>
                            </a>
                        </li>` : '';
			html += `<li>
                            <a class="black-text" href="/notre-mission">La mission de PizzyGo</a>
                        </li>
                        <li>
                            <div style="width: 310px;" class="card grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper pizzygo-dashboard-pseudo">
                                    <div class="col s8">
                                        <a class="pizzygo-dashboard-pseudo-link pizzygo-basic-link show-on-medium-and-down show-on-medium-and-up ${trigger} pizzygo-${trigger}"
                                           data-target='${target}'
                                           href="#">${complete_name}</a>
                                    </div>
                                    <div class="col s2 valign-wrapper">
                                        <img src="${profil_image}"
                                             class="circle responsive-img pizzygo-dashboard-profil-image"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                            ${utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles) ? '' : `<ul id='pizzygo-dashboard-dropdown' class='dropdown-content'>
                                <li id="pizzygo-tab-account-click">
                                    <a class="orange-text" href="/dashboard/me?account">Mon compte</a>
                                </li>
                                <li>
                                    <a class="orange-text pizzygo-menu-bar-disconnect" href="#">Déconnexion</a>
                                </li>
                            </ul>`}
                        </li>`;

			if(!utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles)) {
				target += '-mobile';
			}
			let mobile_html = `<li>
                            <a class="white-text" href="/notre-mission">La mission de PizzyGo</a>
                        </li>
                        <li>
                            <div style="width: 310px;" class="card grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper pizzygo-dashboard-pseudo">
                                    <div class="col s8">
                                        <a class="pizzygo-dashboard-pseudo-link pizzygo-basic-link show-on-medium-and-down show-on-medium-and-up ${trigger} pizzygo-${trigger}"
                                           data-target='${target}'
                                           href="#">${complete_name}</a>
                                    </div>
                                    <div class="col s2 valign-wrapper">
                                        <img src="${profil_image}"
                                             class="circle responsive-img pizzygo-dashboard-profil-image"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                            ${utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles) ? '' : `<ul id='pizzygo-dashboard-dropdown-mobile' class='dropdown-content'>
                                <li id="pizzygo-tab-account-click">
                                    <a class="orange-text" href="/dashboard/me?account">Mon compte</a>
                                </li>
                                <li>
                                    <a class="orange-text pizzygo-menu-bar-disconnect" href="#">Déconnexion</a>
                                </li>
                            </ul>`}
                        </li>`;

			$('#pizzygo-menu-bar').html(html);
			$('#pizzygo-mobile-menu').html(mobile_html);

			if(utils.functions.in_array(RolesEnum.ROLE_VENDOR, roles)) {
				$('main').append(`
            <ul class="pizzygo-sidenav sidenav white black-text" id="pizzygo-account-menu">
                <li id="pizzygo-tab-account-click">
                    <a class="orange-text" href="/dashboard/vendor.html">
                        <i class="material-icons">person</i>
                        Mon compte
                    </a>
                </li>
                <li>
                    <a class="orange-text pizzygo-menu-bar-disconnect" href="#">
                        <i class="material-icons">power_settings_new</i>
                        Déconnexion
                    </a>
                </li>
            </ul>`);

			}
			$('.pizzygo-menu-bar-disconnect').on('click', e => callbacks.pizzygo_menu_bar_disconnect_click(e, current_page));
			materialize.components.init(modals.get.all_windows(
				'pizzygo-modal-connection',
				'pizzygo-connection-modal'
			));
		}
		else {
			alert('La connection à échouée !! aucun compte n\'existe avec cette email !!');
		}
	}
};
let utils = {
	functions: {
		in_array: (needle, haystack) => {
			let length = haystack.length;
			for (let i = 0; i < length; i++) {
				if (haystack[i] === needle) return true;
			}
			return false;
		},
		delete_from_array: (elem, array) => {
			let tmp = [];
			$(array).each((key, value) => {
				if (value !== elem) {
					tmp.push(value);
				}
			});
			return tmp;
		},
		replace: (search, replace, str) => {
			let tmp = str;
			if (typeof search === 'object') {
				for (let i in search) {
					let obj = search[i];
					let obj2;
					if (typeof replace === 'object') {
						obj2 = replace[i];
					} else {
						obj2 = replace;
					}
					let regex = new RegExp(`${obj}`, 'gi');
					tmp = tmp.replace(regex, obj2);
				}
				return tmp;
			} else {
				return tmp.replace(search, replace);
			}
		},
		get_addresses: (input, callback) => {
			$.ajax({
				url: `https://api-adresse.data.gouv.fr/search/`,
				data: {
					q: utils.functions.replace(" ", "+", input)
				},
				method: 'GET'
			}).done(callback);
		},
		get_address_coordinates: (longitude, latitude) => {
			utils.static.search_coordinates = {
				longitude: longitude,
				latitude: latitude
			};
		},
		create_order_pdf: order_id => {

		},
		create_orders_pdf: () => {
			let my_session = utils.static.me;
		},
		create_orders_excel: () => {
			let my_session = utils.static.me;
		},
		create_orders_csv: () => {
			let my_session = utils.static.me;
		}
	},
	menu: {
		onglet: {
			account: 'my-account'
		},
		init: {
			change: {
				onglet: () => {
					let param = window.location.href.split('?');
					let url = window.location.href.split('?')[0];
					param = param[1] !== undefined ? param[1] : null;
					if (param !== null && utils.menu.onglet[param] !== undefined) {
						window.location.href = url + '#' + utils.menu.onglet[param];
					}
				}
			}
		}
	},
	dropdown: {
		is_opened: false
	},
	accounts_with_role: {
		'customer@gmail.com': CONSTANT.ROLES.CUSTOMER,
		'vendor@gmail.com': CONSTANT.ROLES.VENDOR
	},
	redirect_page_per_role: {
		'dashboard/customer.html': CONSTANT.ROLES.CUSTOMER,
		'dashboard/vendor.html': CONSTANT.ROLES.VENDOR
	},
	tmp: {},
	static: {
		me: {},
		roles: [],
		users: [],
		addresses: [],
		user_phones: [],
		user_emails: [],
		products: [],
		orders: [],
		categories: [],
		category_variants: [],
		order_status: [],
		notifs_permission: false,
		search_coordinates: {}
	}
};
let modals = {
	init: {
		default_window: (modal_id, default_window, other_windows) => {
			let base = '.pizzygo-connection-modal-';
			$('#' + modal_id + ' ' + base + default_window).css('display', 'block');
			$(other_windows).each((key, value) => {
				$('#' + modal_id + ' ' + base + value).css('display', 'none');
			})
		},
		change_links: modal_windows =>
			$('.pizzygo-change-link').on('click', e => {
				e.preventDefault();
				let _modal_windows = modal_windows;
				let href = $($(e).get()[0].target).attr('href');
				href = href.split('#')[1];
				modals.change.window(
					'pizzygo-modal-connection',
					href,
					_modal_windows
				);
			})
	},
	change: {
		window: (modal_id, window_id, other_window) =>
			modals.init.default_window(modal_id, window_id, utils.functions.delete_from_array(window_id, other_window))
	},
	get: {
		all_windows: (modal_id, class_base) => {
			let all_divs = $('#' + modal_id + ' div');
			let tmp = [];
			$(all_divs).each((key, value) => {
				$(value.classList).each((num, _class) => {
					if (_class.substr(0, class_base.length) === class_base) {
						let _window = _class.replace(class_base + '-', '');
						if (!utils.functions.in_array(_window, tmp)) {
							tmp.push(_window);
						}
					}
				});
			});
			return tmp;
		}
	}
};
let sidenavs = {
	active_link: (sidenav_id, elem_to_active) => {
		elem_to_active.preventDefault();
		$('#' + sidenav_id + ' li').each((key, obj) => {
			if ($(obj).hasClass('active'))
				$(obj).removeClass('active');
		});
		$($(elem_to_active.target).parent()).addClass('active');
		let id_div_content = $(elem_to_active.target).attr('href').split('#')[1];
		$('.pizzygo-action-link-content').css('display', 'none');
		$('#' + id_div_content).css('display', 'block');
	},
	init_active_links: sidenav_id => {
		let li_list = document.querySelectorAll('#' + sidenav_id + ' li .pizzygo-action-link');
		let default_active = null;
		let default_active_link = null;
		for (let i = 0, max = li_list.length; i < max; i++) {
			let li = $(li_list[i]).parent();
			if ($(li).hasClass('active')) {
				default_active = li;
				default_active_link = $(li)[0].childNodes[1];
				break;
			}
		}
		if (default_active !== null) {
			$(default_active).addClass('active');
			let id_div_content = $(default_active_link).attr('href').split('#')[1];
			$('.pizzygo-action-link-content').css('display', 'none');
			$('#' + id_div_content).css('display', 'block');
		}
	}
};
let pizzygo = {
	init: {
		badges: () => {
			$('.pizzygo-badge').each((key, value) => {
				let elem = $(value);
				elem.addClass(elem.data('add-classes'))
					.html(elem.data('count'))
			})
		},
		menus: () => {
			$('.pizzygo-notifications-menu').css('margin-top', `${$($('.pizzygo-global-menu')[0]).height()}px`)
			$('.pizzygo-action-link-content').each((key, elem) => {
				let elem_content = $(elem).html();
				let pizzygo_global_menu = $($('.pizzygo-global-menu')[0]);
				let pizzygo_notifications_menu = $($('.pizzygo-notifications-menu')[0]);
				let height = pizzygo_global_menu.css('display') === 'none' ? pizzygo_global_menu.height() - 30 : pizzygo_global_menu.height() + pizzygo_notifications_menu.height();
				$(elem).html(`<div class="col s12" style="height: ${height}px"></div>${elem_content}`)
			});
		}
	},
	parallax: {
		resize: () => $('.pizzygo-parallax-container').height($(window).height())
	},
	connection: (e, current_page) => {
		e.preventDefault();
		Login.login(
			$('#pizzygo-modal-connection #pizzygo-connection-email').val(),
			$('#pizzygo-modal-connection #pizzygo-connection-password').val(),
			(status, user) => callbacks.pizzygo_login(status, user, current_page)
		);
	},
	search_motor: () => {
		$('#pizzygo-search_motor').focusin(elem => {
			let $ville = $(elem.target);
			let $ville_value = $ville.val();
			let text_size = $ville_value.length;
			if (text_size >= 2) {
				$('#pizzygo-address-dropdown').removeClass('hide').addClass('show');
			}
			$ville.keyup(e => {
				let $ville = $(e.target);
				let $ville_value = $ville.val();
				let text_size = $ville_value.length;
				if (text_size >= 2) {
					utils.functions.get_addresses($ville_value, data => {
						let cities = data.features;
						let list_str = '';
						for (let i in cities) {
							if (i < 6) {
								list_str += `<li>
    <a href="#" class="black-text" data-address="${cities[i].properties.label}" data-latitude="${cities[i].geometry.coordinates[0]}" data-longitude="${cities[i].geometry.coordinates[1]}"
       onclick="$('#pizzygo-search_motor').val($(this).data('address')); utils.functions.get_address_coordinates($(this).data('longitude'), $(this).data('latitude'));">
        ${cities[i].properties.label}
    </a>
</li>`;
							}
						}
						if (cities.length > 6) {
							list_str += `<li class="center-align black-text"> ... </li>`;
						}
						$('#pizzygo-address-dropdown').html(list_str);
						if (!$('#pizzygo-address-dropdown').hasClass('show')) {
							$('#pizzygo-address-dropdown').removeClass('hide').addClass('show');
						}
					});
				} else {
					if (!$('#pizzygo-address-dropdown').hasClass('hide')) {
						$('#pizzygo-address-dropdown').removeClass('show').addClass('hide');
					}
				}
			});
		});
		$('.pizzygo-parallax, .pizzygo-parallax-container, .pizzygo-home-top-space-2').on('click', () => $('#pizzygo-address-dropdown').removeClass('show').addClass('hide'));
		$('#pizzygo-send_search').on('click', e => {
			let input = $('#pizzygo-search_motor').val();
			if (input.length > 0) {
				console.log(utils.static.search_coordinates);
			}
		});
	}
};
let materialize = {
	components: {
		init: modal_windows => {
			$('.pizzygo-parallax').parallax();
			$('.pizzygo-sidenav').sidenav();
			$('.pizzygo-modal').modal();

			$('#connect-modal-link').on('click', () =>
				modals.change.window(
					'pizzygo-modal-connection',
					'connect',
					modal_windows
				)
			);
			$('#inscription-modal-link').on('click', () =>
				modals.change.window(
					'pizzygo-modal-connection',
					'inscription',
					modal_windows
				)
			);

			$('#connect-modal-link-mobile').on('click', () =>
				modals.change.window(
					'pizzygo-modal-connection',
					'connect',
					modal_windows
				)
			);
			$('#inscription-modal-link-mobile').on('click', () =>
				modals.change.window(
					'pizzygo-modal-connection',
					'inscription',
					modal_windows
				)
			);

			$('.tabs').tabs();
			$('.pizzygo-dropdown-trigger').dropdown()
				.dropdown({
					onOpenStart: () => {
						utils.dropdown.is_opened = true;
					},
					onCloseStart: () => {
						utils.dropdown.is_opened = false;
					}
				});
		}
	}
};
let scroll = {
	animate: () => {
		// au clic sur un lien
		$('.pizzygo-scroll-link').on('click', function (evt) {
			// bloquer le comportement par défaut: on ne rechargera pas la page
			evt.preventDefault();
			// enregistre la valeur de l'attribut  href dans la variable target
			let target = $(this).attr('href');
			/* le sélecteur $(html, body) permet de corriger un bug sur chrome
			   et safari (webkit) */
			$('html, body').stop().animate({
				scrollTop: $(target).offset().top
			}, 1000);
		});
	}
};
let orders = {
	build_array: () => {
		Orders.orders = 'init';
		let orders = Orders.orders;
		let table = '';
		for (let o in orders) {
			let order = orders[o];

			let price = 0;
			let gains = 0;
			for (let i = 0, max = order.detail.length; i < max; i++) {
				let variant_selected = CategoriesVariants.getById(order.detail[i].variant_selected);
				price += variant_selected.price;
				gains += new Product().get_gains(variant_selected.price);
			}

			table += '<tr>';
			table += `<td>
    <button class="btn btn-floating green">
        <i class="material-icons">more_horiz</i>
    </button>
</td>`;
			table += `<td>
    <b>#${order.id}</b> par <i><a href="#" class="pizzygo-basic-link" onclick="users.open_modal_with_id(${order.customer.id})">${order.customer.name} ${order.customer.surname}</a></i>
</td>`;
			table += `<td class="orange-text cursor-pointer click-trigger orders-details" data-order-id="${order.id}">
    ${order.nb_objects} produit${order.nb_objects > 1 ? 's' : ''}
</td>`;
			table += `<td>
    ${order.address === '' ? `Pas d'adresse` : `${order.customer.name} ${order.customer.surname}<br>${order.address.address.replace('\n', '<br>')}`}
</td>`;
			table += `<td>
    ${order.status.name}
</td>`;
			table += `<td>
    ${price} €
</td>`;
			table += `<td>
    ${gains} €
</td>`;
			table += `<td>
    ${order.date}
</td>`;
			table += `<td>
    <button class="btn btn-floating indigo darken-4">
        <i class="material-icons">check_box</i>
    </button>
    <button class="btn btn-floating indigo darken-4" onclick="orders.fill_and_open_all_order_modal(orders, ${order.id})">
        <i class="material-icons">remove_red_eye</i>
    </button>
</td>`;
			table += '</tr>';
		}
		$('#pizzygo-order-table-content').html(table);
	},
	fill_all_order_modal: order_id => {
		let order = Orders.getById(order_id);
		order = order.length === 1 ? order[0] : null;
		if (order !== null) {
			$('#pizzygo-all-order-modal-title').html(`#${order_id} par ${order.customer.name} ${order.customer.surname} ( ${order.status.name} )`);
			let products_str = '';
			let price = 0;
			let gains = 0;
			for (let i = 0, max = order.detail.length; i < max; i++) {
				products_str += '<tr>';
				products_str += `    <td>${order.detail[i].name} ${(order.detail[i].variants !== null && order.detail[i].variants.length !== 0 ? '( ' + order.detail[i].variants[0].name + ' )' : '')}</td>`;
				products_str += `    <td>${(order.detail[i].variants !== null && order.detail[i].variants.length !== 0 ? order.detail[i].variants[0].price : order.detail[i].price)} €</td>`;
				products_str += '</tr>';
				let variant_selected = CategoriesVariants.getById(order.detail[i].variant_selected);
				price += variant_selected.price;
				gains += variant_selected.gains;
			}
			$('#pizzygo-all-order-modal-products tfoot').html(`<tr><th>Total</th><td>${price} €</td></tr><tr><th>Gain</th><td>${gains} €</td></tr>`);
			$('#pizzygo-all-order-modal-address').html(order.address.address.replace("\n", "<br>"));
			$('#pizzygo-all-order-modal-status').html(order.status.name);
			$('#pizzygo-all-order-modal-date').html(order.date);
			if (order.comment !== '') {
				$('#pizzygo-all-order-modal-comment').html(`<div class="card"><div class="card-content">${order.comment.replace("\n", "<br>")}</div></div>`);
			}
			$('#pizzygo-all-order-modal-products tbody').html(products_str);
			//$('#pizzygo-all-order-detail-products tfoot').html(`<tr><th>Total</th><td>${order.amount} €</td></tr>`);
		}
	},
	fill_details_modal: order_id => {
		let order = Orders.getById(order_id);
		order = order.length === 1 ? order[0] : null;
		if (order !== null) {
			$('#pizzygo-order-detail-modal-title').html(`Commande #${order_id} ( ${order.status.name} )`);
			let products_str = '';
			let price = 0;
			for (let i = 0, max = order.detail.length; i < max; i++) {
				products_str += '<tr>';
				products_str += `    <td>${order.detail[i].name} ${(order.detail[i].variants !== null && order.detail[i].variants.length !== 0 ? '( ' + order.detail[i].variants[0].name + ' )' : '')}</td>`;
				products_str += `    <td>${(order.detail[i].variants !== null && order.detail[i].variants.length !== 0 ? order.detail[i].variants[0].price : order.detail[i].price)} €</td>`;
				products_str += '</tr>';

				let variant_selected = CategoriesVariants.getById(order.detail[i].variant_selected);
				price += variant_selected.price;
			}
			$('#pizzygo-order-detail-modal-products tbody').html(products_str);
			$('#pizzygo-order-detail-modal-products tfoot').html(`<tr><th>Total</th><td>${price} €</td></tr>`);
		}
	},
	fill_and_open_details_modal: (_this, order_id) => {
		_this.fill_details_modal(order_id);
		$('#pizzygo-order-detail-modal').modal('open');
	},
	fill_and_open_all_order_modal: (_this, order_id) => {
		_this.fill_all_order_modal(order_id);
		$('#pizzygo-all-order-modal').modal('open');
	}
};
let card = {
	stats_home: {
		template: `<div class="row card" style="height: 80px;">
                        <div class="col s3 m4 {{bg_color}} valign-wrapper"
                             style="height: 80px; padding-left: 25px;">
                            <i class="material-icons white-text">{{symbol}}</i>
                        </div>
                        <div class="col s9 m8 center-align"
                             style="padding-top: 10px;">
                            <span style="font-size: 20px;"
                                  class="light-blue-text">{{value}}
                            </span>
                            <br>
                            <span style="font-size: 12px;">{{describe}}</span>
                        </div>
                    </div>`,
		display: () => {
			let infos = [];
			Orders.orders = 'init';
			let orders = Orders.orders;

			let amount_into_the_month = 0;
			let gain_into_the_month = 0;

			let products_deals_into_the_month = [];
			let number_of_orders_into_the_month = orders.length;

			for (let i in orders) {
				for (let j in orders[i].detail) {
					let variant = CategoriesVariants.getById(orders[i].detail[j].variant_selected);
					variant.gains = new Product().get_gains(variant.price);
					amount_into_the_month += variant.price;
					gain_into_the_month += variant.gains;
				}

				for (let j in orders[i].detail) {
					if (products_deals_into_the_month[orders[i].detail[j].id] === undefined) {
						products_deals_into_the_month[orders[i].detail[j].id] = '';
					}
				}
			}
			let number_of_products_deals_into_the_month = products_deals_into_the_month.length;
			infos.push({
				symbol: 'euro_symbol',
				value: `${amount_into_the_month} €`,
				describe: 'Ventes nettes de ce mois.',
				bg_color: 'orange'
			});
			infos.push({
				symbol: 'euro_symbol',
				value: `${gain_into_the_month} €`,
				describe: 'Gain ce mois.',
				bg_color: 'light-blue'
			});
			infos.push({
				symbol: 'style',
				value: `${number_of_products_deals_into_the_month} Produit${number_of_products_deals_into_the_month <= 1 ? '' : 's'}`,
				describe: 'Ventes de ce mois-ci.',
				bg_color: 'deep-purple'
			});
			infos.push({
				symbol: 'add_shopping_cart',
				value: `${number_of_orders_into_the_month} Commande${number_of_orders_into_the_month <= 1 ? '' : 's'}`,
				describe: 'Reçus ce mois-ci.',
				bg_color: 'light-green'
			});

			let infos_string = '';
			for (let i in infos) {
				let info = infos[i];
				infos_string += `<div class="col s12 m6 l3">
    ${utils.functions.replace(['{{symbol}}', '{{value}}', '{{describe}}', '{{bg_color}}'], [info.symbol, info.value, info.describe, info.bg_color], card.stats_home.template)}
</div>`;
				card.stats_home.display_chart(
					amount_into_the_month,
					gain_into_the_month,
					number_of_products_deals_into_the_month,
					number_of_orders_into_the_month
				);
			}

			$('#pizzygo-vendor-dashboard-home').html(infos_string);
		},
		display_chart: (amount_into_the_month, gain_into_the_month,
						number_of_products_deals_into_the_month, number_of_orders_into_the_month) => {
			new Chart("pizzygo-stats-home-amounts", {
				type: 'line',
				data: {
					labels: [
						"Janvier", "Février", "Mars", "Avril",
						"Mai", "Juin", "Juillet", "Août",
						"Septembre", "Octobre", "Novembre", "Décembre"
					],
					datasets: [
						{
							label: 'Gains ( € )',
							data: [
								5000, 5100, 7029, 500,
								2500, 5000, 150000, 20000,
								10100.28, 5110.5, 511.3,
								gain_into_the_month
							],
							backgroundColor: 'lightblue',
							borderWidth: 1
						},
						{
							label: 'Ventes nettes ( € )',
							data: [
								10000, 10200, 14058, 1000,
								5000, 10000, 300000, 40000,
								20200.56, 10220.99, 1022.60,
								amount_into_the_month
							],
							backgroundColor: 'orange',
							borderWidth: 1
						}
					]
				},
				options: {
					layout: {
						padding: {
							left: 50,
							right: 0,
							top: 0,
							bottom: 0
						}
					}
				}
			});

			new Chart("pizzygo-stats-home-numbers", {
				type: 'line',
				data: {
					labels: [
						"Janvier", "Février", "Mars", "Avril",
						"Mai", "Juin", "Juillet", "Août",
						"Septembre", "Octobre", "Novembre", "Décembre"
					],
					datasets: [
						{
							label: 'N° de produits Vendus',
							data: [
								5, 6, 4, 4,
								5, 7, 2, 5,
								7, 6, 4,
								number_of_products_deals_into_the_month
							],
							backgroundColor: 'purple',
							borderWidth: 1
						},
						{
							label: 'N° de commandes',
							data: [
								100, 120, 150, 50,
								80, 30, 50, 130,
								60, 90, 50,
								number_of_orders_into_the_month
							],
							backgroundColor: 'green',
							borderWidth: 1
						}
					]
				},
				options: {
					layout: {
						padding: {
							left: 50,
							right: 0,
							top: 0,
							bottom: 0
						}
					}
				}
			});
		}
	},
	articles: {
		product_template: `<div class="card">
                        <div class="card-image">
                            <img src="{{image}}" alt="{{image_alt}}" />
                            <span class="card-title {{title_color}}-text">
                                {{title}}
                            </span>
                            <a class="btn-floating halfway-fab waves-effect waves-light orange">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div class="card-content">
                            <p>
                                {{describe}}
                            </p>
                        </div>
                    </div>`,
		category_template: `<div class="col s12">
    <div class="card">
        <div class="card-title" style="padding: 10px; padding-bottom: 5px;">
            <div class="row">
                <div class="col s3">
                    <h5 class="title">{{category_name}}</h5>
                </div>
                <div class="col s6">
                    <div class="left" style="margin-top: 10px;">
                        {{nbProductsForCategory}} Produit{{pluriel}} 
                    </div>
                </div>
                <div class="col s3">
                    <div class="right" style="cursor:pointer; margin-top: 10px;" onclick="if($('#category-{{category_id}}').css('display') === 'block') {$('#category-{{category_id}}').css('display', 'none')} else {$('#category-{{category_id}}').css('display', 'block')}">
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`,
		create_variants_table: variants => {
			let table_variants = '<table>';
			table_variants += `<tr>
    <th>
        Variante
    </th>
    <th>
        prix ( € )
    </th>
</tr>`;
			for (let j in variants) {
				table_variants += `<tr>
    <td>
        ${variants[j].name}
    </td>
    <td>
        ${variants[j].price}
    </td>
</tr>`;
			}
			table_variants += '</table>';

			return table_variants;
		},
		display: () => {
			ProductCategories.products_cat = 'init';
			Products.products = 'init';
			let products = Products.products;
			let categories = ProductCategories.products_cat;

			let products_string = '';
			for (let i in categories) {
				let category = categories[i];
				let nbProductsForCategory = Products.getLengthWhereCategoryIs(category.name);
				products_string += utils.functions.replace(
					['{{category_name}}', '{{nbProductsForCategory}}', '{{pluriel}}', '{{category_id}}'],
					[category.name, nbProductsForCategory, (nbProductsForCategory > 1 ? 's' : ''), category.id],
					card.articles.category_template);
				products_string += `<div class="row" id="category-${category.id}">`;
				for (let i in products) {
					let product = products[i];
					if (product.category.id === category.id) {

						let table_variants = card.articles.create_variants_table(product.variants);

						products_string += `<div class="col s12 m6 l4 xl3">
        ${utils.functions.replace(
							['{{image}}', '{{image_alt}}', '{{describe}}', '{{title}}', '{{title_color}}'],
							[product.img, product.img_alt, product.describe + table_variants, product.name, (product.background_dark ? 'white' : 'black')],
							card.articles.product_template
						)}
    </div>`;
					}
				}
				products_string += `</div>`;
			}
			$('#pizzygo-vendor-dashboard-products').html(products_string);
		}
	}
};
let users = {
	template: `<div>
    <img src="{{profil_image}}" alt="" class="circle">
    <span class="title">{{name}} {{surname}}</span>
    <p class="truncate">
        {{describe}}
    </p>
    <a href="#" class="secondary-content" data-user_id={{user_id}} onclick="users.open_modal_with_id($(this).data('user_id'))">
        <i class="material-icons">search</i>
    </a>
</div>`,
	display: () => {
		let customers = Users.getCustomers();

		let customers_str = '';
		for (let i in customers) {
			let customer = customers[i];
			customers_str += `<li class="collection-item avatar">
    ${utils.functions.replace(
				['{{name}}', '{{surname}}', '{{describe}}', '{{profil_image}}', '{{user_id}}'],
				[customer.name, customer.surname, customer.describe, customer.profil_image, customer.id],
				users.template)}
</li>`;
		}

		$('#customers .collection').html(customers_str);
	},
	open_modal_with_id: id => {
		let customer = Users.getById(id);
		$('#pizzygo-customer-detail-modal .pizzygo-title').html(`${customer.name} ${customer.surname}`);
		$('#pizzygo-customer-detail-modal .describe').html(customer.describe.replace("\n", "<br>"));
		let emails = '<ul class="collection">';
		for (let i in customer.emails) {
			let email = customer.emails[i];
			emails += `<li class="collection-item"><a href="mailto:${email}">${email}</a></li>`;
		}
		emails += '</ul>';
		$('#pizzygo-customer-detail-modal .emails').html(emails);


		let phones = '<ul class="collection">';
		for (let i in customer.phones) {
			let phone = customer.phones[i];
			phones += `<li class="collection-item"><a href="tel:${phone}">${phone}</a></li>`;
		}
		phones += '</ul>';
		$('#pizzygo-customer-detail-modal .phones').html(phones);

		$('#pizzygo-customer-detail-modal').modal('open');
	},
	init_vendor_personal_infos: () => {
		let my_session = utils.static.me;
		$('a[data-target="pizzygo-account-menu"]').html(`${my_session.name} ${my_session.surname}`);
		$('.pizzygo-dashboard-profil-image').attr('src', my_session.profil_image);
		if (my_session.name !== '') {
			$('label[for="pizzygo-settings-name"]').addClass('active');
		}
		$('#pizzygo-settings-name').attr('value', my_session.name);
		if (my_session.surname !== '') {
			$('label[for="pizzygo-settings-surname"]').addClass('active');
		}
		$('#pizzygo-settings-surname').attr('value', my_session.surname);
		$('label[for="pizzygo-settings-email"]').addClass('active');
		$('#pizzygo-settings-email').attr('value', my_session.emails[0]);
		for (let i in my_session.emails) {
			if (i > 0) {
				$('#pizzygo-settings-secondary-emails-list').append(`<div class="input-field">
    <label class="active" for="pizzygo-settings-secondary-email-1">Email secondaire</label>
    <input  type="email"
            id="pizzygo-settings-secondary-email-${i}"
            value="${my_session.emails[i]}" />
</div>`);
			}
		}
		$('label[for="pizzygo-settings-phone"]').addClass('active');
		$('#pizzygo-settings-phone').attr('value', my_session.phones[0]);
		for (let i in my_session.phones) {
			if (i > 0) {
				$('#pizzygo-settings-secondary-phones-list').append(`<div class="input-field">
    <label class="active" for="pizzygo-settings-secondary-email-1">Téléphone secondaire</label>
    <input  type="tel"
            id="pizzygo-settings-secondary-phone-${i}"
            value="${my_session.phones[i]}" />
</div>`);
			}
		}

	},
	init_customer_personal_infos: () => {},
	create_vendor_stats_on_premium_users: () => {
		if (utils.static.me.isPremium()) {
			$('#stats').append('Je peux créer mes graphs dunuts dans la partie settings -- requires.js L730');
			console.warn('Je peux créer mes graphs dunuts dans la partie settings -- requires.js L730');
		}
	}
};
let pages_disponibles = [
	'index',
	'notre-mission',
	'vendor',
	'customer'
];
let notifications = {
	ask_auth: (callback) => {
		Notification.requestPermission(status => {
			utils.static.notifs_permission = status === 'granted';
			callback();
		});
	},
	create: (title, body, icon = null, tag = null, onclick = null, onshow = null, onclose = null, onerror = null) => {
		notifications.ask_auth(() => {
			if (utils.static.notifs_permission) {
				let options = {
					body: body,
					icon: (icon === null ? "https://pizzygo.fr/wp-content/uploads/2018/11/logoLAST.png" : icon)
				};
				if (tag !== null) {
					options.tag = tag;
				}
				let n = new Notification(title, options); // this also shows the notification
				if (onclick !== null) {
					n.addEventListener('click', onclick)
				}
				if (onshow !== null) {
					n.addEventListener('show', onshow)
				}
				if (onclose !== null) {
					n.addEventListener('close', onclose)
				}
				if (onerror !== null) {
					n.addEventListener('error', onerror)
				}
			}
		});
	}
};

let active_window_vendor = object => {

	// object.notifications.create(
	//     "1 nouvelle commande",
	//     "Vous avez une nouvelle commande",
	//     null, null,
	//     () => $('#pizzygo-notifications-menu a[href="#orders"]').click()
	// );

	Login.logged(logged => {
		if(logged) Login.get_connected_user((status, user) => callbacks.pizzygo_login(status, user, 'vendor'));
		else window.location.href = '/';
	});

	object.pizzygo.parallax.resize();
	$(window).resize(() => {
		object.pizzygo.parallax.resize();
	});
	let modal_windows = object.modals.get.all_windows(
		'pizzygo-modal-connection',
		'pizzygo-connection-modal'
	);
	object.materialize.components.init(modal_windows);
	object.pizzygo.init.badges();
	object.pizzygo.init.menus();
	$('main').on('click', () => {
		if (object.utils.dropdown.is_opened)
			$('.pizzygo-dropdown-trigger').dropdown('close');
	});
	object.modals.init.default_window(
		'pizzygo-modal-connection',
		'connect',
		[
			'inscription'
		]
	);
	// object.modals.init.change_links(modal_windows);
	// object.utils.menu.init.change.onglet();
	// $('#pizzygo-connection-modal-connect-button').on('click', object.pizzygo.connection);
	object.sidenavs.init_active_links('pizzygo-dashboard-menu');
	$('#pizzygo-dashboard-menu li a.pizzygo-action-link').on('click', e =>
		object.sidenavs.active_link('pizzygo-dashboard-menu', e));
	$('.pizzygo-notifications-menu a[href=\'#orders\']').on('click', e => {
		e.preventDefault();
		$('#pizzygo-dashboard-menu li a[href=\'#orders\']').click();
	});
	// object.orders.build_array();
	$('.click-trigger.orders-details').on('click',
		elem => object.orders.fill_and_open_details_modal(object.orders, $(elem.target).data('order-id')));
	// object.users.create_vendor_stats_on_premium_users();
	// object.card.stats_home.display();
	// object.card.articles.display();
	// object.users.display();
};
let active_window_index = object => {
	Login.logged(logged => {
		if(logged) Login.get_connected_user((status, user) => callbacks.pizzygo_login(status, user, 'index'));
		else {
			$('#pizzygo-menu-bar').html(`<li><a class="black-text" href="/notre-mission">La mission de PizzyGo</a></li>
                        <li><a class="black-text modal-trigger" id="connect-modal-link" href="#pizzygo-modal-connection">Connexion</a></li>
                        <li><a class="black-text modal-trigger" id="inscription-modal-link" href="#pizzygo-modal-connection">S'inscrire</a></li>`);
			$('#pizzygo-mobile-menu').html(`<li><a class="white-text" href="notre-mission">La mission de PizzyGo</a></li>
                        <li><a class="white-text modal-trigger" id="connect-modal-link" href="#pizzygo-modal-connection">Connexion</a></li>`);
			materialize.components.init(object.modals.get.all_windows(
				'pizzygo-modal-connection',
				'pizzygo-connection-modal'
			));
		}
	});

	object.pizzygo.search_motor();
	object.pizzygo.parallax.resize();
	$(window).resize(() => {
		object.pizzygo.parallax.resize();
	});
	let modal_windows = object.modals.get.all_windows(
		'pizzygo-modal-connection',
		'pizzygo-connection-modal'
	);
	object.materialize.components.init(modal_windows);
	object.modals.init.default_window(
		'pizzygo-modal-connection',
		'connect',
		[
			'inscription'
		]
	);
	object.modals.init.change_links(modal_windows);
	object.utils.menu.init.change.onglet();
	$('#pizzygo-connection-modal-connect-button').on('click', e => object.pizzygo.connection(e, 'index'));
	object.sidenavs.init_active_links('pizzygo-dashboard-menu');
};
let active_window_notre_mission = active_window_index;
let active_window_customer = object => {
	Login.logged(logged => {
		if(logged) Login.get_connected_user((status, user) => callbacks.pizzygo_login(status, user, 'customer'));
		else window.location.href = '/';
	});
	object.users.init_customer_personal_infos();
	object.pizzygo.parallax.resize();
	$(window).resize(() => {
		object.pizzygo.parallax.resize();
	});
	let modal_windows = object.modals.get.all_windows(
		'pizzygo-modal-connection',
		'pizzygo-connection-modal'
	);
	object.materialize.components.init(modal_windows);
	object.pizzygo.init.badges();
	object.pizzygo.init.menus();
	$('main').on('click', () => {
		if (object.utils.dropdown.is_opened) $('.pizzygo-dropdown-trigger').dropdown('close');
	});
	object.scroll.animate();
	object.modals.init.default_window(
		'pizzygo-modal-connection',
		'connect',
		[
			'inscription'
		]
	);
	object.modals.init.change_links(modal_windows);
	object.utils.menu.init.change.onglet();
	$('#pizzygo-connection-modal-connect-button').on('click', object.pizzygo.connection);
	object.sidenavs.init_active_links('pizzygo-dashboard-menu');
	$('#pizzygo-dashboard-menu li .pizzygo-action-link, .pizzygo-notifications-menu .pizzygo-action-link').on('click', e =>
		object.sidenavs.active_link('pizzygo-dashboard-menu', e));
};

let active_window_script = {
	index: active_window_index,
	'notre-mission': active_window_notre_mission,
	vendor: active_window_vendor,
	customer: active_window_customer
};