<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CreditNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CreditNotesTable Test Case
 */
class CreditNotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CreditNotesTable
     */
    public $CreditNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CreditNotes',
        'app.FinancialYears',
        'app.Companies',
        'app.CreditNoteRows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CreditNotes') ? [] : ['className' => CreditNotesTable::class];
        $this->CreditNotes = TableRegistry::getTableLocator()->get('CreditNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CreditNotes);

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
