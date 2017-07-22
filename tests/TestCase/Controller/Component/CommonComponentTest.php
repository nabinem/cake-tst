<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CommonComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CommonComponent Test Case
 */
class CommonComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\CommonComponent
     */
    public $Common;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Common = new CommonComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Common);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
