'use strict';

class OrderDetails {
	static getDetailsForOrderWithId(order_id) {
		let details = [];
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/order_products.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(datas => {
			for(let i in datas) {
				let detail = datas[i];
				if(detail.order_id === order_id) {
					let _detail = Products.getById(detail.id);
					_detail.variant_selected = detail.variant_id;
					details.push(_detail);
				}
			}
		});

		return details;
	}
}