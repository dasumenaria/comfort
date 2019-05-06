<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierTariffsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierTariffsTable Test Case
 */
class SupplierTariffsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierTariffsTable
     */
    public $SupplierTariffs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SupplierTariffs',
        'app.Suppliers',
        'app.CarTypes',
        'app.Services'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SupplierTariffs') ? [] : ['className' => SupplierTariffsTable::class];
        $this->SupplierTariffs = TableRegistry::getTableLocator()->get('SupplierTariffs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierTariffs);

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
