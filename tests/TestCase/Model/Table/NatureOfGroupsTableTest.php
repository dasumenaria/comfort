<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NatureOfGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NatureOfGroupsTable Test Case
 */
class NatureOfGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NatureOfGroupsTable
     */
    public $NatureOfGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NatureOfGroups',
        'app.AccountingGroups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NatureOfGroups') ? [] : ['className' => NatureOfGroupsTable::class];
        $this->NatureOfGroups = TableRegistry::getTableLocator()->get('NatureOfGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NatureOfGroups);

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
}
