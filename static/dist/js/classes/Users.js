'use strict';

class Users {

	static get users() {
		return utils.static.users;
	}

	static set users(user) {
		if(user === 'init') {
			if(utils.static.users.length === 0) {
				this.getAll();
			}
		}
		else {
			utils.static.users.push(user);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/users.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(data => {
			let users = [];
			for(let i in data) {
				let user = data[i];
				let phones = [user.phone];
				let user_phones = UserPhones.getPhonesForUser(user.id);
				for(let j in user_phones) {
					phones.push(user_phones[j].phone);
				}
				let emails = [user.email];
				let user_emails = UserEmails.getEmailsForUser(user.id);
				for(let j in user_emails) {
					emails.push(user_emails[j].email);
				}
				let _user = new User(
					user.id, user.name,
					user.surname, emails,
					user.password, phones,
					user.describe, user.profil_img,
					user.active, user.premium,
					Roles.getRolesForUser(user.id)
				);
				_user.activate_token = user.activate_token;
				users.push(_user);
			}
			utils.static.users = users;
		});
	}

	static getByEmailAndPassword(email, password) {
		Users.users = 'init';
		let users = Users.users;
		for(let i in users) {
			let user = users[i];
			if(user.emails[0] === email && user.password === password) {
				return user;
			}
		}
		return null;
	}

	static getByRole(role) {
		Users.users = 'init';
		let users = Users.users;
		let usersForThisRole = [];
		for(let i in users) {
			let user = users[i];
			for(let j in user.roles) {
				if(user.roles[j].role === role) {
					usersForThisRole.push(user);
					break;
				}
			}
		}
		return usersForThisRole;
	}

	static getById(id) {
		this.users = 'init';
		let users = this.users;
		for(let i in users) {
			if(users[i].id === id) {
				return users[i];
			}
		}
		return null;
	}

	static getPremiumVendors() {
		this.users = 'init';
		let users = this.users;
		let _users = [];

		for(let i in users) {
			if(users[i].isPremium() && users[i].isVendor()) {
				_users.push(users[i]);
			}
		}
		return users;
	}

	static getCustomers() {
		return Users.getByRole(RolesEnum.ROLE_CUSTOMER);
	}

	static getVendors() {
		return Users.getByRole(RolesEnum.ROLE_VENDOR);
	}
}