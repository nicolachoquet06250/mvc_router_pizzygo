'use strict';

class Addresses {
	static get addresses() {
		return utils.static.addresses;
	}

	static set addresses(address) {
		if(address === 'init') {
			if(utils.static.addresses.length === 0) {
				this.getAll();
			}
		}
		else {
			utils.static.addresses.push(address);
		}
	}

	static getAll() {
		let addresses = [];
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/addresses.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(datas => {
			for(let i in datas) {
				addresses.push(datas[i]);
			}
			utils.static.addresses = addresses;
		});
	}

	static getById(id) {
		this.addresses = 'init';
		let addresses = this.addresses;

		for(let i in addresses) {
			if(addresses[i].id === id) {
				return addresses[i];
			}
		}
	}

	static getByUserId(user_id) {
		this.addresses = 'init';
		let addresses = this.addresses;
		let _addresses = [];

		for(let i in addresses) {
			if(addresses[i].id === id) {
				_addresses.push(addresses[i]);
			}
		}
		return _addresses;
	}
}