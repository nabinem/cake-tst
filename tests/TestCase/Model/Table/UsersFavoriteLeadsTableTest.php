<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersFavoriteLeadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersFavoriteLeadsTable Test Case
 */
class UsersFavoriteLeadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersFavoriteLeadsTable
     */
    public $UsersFavoriteLeads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_favorite_leads',
        'app.users',
        'app.user_profiles',
        'app.user_settings',
        'app.leads',
        'app.health_questions',
        'app.insurances',
        'app.products',
        'app.leads_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersFavoriteLeads') ? [] : ['className' => 'App\Model\Table\UsersFavoriteLeadsTable'];
        $this->UsersFavoriteLeads = TableRegistry::get('UsersFavoriteLeads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersFavoriteLeads);

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
