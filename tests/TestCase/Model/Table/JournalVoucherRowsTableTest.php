<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JournalVoucherRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JournalVoucherRowsTable Test Case
 */
class JournalVoucherRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JournalVoucherRowsTable
     */
    public $JournalVoucherRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.JournalVoucherRows',
        'app.JournalVouchers',
        'app.Ledgers',
        'app.AccountingEntries',
        'app.ReferenceDetails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('JournalVoucherRows') ? [] : ['className' => JournalVoucherRowsTable::class];
        $this->JournalVoucherRows = TableRegistry::getTableLocator()->get('JournalVoucherRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JournalVoucherRows);

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
