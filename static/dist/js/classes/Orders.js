'use strict';

class Orders {

	static get orders() {
		return utils.static.orders;
	}

	static set orders(order) {
		if(order === 'init') {
			if(utils.static.orders.length === 0) {
				Orders.getAll();
			}
		}
		else {
			utils.static.orders.push(order);
		}
	}

	static getById(id) {
		this.orders = 'init';
		let tmp = [];
		let orders = this.orders;
		for (let i in orders) {
			let order = orders[i];
			if(order.id === id) {
				tmp.push(order);
			}
		}
		return tmp;
	}

	static getByCustomer(customer) {
		this.orders = 'init';
		let tmp = [];
		let orders = this.orders;
		for (let i in orders) {
			let order = orders[i];
			if(order.customer === customer) {
				tmp.push(order);
			}
		}
		return tmp;
	}

	static getByAmount(amount) {
		this.orders = 'init';
		let tmp = [];
		let orders = this.orders;
		for (let i in orders) {
			let order = orders[i];
			if(order.amount === amount) {
				tmp.push(order);
			}
		}
		return tmp;
	}

	static getByDate(date) {
		this.orders = 'init';
		let tmp = [];
		let orders = this.orders;
		for (let i in orders) {
			let order = orders[i];
			if(order.date === date) {
				tmp.push(order);
			}
		}
		return tmp;
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/orders.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(data => {
			let orders = [];
			for(let i in data) {
				let order = data[i];
				let customer = Users.getById(order.customer);
				let _order = new Order(
					order.id,
					customer,
					Addresses.getById(order.address),
					OrderStatus.getById(order.status),
					OrderDetails.getDetailsForOrderWithId(order.id),
					order.date,
					order.comment
				);
				orders.push(_order);
			}
			utils.static.orders = orders;
		});
	}
}