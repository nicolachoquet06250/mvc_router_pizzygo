'use strict';

class Products {

	static get products() {
		return utils.static.products;
	}

	static set products(product) {
		if(product === 'init') {
			if(utils.static.products.length === 0) {
				this.getAll();
			}
		}
		else {
			return utils.static.products;
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/products.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(datas => {
			let products = [];
			for(let i in datas) {
				let product = datas[i];
				CategoriesVariants.getByCategory(product.cat_id);
				if(ProductCategories.getById(product.cat_id).vendor_id === utils.static.me.id) {
					let _product = new Product(
						product.id,
						product.name,
						product.price,
						product.comment,
						ProductCategories.getById(product.cat_id),
						CategoriesVariants.getByCategory(product.cat_id)
					);
					_product.img = product.image;
					_product.img_alt = product.img_alt;
					_product.background_dark = product.background_dark;
					products.push(_product);
				}
			}
			utils.static.products = products;
		});
	}

	static getLengthWhereCategoryIs(name) {
		this.products = 'init';
		let products = this.products;
		let category = ProductCategories.getByName(name);

		let length = 0;
		for(let i in products) {
			if(products[i].category.id === category.id) {
				length++;
			}
		}
		return length;
	}

	static getById(id) {
		this.products = 'init';
		let products = this.products;

		for(let i in products) {
			if(products[i].id === id) {
				return products[i];
			}
		}
	}
}