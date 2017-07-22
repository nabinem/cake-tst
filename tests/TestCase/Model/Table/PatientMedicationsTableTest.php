<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientMedicationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientMedicationsTable Test Case
 */
class PatientMedicationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientMedicationsTable
     */
    public $PatientMedications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_medications',
        'app.patients',
        'app.leads',
        'app.users',
        'app.user_profiles',
        'app.doctors',
        'app.doctor_licensed_states',
        'app.user_settings',
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
        'app.users_favorite_leads',
        'app.patient_assessments',
        'app.patient_consult_notes',
        'app.patient_attachments',
        'app.patient_treatments',
        'app.patient_allergies',
        'app.patient_family_diseases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientMedications') ? [] : ['className' => 'App\Model\Table\PatientMedicationsTable'];
        $this->PatientMedications = TableRegistry::get('PatientMedications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientMedications);

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
