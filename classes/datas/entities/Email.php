<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Email extends Entity {
	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var string $email
	 * @sql_type varchar
	 */
	protected $email;

	/**
	 * @var int $user_id
	 */
	protected $user_id;
}