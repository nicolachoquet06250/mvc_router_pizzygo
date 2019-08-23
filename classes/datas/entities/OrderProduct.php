<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class OrderProduct extends Entity {
	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var int $product_id
	 */
	protected $product_id;

	/**
	 * @var int $variant_id
	 */
	protected $variant_id;

	/**
	 * @var int $order_id
	 */
	protected $order_id;
}