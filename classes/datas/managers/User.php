<?php


namespace mvc_router\data\gesture\pizzygo\managers;


use mvc_router\data\gesture\Manager;

/**
 * Class User
 *
 * @method \mvc_router\data\gesture\pizzygo\entities\User|null get_all_from_id(int $id)
 * @method \mvc_router\data\gesture\pizzygo\entities\User[]|\mvc_router\data\gesture\pizzygo\entities\User get_all_from_id_lastname(int $id, string $lastname)
 * @method bool  set_firstname_lastname_address_email(string $firstname, string $lastname, string $address, string $email)
 * @method bool  del_where_id()
 * @method bool	 update_id_firstname_lastname_address(int $id, string $first_name, string $last_name, string $address)
 *
 * @package mvc_router\data\gesture\pizzygo\managers
 */
class User extends Manager {
	protected $entity_class = 'mvc_router\data\gesture\pizzygo\entities\User';
}