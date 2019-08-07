'use strict';
$(document).ready(() => {
	let files_requires = {
		index: [],
		vendor: [
			'../static/dist/libs/ChartJs/Chart.min.js',

			'../static/dist/js/classes/Login.js',

			'../static/dist/js/classes/Factories/Addresses.js',

			'../static/dist/js/classes/Factories/Roles.js',

			'../static/dist/js/classes/Factories/OrderDetails.js',

			'../static/dist/js/classes/Factories/CategoriesVariants.js',

			'../static/dist/js/classes/Enums/RolesEnum.js',
			'../static/dist/js/classes/Enums/OrderStatus.js',

			'../static/dist/js/classes/Factories/UserPhones.js',
			'../static/dist/js/classes/Factories/UserEmails.js',

			'../static/dist/js/classes/Entities/User.js',
			'../static/dist/js/classes/Factories/Users.js',

			'../static/dist/js/classes/Entities/ProductCategory.js',
			'../static/dist/js/classes/Factories/ProductCategories.js',

			'../static/dist/js/classes/Entities/Product.js',
			'../static/dist/js/classes/Factories/Products.js',

			'../static/dist/js/classes/Entities/Order.js',
			'../static/dist/js/classes/Factories/Orders.js',

			'../static/dist/js/pizzygo/requires.js'
		],
		customer: [
			'../static/dist/js/classes/Login.js',

			'../static/dist/js/classes/Enums/RolesEnum.js',

			'../static/dist/js/classes/Factories/Addresses.js',

			'../static/dist/js/classes/Factories/Roles.js',

			'../static/dist/js/classes/Factories/UserPhones.js',
			'../static/dist/js/classes/Factories/UserEmails.js',

			'../static/dist/js/classes/Entities/User.js',
			'../static/dist/js/classes/Factories/Users.js',

			'../static/dist/js/pizzygo/requires.js'
		],
		'notre-mission': [
			'static/dist/js/classes/Login.js',

			'static/dist/js/classes/Enums/RolesEnum.js',

			'static/dist/js/classes/Factories/Addresses.js',

			'static/dist/js/classes/Factories/Roles.js',

			'static/dist/js/classes/Factories/UserPhones.js',
			'static/dist/js/classes/Factories/UserEmails.js',

			'static/dist/js/classes/Entities/User.js',
			'static/dist/js/classes/Factories/Users.js',

			'static/dist/js/pizzygo/requires.js'
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