<?php

namespace mvc_router\commands\core;

use Exception;
use mvc_router\data\gesture\Manager;
use mvc_router\data\gesture\pizzygo\managers\Address;
use mvc_router\data\gesture\pizzygo\managers\AddressType;
use mvc_router\data\gesture\pizzygo\managers\Comment;
use mvc_router\data\gesture\pizzygo\managers\Credential;
use mvc_router\data\gesture\pizzygo\managers\Email;
use mvc_router\data\gesture\pizzygo\managers\EndStatus;
use mvc_router\data\gesture\pizzygo\managers\Like;
use mvc_router\data\gesture\pizzygo\managers\Order;
use mvc_router\data\gesture\pizzygo\managers\OrderStatus;
use mvc_router\data\gesture\pizzygo\managers\Phone;
use mvc_router\data\gesture\pizzygo\managers\Product;
use mvc_router\data\gesture\pizzygo\managers\ProductCategory;
use mvc_router\data\gesture\pizzygo\managers\Role;
use mvc_router\data\gesture\pizzygo\managers\Shop;
use mvc_router\data\gesture\pizzygo\managers\User;
use mvc_router\data\gesture\pizzygo\managers\Variant;
use mvc_router\services\Password;
use ReflectionException;

class TestCommand extends \mvc_router\commands\TestCommand {
	/**
	 * @param User        $userManager
	 * @param Password    $passwordService
	 * @return bool|\mvc_router\data\gesture\pizzygo\entities\User|\mvc_router\data\gesture\pizzygo\entities\User[]
	 * @throws Exception
	 */
	public function managers(User $userManager, Password $passwordService) {
		$password = $passwordService->b_crypt('2669NICOLAS2107');
		$user = $userManager->get_all_from_email('nicolachoquet06251@gmail.com');
		if(!$user) {
			$user = $userManager
				->set_address_email_phone_password_description_website_pseudo_firstname_lastname(
					"1102 ch de l'espagnol", 'nicolachoquet06251@gmail.com', '0763207630',
					$password, 'une description',
					'nicolaschoquet.fr', 'nicolachoquet06250',
					'Nicolas', 'Choquet');
		}
		if(!$user->get('active')) $user->set('active', true);
		if(!$user->get('fb_id')) $user->set('fb_id', 20225555);
		$user->save();

		$user = $userManager->get_all_from_pseudo('nicolachoquet06250');
		return $user && $passwordService->is_valid('2669NICOLAS2107', $user->get('password')) ? $user : false;
	}

	/**
	 * @param Address         $addressManager
	 * @param AddressType     $addressTypeManager
	 * @param Comment         $commentManager
	 * @param Credential      $credentialManager
	 * @param Email           $emailManager
	 * @param EndStatus       $endStatusManager
	 * @param Like            $likeManager
	 * @param Order           $orderManager
	 * @param OrderStatus     $orderStatusManager
	 * @param Phone           $phoneManager
	 * @param Product         $productManager
	 * @param ProductCategory $productCategoryManager
	 * @param Role            $roleManager
	 * @param Shop            $shopManager
	 * @param User            $userManager
	 * @param Variant         $variantManager
	 * @return bool[]
	 * @throws ReflectionException
	 * @throws Exception
	 */
	public function managers_create_table(Address $addressManager, AddressType $addressTypeManager,
										  Comment $commentManager, Credential $credentialManager,
										  Email $emailManager, EndStatus $endStatusManager,
										  Like $likeManager, Order $orderManager,
										  OrderStatus $orderStatusManager, Phone $phoneManager,
										  Product $productManager, ProductCategory $productCategoryManager,
										  Role $roleManager, Shop $shopManager, User $userManager,
										  Variant $variantManager) {
		$args = func_get_args();
		$result = [];
		/** @var Manager $manager */
		foreach ($args as $manager) {
			$result[$manager->get_table()] = $manager->create_table() ? 'success' : 'failed';
		}
		return $result;
	}
}