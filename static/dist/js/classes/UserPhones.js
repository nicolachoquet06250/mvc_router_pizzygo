'use strict';

class UserPhones {
	static get phones() {
		return utils.static.user_phones;
	}

	static set phones(phone) {
		if(phone === 'init') {
			if(utils.static.user_phones.length === 0) {
				UserPhones.getAll();
			}
		}
		else {
			utils.static.user_phones.push(phone);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/phones.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(data => {
			utils.static.user_phones = data;
		});
	}

	static getPhonesForUser(user_id) {
		UserPhones.phones = 'init';

		let phones = UserPhones.phones;
		let phonesForThisUser = [];
		for(let i in phones) {
			let phone = phones[i];
			if(phone.user_id === user_id) {
				phonesForThisUser.push(phone);
			}
		}
		return phonesForThisUser;
	}
}