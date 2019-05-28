<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReferenceDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReferenceDetailsTable Test Case
 */
class ReferenceDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReferenceDetailsTable
     */
    public $ReferenceDetails;

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
        'app.JournalVoucherRows',
        'app.Invoices',
        'app.CreditNoteRows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ReferenceDetails') ? [] : ['className' => ReferenceDetailsTable::class];
        $this->ReferenceDetails = TableRegistry::getTableLocator()->get('ReferenceDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReferenceDetails);

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
