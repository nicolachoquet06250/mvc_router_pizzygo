'use strict';

class Roles {
	static get roles() {
		return utils.static.roles;
	}

	static set roles(role) {
		if(role === 'init') {
			if(utils.static.roles.length === 0) {
				Roles.getAll();
			}
		}
		else {
			utils.static.roles.push(role);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/roles.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(data => {
			utils.static.roles = data;
		});
	}

	static getRolesForUser(user_id) {
		Roles.roles = 'init';
		let rolesForThisUser = [];

		for(let i in Roles.roles) {
			let role = Roles.roles[i];
			if(role.user_id === user_id) {
				rolesForThisUser.push(role);
			}
		}
		return rolesForThisUser;
	}
}