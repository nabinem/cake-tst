<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorLicensedStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorLicensedStatesTable Test Case
 */
class DoctorLicensedStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorLicensedStatesTable
     */
    public $DoctorLicensedStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doctor_licensed_states',
        'app.doctors',
        'app.users',
        'app.user_profiles',
        'app.user_settings',
        'app.leads',
        'app.telemedicine',
        'app.pharmacy',
        'app.health_questions',
        'app.insurances',
        'app.lead_statuses',
        'app.lead_latest_status',
        'app.lead_voicelogs',
        'app.lead_doctors',
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
        $config = TableRegistry::exists('DoctorLicensedStates') ? [] : ['className' => 'App\Model\Table\DoctorLicensedStatesTable'];
        $this->DoctorLicensedStates = TableRegistry::get('DoctorLicensedStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoctorLicensedStates);

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
