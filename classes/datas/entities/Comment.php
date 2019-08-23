<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Comment extends Entity {
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
	 * @var int $shop_id
	 */
	protected $shop_id;

	/**
	 * @var string $comment
	 * @sql_type text
	 */
	protected $comment;
}