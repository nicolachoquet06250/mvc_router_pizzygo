<?php


namespace mvc_router\data\gesture\pizzygo\managers;


use mvc_router\data\gesture\Manager;

/**
 * Class User
 *
 * @method \mvc_router\data\gesture\pizzygo\entities\User get_all_from_id(int $id)
 * @method void  set_firstname_lastname_address_email(string $firstname, string $lastname, string $address, string $email)
 * @method void  del_where_id_and_pseudo_or()
 *
 * @package mvc_router\data\gesture\pizzygo\managers
 */
class User extends Manager {
	protected $entity_class = 'mvc_router\data\gesture\pizzygo\entities\User';
}