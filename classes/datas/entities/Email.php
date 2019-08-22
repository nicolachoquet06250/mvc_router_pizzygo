<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Email extends Entity {
	/** @var int $id */
	protected $id;

	/** @var string $email */
	protected $email;

	/** @var int $user_id */
	protected $user_id;
}