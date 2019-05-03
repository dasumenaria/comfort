<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountingEntriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountingEntriesTable Test Case
 */
class AccountingEntriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountingEntriesTable
     */
    public $AccountingEntries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AccountingEntries',
        'app.Ledgers',
        'app.Companies',
        'app.PurchaseVouchers',
        'app.PurchaseVoucherRows',
        'app.SalesInvoices',
        'app.SaleReturns',
        'app.PurchaseInvoices',
        'app.PurchaseReturns',
        'app.Receipts',
        'app.ReceiptRows',
        'app.Payments',
        'app.PaymentRows',
        'app.CreditNotes',
        'app.CreditNoteRows',
        'app.DebitNotes',
        'app.DebitNoteRows',
        'app.SalesVouchers',
        'app.SalesVoucherRows',
        'app.JournalVouchers',
        'app.JournalVoucherRows',
        'app.ContraVouchers',
        'app.ContraVoucherRows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AccountingEntries') ? [] : ['className' => AccountingEntriesTable::class];
        $this->AccountingEntries = TableRegistry::getTableLocator()->get('AccountingEntries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountingEntries);

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
