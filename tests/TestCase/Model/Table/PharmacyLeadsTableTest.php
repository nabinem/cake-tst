<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyLeadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyLeadsTable Test Case
 */
class PharmacyLeadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyLeadsTable
     */
    public $PharmacyLeads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_leads',
        'app.pharmacy_lead_statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyLeads') ? [] : ['className' => 'App\Model\Table\PharmacyLeadsTable'];
        $this->PharmacyLeads = TableRegistry::get('PharmacyLeads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyLeads);

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
