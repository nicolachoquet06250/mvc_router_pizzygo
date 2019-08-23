<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class ProductCategory extends Entity {
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
	 * @var int $shop_id
	 */
	protected $shop_id;
}