'use strict';

class Order {
	constructor(id = null, customer = null, address = null, status = null, details = [], date = null, comment = '') {
		this.months = [
			'Janvier',
			'Février',
			'Mars',
			'Avril',
			'Mai',
			'Juin',
			'Juillet',
			'Août',
			'Septembre',
			'Octobre',
			'Novembre',
			'Décembre'
		];
		this.days = [
			'Lundi',
			'Mardi',
			'Mercredi',
			'Jeudi',
			'Vendredi',
			'Samedi',
			'Dimanche'
		];
		this.id = id;
		this.customer = customer;
		this.address = address;
		this.status = status;
		this.detail = details;
		this.nb_objects = details.length;
		this.amount = 0;
		this.comment = '';
		for(let p in details) {
			let product = details[p];
			this.amount += product.price;
		}
		this.gains = 0;
		for(let p in details) {
			let product = details[p];
			this.gains += product.gain;
		}
		this.date = date;
		if(this.date === '' || this.date === null) {
			let date = new Date();
			this.date = `${this.days[date.getUTCDay()-1]} ${date.getUTCDate()} ${this.months[date.getUTCMonth()]} ${date.getUTCFullYear()}`;
		}
	}
}