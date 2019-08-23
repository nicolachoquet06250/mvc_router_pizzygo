<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Address extends Entity {
	/**
	 * @var int $id
	 * @sql_type int
	 * @sql_type_size 11
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;
	/**
	 * @var string $address
	 * @sql_type varchar
	 */
	protected $address;
	/**
	 * @var int $user_id
	 */
	protected $user_id;
	/**
	 * @var int $type_id
	 */
	protected $type_id;
}