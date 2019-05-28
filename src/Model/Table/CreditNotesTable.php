<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CreditNotes Model
 *
 * @property \App\Model\Table\FinancialYearsTable|\Cake\ORM\Association\BelongsTo $FinancialYears
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\CreditNoteRowsTable|\Cake\ORM\Association\HasMany $CreditNoteRows
 *
 * @method \App\Model\Entity\CreditNote get($primaryKey, $options = [])
 * @method \App\Model\Entity\CreditNote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CreditNote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CreditNote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditNote saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditNote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CreditNote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CreditNote findOrCreate($search, callable $callback = null, $options = [])
 */
class CreditNotesTable extends Table
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

        $this->setTable('credit_notes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FinancialYears', [
            'foreignKey' => 'financial_year_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CreditNoteRows', [
            'foreignKey' => 'credit_note_id'
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
            ->scalar('status')
            ->maxLength('status', 10)
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->allowEmptyString('voucher_no', false);

        $validator
            ->date('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->allowEmptyDate('transaction_date', false);

        $validator
            ->scalar('narration')
            ->requirePresence('narration', 'create')
            ->allowEmptyString('narration', false);

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
        $rules->add($rules->existsIn(['financial_year_id'], 'FinancialYears'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
