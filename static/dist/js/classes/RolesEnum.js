'use strict';

class RolesEnum {
	static get ROLE_USER() {
		return 'role_user';
	}

	static get ROLE_ADMIN() {
		return 'role_admin';
	}

	static get ROLE_CUSTOMER() {
		return 'role_customer'
	}

	static get ROLE_VENDOR() {
		return 'role_vendor';
	}

	static get ROLES() {
		return [
			this.ROLE_ADMIN,
			this.ROLE_CUSTOMER,
			this.ROLE_USER,
			this.ROLE_VENDOR
		];
	}
}