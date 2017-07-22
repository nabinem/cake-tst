<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadVoicelogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadVoicelogsTable Test Case
 */
class LeadVoicelogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadVoicelogsTable
     */
    public $LeadVoicelogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lead_voicelogs',
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
        $config = TableRegistry::exists('LeadVoicelogs') ? [] : ['className' => 'App\Model\Table\LeadVoicelogsTable'];
        $this->LeadVoicelogs = TableRegistry::get('LeadVoicelogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeadVoicelogs);

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
