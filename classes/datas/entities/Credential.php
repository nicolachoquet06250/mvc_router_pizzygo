<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Credential extends Entity {
	/** @var int $id */
	protected $id;

	/** @var string $type */
	protected $type;

	/** @var string $login */
	protected $login;

	/** @var string $password */
	protected $password;
}