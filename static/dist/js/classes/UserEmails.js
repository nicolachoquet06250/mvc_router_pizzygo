'use strict';

class UserEmails {
	static get emails() {
		return utils.static.user_emails;
	}

	static set emails(email) {
		if(email === 'init') {
			if(utils.static.user_emails.length === 0) {
				UserEmails.getAll();
			}
		}
		else {
			utils.static.user_emails.push(email);
		}
	}

	static getAll() {
		let url = '';
		if(window.location.href.indexOf('pizzygo.') === -1) {
			url = '/pizzygo';
		}
		url += '/datas/emails.json';
		$.ajax({
			url: url,
			type: 'GET',
			contentType: 'application/json',
			async: false
		}).done(data => {
			utils.static.user_emails = data;
		});
	}

	static getEmailsForUser(user_id) {
		UserEmails.emails = 'init';

		let emails = UserEmails.emails;
		let emailsForThisUser = [];
		for(let i in emails) {
			let email = emails[i];
			if(email.user_id === user_id) {
				emailsForThisUser.push(email);
			}
		}
		return emailsForThisUser;
	}
}