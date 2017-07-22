<?php
namespace TinyAuth\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class DatabaseRolesUsersFixture extends TestFixture {

	/**
	* Fields
	*
	* @var array
	*/
	public $fields = [
		'id' => ['type' => 'integer'],
		'user_id' => ['type' => 'integer'],
		'database_role_id' => ['type' => 'integer'],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id']]
		]
	];

	/**
	* Records
	*
	* @var array
	*/
	public $records = [
		[
			'id' => 1,
			'user_id' => 1,
			'database_role_id' => 11	// user
		],
		[
			'id' => 2,
			'user_id' => 1,
			'database_role_id' => 12	// moderator
		],
		[
			'id' => 3,
			'user_id' => 2,
			'database_role_id' => 11 // user
		],
		[
			'id' => 4,
			'user_id' => 2,
			'database_role_id' => 13 // admin
		],
	];

}
