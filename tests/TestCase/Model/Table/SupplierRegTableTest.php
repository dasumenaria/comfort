<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierRegTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierRegTable Test Case
 */
class SupplierRegTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierRegTable
     */
    public $SupplierReg;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SupplierReg',
        'app.SupplierTypes',
        'app.SupplierTypeSubs',
        'app.Emails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SupplierReg') ? [] : ['className' => SupplierRegTable::class];
        $this->SupplierReg = TableRegistry::getTableLocator()->get('SupplierReg', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierReg);

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
