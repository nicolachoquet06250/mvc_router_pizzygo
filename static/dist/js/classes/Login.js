'use strict';

class Login {
	static login(email, password, callback, fail = null) {
		fetch(`oauth/login`, {
			method: 'post',
			body: JSON.stringify({
				email: email,
				password: password
			})
		}).then(r => r.json())
			.then(json => callback(json.status, (json.status ? json.user : json.message)))
			.catch(reason => {
				if(fail !== null) fail(reason);
			});
	}

	static disconnect(callback, fail = null) {
		fetch(`/oauth/logout-api`, {
			method: 'get'
		}).then(r => r.json())
			.then(json => callback(json.disconnected))
			.catch(e => {
				if(fail !== null) fail(e);
			});
	}

	static get_connected_user(callback, fail = null) {
		fetch(`/oauth/user`, {
			method: 'get'
		}).then(r => r.json())
			.then(json => callback(json.error, (!json.error ? json.user : json.message)))
			.catch(e => {
				if(fail !== null) fail(e);
			});
	}

	static logged(callback, fail = null) {
		fetch(`/oauth/connected`, {
			method: 'get'
		}).then(r => r.json())
			.then(json => callback(json.logged))
			.catch(e => {
				if(fail !== null) fail(e);
			});
	}
}