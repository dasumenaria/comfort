<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CreditNoteRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CreditNoteRowsTable Test Case
 */
class CreditNoteRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CreditNoteRowsTable
     */
    public $CreditNoteRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CreditNoteRows',
        'app.CreditNotes',
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
        $config = TableRegistry::getTableLocator()->exists('CreditNoteRows') ? [] : ['className' => CreditNoteRowsTable::class];
        $this->CreditNoteRows = TableRegistry::getTableLocator()->get('CreditNoteRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CreditNoteRows);

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
