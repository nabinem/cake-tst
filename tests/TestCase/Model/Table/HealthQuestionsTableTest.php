<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HealthQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HealthQuestionsTable Test Case
 */
class HealthQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HealthQuestionsTable
     */
    public $HealthQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.health_questions',
        'app.leads',
        'app.users',
        'app.user_profiles',
        'app.insurances',
        'app.products',
        'app.leads_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HealthQuestions') ? [] : ['className' => 'App\Model\Table\HealthQuestionsTable'];
        $this->HealthQuestions = TableRegistry::get('HealthQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HealthQuestions);

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
