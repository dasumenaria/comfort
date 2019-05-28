<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DebitNoteRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DebitNoteRowsTable Test Case
 */
class DebitNoteRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DebitNoteRowsTable
     */
    public $DebitNoteRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DebitNoteRows',
        'app.DebitNotes',
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
        $config = TableRegistry::getTableLocator()->exists('DebitNoteRows') ? [] : ['className' => DebitNoteRowsTable::class];
        $this->DebitNoteRows = TableRegistry::getTableLocator()->get('DebitNoteRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DebitNoteRows);

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
