<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DutySlipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DutySlipsTable Test Case
 */
class DutySlipsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DutySlipsTable
     */
    public $DutySlips;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DutySlips',
        'app.Emails',
        'app.Photos',
        'app.Services',
        'app.CarTypes',
        'app.Cars',
        'app.Customers',
        'app.Employees',
        'app.Logins',
        'app.Counters',
        'app.MaxInvoices',
        'app.WaveoffLogins',
        'app.WaveoffCounters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DutySlips') ? [] : ['className' => DutySlipsTable::class];
        $this->DutySlips = TableRegistry::getTableLocator()->get('DutySlips', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DutySlips);

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
