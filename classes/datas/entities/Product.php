<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Product extends Entity {
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
	 * @var int $category_id
	 */
	protected $category_id;

	/**
	 * @var string $comment
	 * @sql_type text
	 */
	protected $comment;

	/**
	 * @var string $image
	 * @sql_type varchar
	 */
	protected $image;

	/**
	 * @var string $image_alt
	 * @sql_type varchar
	 */
	protected $image_alt;

	/**
	 * @var bool $background_dark
	 * @sql_type tinyint
	 */
	protected $background_dark;
}