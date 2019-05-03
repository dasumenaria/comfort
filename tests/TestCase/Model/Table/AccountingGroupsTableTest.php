<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountingGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountingGroupsTable Test Case
 */
class AccountingGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountingGroupsTable
     */
    public $AccountingGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AccountingGroups',
        'app.NatureOfGroups',
        'app.Companies',
        'app.Ledgers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AccountingGroups') ? [] : ['className' => AccountingGroupsTable::class];
        $this->AccountingGroups = TableRegistry::getTableLocator()->get('AccountingGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountingGroups);

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
