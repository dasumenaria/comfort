<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AccountingEntriesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\AccountingEntriesController Test Case
 */
class AccountingEntriesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
