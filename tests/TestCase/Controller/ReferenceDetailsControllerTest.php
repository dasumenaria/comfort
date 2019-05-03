<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReferenceDetailsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ReferenceDetailsController Test Case
 */
class ReferenceDetailsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ReferenceDetails',
        'app.Customers',
        'app.Suppliers',
        'app.Companies',
        'app.Ledgers',
        'app.Receipts',
        'app.ReceiptRows',
        'app.PaymentRows',
        'app.CreditNotes',
        'app.CreditNoteRows',
        'app.DebitNotes',
        'app.DebitNoteRows',
        'app.SalesVoucherRows',
        'app.PurchaseVoucherRows',
        'app.JournalVoucherRows',
        'app.SaleReturns',
        'app.PurchaseInvoices',
        'app.PurchaseReturns',
        'app.SalesInvoices'
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
