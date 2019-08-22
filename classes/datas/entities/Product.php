<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Product extends Entity {
	/** @var int $id */
	protected $id;

	/** @var string $name */
	protected $name;

	/** @var int $category_id */
	protected $category_id;

	/** @var string $comment */
	protected $comment;

	/** @var string $image */
	protected $image;

	/** @var string $image_alt */
	protected $image_alt;

	/** @var bool $background_dark */
	protected $background_dark;
}