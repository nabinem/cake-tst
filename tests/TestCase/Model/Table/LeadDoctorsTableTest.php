<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadDoctorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadDoctorsTable Test Case
 */
class LeadDoctorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadDoctorsTable
     */
    public $LeadDoctors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lead_doctors',
        'app.leads',
        'app.users',
        'app.user_profiles',
        'app.user_settings',
        'app.telemedicine',
        'app.pharmacy',
        'app.health_questions',
        'app.insurances',
        'app.lead_statuses',
        'app.lead_latest_status',
        'app.lead_voicelogs',
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
        $config = TableRegistry::exists('LeadDoctors') ? [] : ['className' => 'App\Model\Table\LeadDoctorsTable'];
        $this->LeadDoctors = TableRegistry::get('LeadDoctors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeadDoctors);

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
