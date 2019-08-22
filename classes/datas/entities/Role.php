<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Role extends Entity {
	/** @var int $id */
	protected $id;

	/** @var string $role */
	protected $role;

	/** @var $user_id */
	protected $user_id;
}