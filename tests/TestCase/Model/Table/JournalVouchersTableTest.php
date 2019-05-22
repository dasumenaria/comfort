<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JournalVouchersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JournalVouchersTable Test Case
 */
class JournalVouchersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JournalVouchersTable
     */
    public $JournalVouchers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.JournalVouchers',
        'app.FinancialYears',
        'app.Companies',
        'app.AccountingEntries',
        'app.JournalVoucherRows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('JournalVouchers') ? [] : ['className' => JournalVouchersTable::class];
        $this->JournalVouchers = TableRegistry::getTableLocator()->get('JournalVouchers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JournalVouchers);

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
