<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceCitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceCitiesTable Test Case
 */
class ServiceCitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceCitiesTable
     */
    public $ServiceCities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ServiceCities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ServiceCities') ? [] : ['className' => ServiceCitiesTable::class];
        $this->ServiceCities = TableRegistry::getTableLocator()->get('ServiceCities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ServiceCities);

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
