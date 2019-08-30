<?php


namespace mvc_router\data\gesture\pizzygo\entities;


use mvc_router\data\gesture\Entity;

class Role extends Entity {

	const USER = 'role_user';
	const ADMIN = 'role_admin';
	const VENDOR = 'role_vendor';

	/**
	 * @var int $id
	 * @primary_key
	 * @auto_increment
	 */
	protected $id;

	/**
	 * @var string $role
	 * @sql_type varchar
	 */
	protected $role;

	/**
	 * @var $user_id
	 */
	protected $user_id;
}