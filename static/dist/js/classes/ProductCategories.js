'use strict';

class ProductCategories {

	static get products_cat() {
		return utils.static.categories;
	}

	static set products_cat(category) {
		if(category === 'init') {
			if(utils.static.categories.length === 0) {
				this.getAll();
			}
		}
		else {
			utils.static.categories.push(category);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/products_categories.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(datas => {
			let my_session_id = utils.static.me.id;
			let cats = [];
			for(let i in datas) {
				let cat = datas[i];
				if(cat.vendor_id === my_session_id) {
					let _cat = new ProductCategory(cat.id, cat.name);
					_cat.vendor_id = cat.vendor_id;
					cats.push(_cat);
				}
			}
			utils.static.categories = cats;
		});
	}

	static getByName(name) {
		this.products_cat = 'init';
		let categories = this.products_cat;

		for(let i in categories) {
			if(categories[i].name === name) {
				return categories[i];
			}
		}
		return null;
	}

	static getById(id) {
		this.products_cat = 'init';
		let categories = this.products_cat;

		for(let i in categories) {
			if(categories[i].id === id) {
				return categories[i];
			}
		}
		return null;
	}
}