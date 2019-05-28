<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CreditNoteRows Model
 *
 * @property \App\Model\Table\CreditNotesTable|\Cake\ORM\Association\BelongsTo $CreditNotes
 * @property \App\Model\Table\LedgersTable|\Cake\ORM\Association\BelongsTo $Ledgers
 *
 * @method \App\Model\Entity\CreditNoteRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\CreditNoteRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CreditNoteRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CreditNoteRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditNoteRow saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditNoteRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CreditNoteRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CreditNoteRow findOrCreate($search, callable $callback = null, $options = [])
 */
class CreditNoteRowsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('credit_note_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CreditNotes', [
            'foreignKey' => 'credit_note_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ledgers', [
            'foreignKey' => 'ledger_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('cr_dr')
            ->maxLength('cr_dr', 10)
            ->requirePresence('cr_dr', 'create')
            ->allowEmptyString('cr_dr', false);

        $validator
            ->decimal('debit')
            ->allowEmptyString('debit');

        $validator
            ->decimal('credit')
            ->allowEmptyString('credit');

        $validator
            ->scalar('mode_of_payment')
            ->maxLength('mode_of_payment', 30)
            ->requirePresence('mode_of_payment', 'create')
            ->allowEmptyString('mode_of_payment', false);

        $validator
            ->scalar('cheque_no')
            ->maxLength('cheque_no', 30)
            ->requirePresence('cheque_no', 'create')
            ->allowEmptyString('cheque_no', false);

        $validator
            ->date('cheque_date')
            ->allowEmptyDate('cheque_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['credit_note_id'], 'CreditNotes'));
        $rules->add($rules->existsIn(['ledger_id'], 'Ledgers'));

        return $rules;
    }
}
