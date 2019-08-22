<?php


namespace mvc_router\services;


class Password extends Service {
	public function b_crypt($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function double_b_crypt($password) {
		return password_hash(
			password_hash(
				$password,
				PASSWORD_BCRYPT
			),
			PASSWORD_BCRYPT
		);
	}

	public function argon2i($password) {
		return password_hash($password, PASSWORD_ARGON2I);
	}

	public function argon2id($password) {
		return password_hash($password, PASSWORD_ARGON2ID);
	}

	public function crypt($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public function is_valid($p, $h) {
		return password_verify($p, $h);
	}
}