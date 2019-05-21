<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReceiptRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReceiptRowsTable Test Case
 */
class ReceiptRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReceiptRowsTable
     */
    public $ReceiptRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ReceiptRows',
        'app.Receipts',
        'app.Companies',
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
        $config = TableRegistry::getTableLocator()->exists('ReceiptRows') ? [] : ['className' => ReceiptRowsTable::class];
        $this->ReceiptRows = TableRegistry::getTableLocator()->get('ReceiptRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReceiptRows);

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
