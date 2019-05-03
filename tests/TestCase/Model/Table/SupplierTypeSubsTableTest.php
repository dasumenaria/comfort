<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierTypeSubsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierTypeSubsTable Test Case
 */
class SupplierTypeSubsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierTypeSubsTable
     */
    public $SupplierTypeSubs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SupplierTypeSubs',
        'app.SupplierTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SupplierTypeSubs') ? [] : ['className' => SupplierTypeSubsTable::class];
        $this->SupplierTypeSubs = TableRegistry::getTableLocator()->get('SupplierTypeSubs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierTypeSubs);

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
