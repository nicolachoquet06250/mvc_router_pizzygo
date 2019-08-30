'use strict';

class Login {
	static login(email, password, callback, fail = null) {
		fetch(`oauth/login`, {
			method: 'post',
			body: JSON.stringify({
				email: email,
				password: password
			})
		})
			.then(r => r.json())
			.then(json => callback(json.status, (json.status ? json.user : json.message)))
			.catch(reason => {
				if(fail !== null) fail(reason);
			});
	}

	static disconnect(callback, fail = null) {
		let request = $.ajax({
			url: `${CONSTANT.urls.ws}/login/disconnect`,
			method: 'GET'
		}).done(data => callback(data.disconnected));
		if(fail !== null) {
			request.fail(fail);
		}
	}

	static get_connected_user(callback, fail = null) {
		let request = $.ajax({
			url: `${CONSTANT.urls.ws}/login/logged_user`,
			method: 'GET'
		}).done(data => callback(data.status, (data.status ? data.user : data.message)));
		if(fail !== null) {
			request.fail(fail);
		}
	}

	static logged(callback, fail = null) {
		let request = $.ajax({
			url: `${CONSTANT.urls.ws}/login/logged`,
			method: 'GET'
		}).done(data => callback(data.logged));
		if(fail !== null) {
			request.fail(fail);
		}
	}
}