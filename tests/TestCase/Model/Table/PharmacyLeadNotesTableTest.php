<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyLeadNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyLeadNotesTable Test Case
 */
class PharmacyLeadNotesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyLeadNotesTable
     */
    public $PharmacyLeadNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_lead_notes',
        'app.pharmacy_leads',
        'app.pharmacy_lead_statuses',
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
        'app.doctor_licensed_states',
        'app.pharmacy_lead_products',
        'app.pharmacy_products',
        'app.pharmacy_lead_voicelogs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyLeadNotes') ? [] : ['className' => 'App\Model\Table\PharmacyLeadNotesTable'];
        $this->PharmacyLeadNotes = TableRegistry::get('PharmacyLeadNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyLeadNotes);

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
