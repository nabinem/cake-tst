<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyLeadStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyLeadStatusesTable Test Case
 */
class PharmacyLeadStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyLeadStatusesTable
     */
    public $PharmacyLeadStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_lead_statuses',
        'app.pharmacy_leads',
        'app.users',
        'app.user_profiles',
        'app.doctors',
        'app.leads',
        'app.telemedicine',
        'app.user_settings',
        'app.pharmacy',
        'app.health_questions',
        'app.insurances',
        'app.lead_statuses',
        'app.lead_latest_status',
        'app.lead_voicelogs',
        'app.lead_doctors',
        'app.products',
        'app.leads_products',
        'app.users_favorite_leads',
        'app.patients',
        'app.patient_medications',
        'app.patient_allergies',
        'app.patient_family_diseases',
        'app.patient_assessments',
        'app.patient_consult_notes',
        'app.patient_attachments',
        'app.patient_treatments',
        'app.doctor_patient_consults',
        'app.doctor_licensed_states'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyLeadStatuses') ? [] : ['className' => 'App\Model\Table\PharmacyLeadStatusesTable'];
        $this->PharmacyLeadStatuses = TableRegistry::get('PharmacyLeadStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyLeadStatuses);

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
