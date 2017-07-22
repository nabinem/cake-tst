<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Network\Session;
use TinyAuth\Auth\AuthUserTrait;
use TinyAuth\Auth\AclTrait;

/**
 * AuthUser behavior
 */
class AuthUserBehavior extends Behavior
{
	use AuthUserTrait, AclTrait;

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'idColumn' => 'id', // ID Column in users table
	'roleColumn' => 'role_id', // Foreign key for the Role ID in users table or in pivot table
	'multiRole' => false,
        'rolesTable' => 'Roles'
    ];

    /**
	 * AuthUser behavior::_getUser()
	 *
	 * @return array
	 */
	protected function _getUser() {
		$session = new Session;
		return (array)$session->read('Auth.User');
	}

}
