<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Variant extends Entity {
	/** @var int $id */
	protected $id;

	/** @var string $name */
	protected $name;

	/** @var int $category_id */
	protected $category_id;

	/** @var float $price */
	protected $price;
}