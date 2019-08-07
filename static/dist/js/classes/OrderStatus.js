'use strict';

class OrderStatus {
	static get order_status() {
		return utils.static.order_status;
	}
	static set order_status(order_status) {
		if(order_status === 'init') {
			if(utils.static.order_status) {
				this.getAll();
			}
		}
		else {
			utils.static.order_status.push(order_status);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/order_status.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(datas => {
			let orders_status = [];
			for(let i in datas) {
				let order_status = datas[i];
				orders_status.push(order_status);
			}
			utils.static.order_status = orders_status;
		});
	}

	static getById(id) {
		this.order_status = 'init';
		let status = this.order_status;

		for(let i in status) {
			if(status[i].id === id) {
				return status[i];
			}
		}
	}
}