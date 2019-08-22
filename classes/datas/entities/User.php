<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class User extends Entity {
	/**
	 * @var int $id
	 */
	protected $id;

	/**
	 * @var int $fb_id
	 */
	protected $fb_id;

	/**
	 * @var string $address
	 */
	protected $address;

	/**
	 * @var string $email
	 */
	protected $email;

	/**
	 * @var string $phone
	 */
	protected $phone;

	/**
	 * @var string $password
	 */
	protected $password;

	/**
	 * @var string $description
	 */
	protected $description;

	/**
	 * @var string $profil_img
	 */
	protected $profil_img;

	/**
	 * @var bool $premium
	 */
	protected $premium;

	/**
	 * @var bool $active
	 */
	protected $active;

	/**
	 * @var string $activate_token
	 */
	protected $activate_token;

	/**
	 * @var string $website
	 */
	protected $website;

	/**
	 * @var string $pseudo
	 */
	protected $pseudo;

	/**
	 * @var string $first_name
	 */
	protected $first_name;

	/**
	 * @var string $last_name
	 */
	protected $last_name;

	/**
	 * @var string $fb_access_token
	 */
	protected $fb_access_token;

	/**
	 * @var string $local_access_token
	 */
	protected $local_access_token;
}