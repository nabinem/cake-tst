<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientAllergiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientAllergiesTable Test Case
 */
class PatientAllergiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientAllergiesTable
     */
    public $PatientAllergies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_allergies',
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
        $config = TableRegistry::exists('PatientAllergies') ? [] : ['className' => 'App\Model\Table\PatientAllergiesTable'];
        $this->PatientAllergies = TableRegistry::get('PatientAllergies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientAllergies);

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
