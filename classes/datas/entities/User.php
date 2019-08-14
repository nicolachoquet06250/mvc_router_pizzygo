<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class User extends Entity {
	/**
	 * @var int $id
	 */
	public $id;

	/**
	 * @var int $fb_id
	 */
	public $fb_id;

	/**
	 * @var string $address
	 */
	public $address;

	/**
	 * @var string $email
	 */
	public $email;

	/**
	 * @var string $phone
	 */
	public $phone;

	/**
	 * @var string $password
	 */
	public $password;

	/**
	 * @var string $description
	 */
	public $description;

	/**
	 * @var string $profil_img
	 */
	public $profil_img;

	/**
	 * @var bool $premium
	 */
	public $premium;

	/**
	 * @var bool $active
	 */
	public $active;

	/**
	 * @var string $activate_token
	 */
	public $activate_token;

	/**
	 * @var string $website
	 */
	public $website;

	/**
	 * @var string $pseudo
	 */
	public $pseudo;

	/**
	 * @var string $first_name
	 */
	public $first_name;

	/**
	 * @var string $last_name
	 */
	public $last_name;

	/**
	 * @var string $fb_access_token
	 */
	public $fb_access_token;

	/**
	 * @var string $local_access_token
	 */
	public $local_access_token;
}