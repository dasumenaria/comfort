<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporateBillingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporateBillingsTable Test Case
 */
class CorporateBillingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporateBillingsTable
     */
    public $CorporateBillings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CorporateBillings',
        'app.Logins',
        'app.Counters',
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
        $config = TableRegistry::getTableLocator()->exists('CorporateBillings') ? [] : ['className' => CorporateBillingsTable::class];
        $this->CorporateBillings = TableRegistry::getTableLocator()->get('CorporateBillings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CorporateBillings);

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
