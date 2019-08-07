'use strict';

class CategoriesVariants {
	static get variants() {
		return utils.static.category_variants;
	}

	static set variants(variant) {
		if(variant === 'init') {
			if(utils.static.category_variants.length === 0) {
				this.getAll();
			}
		}
		else {
			utils.static.category_variants.push(variant);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/cat_variants.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(datas => {
			utils.static.category_variants = datas;
		});
	}

	static getByCategory(cat_id) {
		this.variants = 'init';
		let variants = this.variants;
		let _variants = [];

		for(let i in variants) {
			if(variants[i].cat_id === cat_id) {
				_variants.push(variants[i]);
			}
		}

		return _variants;
	}

	static getById(id) {
		this.variants = 'init';
		let variants = this.variants;

		for(let i in variants) {
			if(variants[i].id === id) {
				return variants[i];
			}
		}

		return null;
	}
}