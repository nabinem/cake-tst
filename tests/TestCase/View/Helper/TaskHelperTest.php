<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\TaskHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\TaskHelper Test Case
 */
class TaskHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\TaskHelper
     */
    public $Task;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Task = new TaskHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Task);

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
