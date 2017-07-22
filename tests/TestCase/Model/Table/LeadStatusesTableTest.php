<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadStatusesTable Test Case
 */
class LeadStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadStatusesTable
     */
    public $LeadStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lead_statuses',
        'app.leads',
        'app.users',
        'app.user_profiles',
        'app.user_settings',
        'app.health_questions',
        'app.insurances',
        'app.products',
        'app.leads_products',
        'app.users_favorite_leads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LeadStatuses') ? [] : ['className' => 'App\Model\Table\LeadStatusesTable'];
        $this->LeadStatuses = TableRegistry::get('LeadStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeadStatuses);

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
