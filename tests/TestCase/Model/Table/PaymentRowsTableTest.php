<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentRowsTable Test Case
 */
class PaymentRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentRowsTable
     */
    public $PaymentRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PaymentRows',
        'app.Payments',
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
        $config = TableRegistry::getTableLocator()->exists('PaymentRows') ? [] : ['className' => PaymentRowsTable::class];
        $this->PaymentRows = TableRegistry::getTableLocator()->get('PaymentRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PaymentRows);

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
