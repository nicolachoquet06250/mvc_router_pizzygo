'use strict';

class User {
	constructor(id, name, surname, emails, password, phones, describe, profil_image, active, premium, roles) {
		this.id = id;
		this.name = name;
		this.surname = surname;
		this.emails = emails;
		this.password = password;
		this.phones = phones;
		this.describe = describe;
		this.profil_image = profil_image !== null && profil_image !== '' ? profil_image : 'http://materializecss.com/images/yuna.jpg';
		this.active = active;
		this.premium = premium;
		this.roles = roles
	}

	isPremium() {
		return this.premium;
	}

	isUser() {
		for(let i in this.roles) {
			if(this.roles[i].name === RolesEnum.ROLE_USER) {
				return true;
			}
		}
	}

	isVendor() {
		for(let i in this.roles) {
			if(this.roles[i].name === RolesEnum.ROLE_VENDOR) {
				return true;
			}
		}
	}

	isCustomer() {
		for(let i in this.roles) {
			if(this.roles[i].name === RolesEnum.ROLE_CUSTOMER) {
				return true;
			}
		}
	}

	isAdmin() {
		for(let i in this.roles) {
			if(this.roles[i].name === RolesEnum.ROLE_ADMIN) {
				return true;
			}
		}
	}
}