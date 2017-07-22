<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserProfilesTable Test Case
 */
class UserProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserProfilesTable
     */
    public $UserProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_profiles',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserProfiles') ? [] : ['className' => 'App\Model\Table\UserProfilesTable'];
        $this->UserProfiles = TableRegistry::get('UserProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserProfiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
