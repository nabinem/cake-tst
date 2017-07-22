<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PatientsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PatientsController Test Case
 */
class PatientsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
