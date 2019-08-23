<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Variant extends Entity {
	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var string $name
	 * @sql_type varchar
	 */
	protected $name;

	/**
	 * @var int $category_id
	 */
	protected $category_id;

	/**
	 * @var float $price
	 * @sql_type char
	 */
	protected $price;
}