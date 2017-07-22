<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserSettingsTable Test Case
 */
class UserSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserSettingsTable
     */
    public $UserSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_settings',
        'app.users',
        'app.user_profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserSettings') ? [] : ['className' => 'App\Model\Table\UserSettingsTable'];
        $this->UserSettings = TableRegistry::get('UserSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserSettings);

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
