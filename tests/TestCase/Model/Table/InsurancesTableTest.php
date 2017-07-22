<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsurancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsurancesTable Test Case
 */
class InsurancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InsurancesTable
     */
    public $Insurances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.insurances',
        'app.leads',
        'app.users',
        'app.user_profiles',
        'app.health_questions',
        'app.products',
        'app.leads_products',
        'app.members'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Insurances') ? [] : ['className' => 'App\Model\Table\InsurancesTable'];
        $this->Insurances = TableRegistry::get('Insurances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Insurances);

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
