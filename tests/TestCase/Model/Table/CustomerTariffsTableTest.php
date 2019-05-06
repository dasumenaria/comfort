<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerTariffsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerTariffsTable Test Case
 */
class CustomerTariffsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerTariffsTable
     */
    public $CustomerTariffs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CustomerTariffs',
        'app.Customers',
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
        $config = TableRegistry::getTableLocator()->exists('CustomerTariffs') ? [] : ['className' => CustomerTariffsTable::class];
        $this->CustomerTariffs = TableRegistry::getTableLocator()->get('CustomerTariffs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerTariffs);

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
