<?php


namespace mvc_router\queues;


class Email {
	public static function queueCallback($params) {
		var_dump($params);
	}
}