'use strict';

class Product {
	constructor(id = 0, name = '', price = 0, description = '', category = null, variants = []) {
		this.percent_get = 50;
		this.id = id;
		this.name = name;
		this.price = price;
		this.gain = this.price === 0 ? this.price : this.get_gains();
		this.describe = description;
		this.img = '';
		this.img_alt = '';
		this.background_dark = false;
		this.category = category;
		this.variants = [];
		for(let i in variants) {
			this.add_variant(variants[i].id, variants[i].name, variants[i].price);
		}
	}

	get_gains(price = null) {
		price = (price === null ? this.price : price);
		return price - ( price * this.percent_get / 100 );
	}

	add_variant(id, name, price) {
		let product = new Product(id, name, price);
		this.variants.push(product);
	}
}