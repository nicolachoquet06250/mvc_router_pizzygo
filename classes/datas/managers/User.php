<?php


namespace mvc_router\data\gesture\pizzygo\managers;


use mvc_router\data\gesture\Manager;

/**
 * Class User
 *
 * @method \mvc_router\data\gesture\pizzygo\entities\User|null get_all_from_id(int $id)
 * @method \mvc_router\data\gesture\pizzygo\entities\User|\mvc_router\data\gesture\pizzygo\entities\User[] get_all_from_email(string $email)
 * @method \mvc_router\data\gesture\pizzygo\entities\User|\mvc_router\data\gesture\pizzygo\entities\User[] get_all_from_pseudo(string $pseudo)
 * @method \mvc_router\data\gesture\pizzygo\entities\User[]|\mvc_router\data\gesture\pizzygo\entities\User get_all_from_id_lastname(int $id, string $lastname)
 * @method \mvc_router\data\gesture\pizzygo\entities\User|bool set_address_email_phone_password_description_profilimg_premium_active_activatetoken_website_pseudo_firstname_lastname(string $address, string $email, string $phone, string $password, string $description, string $profile_img, bool $premium, bool $active, string $activate_token, string $website, string $pseudo, string $first_name, string $last_name)
 * @method \mvc_router\data\gesture\pizzygo\entities\User|bool set_address_email_phone_password_description_website_pseudo_firstname_lastname(string $address, string $email, string $phone, string $password, string $description, string $website, string $pseudo, string $first_name, string $last_name)
 * @method bool del_where_id(int $id)
 * @method \mvc_router\data\gesture\pizzygo\entities\User|bool update_id_firstname_lastname_address(int $id, string $first_name, string $last_name, string $address)
 *
 * @package mvc_router\data\gesture\pizzygo\managers
 */
class User extends Manager {}