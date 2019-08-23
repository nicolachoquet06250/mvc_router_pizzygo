<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Order extends Entity {
	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var int $shop_id
	 */
	protected $shop_id;

	/**
	 * @var string $comment
	 * @sql_type text
	 */
	protected $comment;

	/**
	 * @var int $user_id
	 */
	protected $user_id;

	/**
	 * @var int $address_id
	 */
	protected $address_id;

	/**
	 * @var int $status_id
	 */
	protected $status_id;

	/**
	 * @var int $end_status_id
	 */
	protected $end_status_id;
}