<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierTypesTable Test Case
 */
class SupplierTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierTypesTable
     */
    public $SupplierTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('SupplierTypes') ? [] : ['className' => SupplierTypesTable::class];
        $this->SupplierTypes = TableRegistry::getTableLocator()->get('SupplierTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierTypes);

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
