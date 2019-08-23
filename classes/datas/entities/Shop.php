<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Shop extends Entity {
	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var int $user_id
	 */
	protected $user_id;

	/**
	 * @var string $name
	 * @sql_type varchar
	 */
	protected $name;

	/**
	 * @var string $description
	 * @sql_type text
	 */
	protected $description;
}