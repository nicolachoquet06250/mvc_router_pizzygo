<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Shop extends Entity {
	/** @var int $id */
	protected $id;

	/** @var int $user_id */
	protected $user_id;

	/** @var string $name */
	protected $name;

	/** @var string $description */
	protected $description;
}