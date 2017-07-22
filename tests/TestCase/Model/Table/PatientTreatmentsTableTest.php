<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientTreatmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientTreatmentsTable Test Case
 */
class PatientTreatmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientTreatmentsTable
     */
    public $PatientTreatments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_treatments',
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
        'app.lead_doctors',
        'app.products',
        'app.leads_products',
        'app.users_favorite_leads',
        'app.doctors',
        'app.doctor_licensed_states',
        'app.patient_assessments',
        'app.patient_doctor_notes',
        'app.patient_prescriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientTreatments') ? [] : ['className' => 'App\Model\Table\PatientTreatmentsTable'];
        $this->PatientTreatments = TableRegistry::get('PatientTreatments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientTreatments);

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
