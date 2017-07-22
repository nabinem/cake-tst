<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\VicidialComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\VicidialComponent Test Case
 */
class VicidialComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\VicidialComponent
     */
    public $Vicidial;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Vicidial = new VicidialComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vicidial);

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
