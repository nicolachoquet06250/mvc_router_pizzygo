<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Address extends Entity {
	/**
	 * @var int $id
	 */
	protected $id;
	/**
	 * @var string $address
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