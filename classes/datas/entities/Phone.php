<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Phone extends Entity {
	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var string $phone
	 * @sql_type varchar
	 */
	protected $phone;

	/**
	 * @var int $user_id
	 */
	protected $user_id;
}