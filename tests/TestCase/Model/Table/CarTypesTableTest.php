<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarTypesTable Test Case
 */
class CarTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarTypesTable
     */
    public $CarTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CarTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CarTypes') ? [] : ['className' => CarTypesTable::class];
        $this->CarTypes = TableRegistry::getTableLocator()->get('CarTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CarTypes);

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
