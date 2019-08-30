'use strict';
$(document).ready(() => {
	let files_requires = {
		index: [],
		vendor: [
			'../static/dist/libs/ChartJs/Chart.min.js',

			'../static/dist/js/classes/Login.js',

			'../static/dist/js/classes/Addresses.js',

			'../static/dist/js/classes/Roles.js',

			'../static/dist/js/classes/OrderDetails.js',

			'../static/dist/js/classes/CategoriesVariants.js',

			'../static/dist/js/classes/RolesEnum.js',
			'../static/dist/js/classes/OrderStatus.js',

			'../static/dist/js/classes/UserPhones.js',
			'../static/dist/js/classes/UserEmails.js',

			'../static/dist/js/classes/User.js',
			'../static/dist/js/classes/Users.js',

			'../static/dist/js/classes/ProductCategory.js',
			'../static/dist/js/classes/ProductCategories.js',

			'../static/dist/js/classes/Product.js',
			'../static/dist/js/classes/Products.js',

			'../static/dist/js/classes/Order.js',
			'../static/dist/js/classes/Orders.js',

			'../static/dist/js/requires.js'
		],
		customer: [
			'../static/dist/js/classes/Login.js',

			'../static/dist/js/classes/RolesEnum.js',

			'../static/dist/js/classes/Addresses.js',

			'../static/dist/js/classes/Roles.js',

			'../static/dist/js/classes/UserPhones.js',
			'../static/dist/js/classes/UserEmails.js',

			'../static/dist/js/classes/User.js',
			'../static/dist/js/classes/Users.js',

			'../static/dist/js/requires.js'
		],
		'notre-mission': [
			'static/dist/js/classes/Login.js',

			'static/dist/js/classes/RolesEnum.js',

			'static/dist/js/classes/Addresses.js',

			'static/dist/js/classes/Roles.js',

			'static/dist/js/classes/UserPhones.js',
			'static/dist/js/classes/UserEmails.js',

			'static/dist/js/classes/User.js',
			'static/dist/js/classes/Users.js',

			'static/dist/js/requires.js'
		]
	};

	let page = window.location.href.split('/')[window.location.href.split('/').length-1]
		.split('.')[0];
	if(page === '' || page === '#' || page === 'home') page = 'index';
	if(files_requires[page] !== undefined) {
		for(let i in files_requires[page]) {
			$('head').append(`<script src="${files_requires[page][i]}"></script>`)
		}
	}
	if(utils.functions.in_array(page, pages_disponibles)) {
		active_window_script[page]({
			CONSTANT: CONSTANT,
			utils: utils,
			modals: modals,
			sidenavs: sidenavs,
			pizzygo: pizzygo,
			materialize: materialize,
			scroll: scroll,
			orders: orders,
			card: card,
			users: users,
			notifications: notifications
		});
		$(".loader-container").fadeOut("1000", () => console.log(`## PIZZYGO PAGE LOADED ##`));
	}
	else console.error(`Impossible de charger le script pour la page ${page}! Il n'existe pas!`);
});