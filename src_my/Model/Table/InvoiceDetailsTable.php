<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoiceDetails Model
 *
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\BelongsTo $Invoices
 * @property \App\Model\Table\DutySlipsTable|\Cake\ORM\Association\BelongsTo $DutySlips
 *
 * @method \App\Model\Entity\InvoiceDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvoiceDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoiceDetailsTable extends Table
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

        $this->setTable('invoice_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DutySlips', [
            'foreignKey' => 'duty_slip_id',
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
            ->scalar('amount')
            ->maxLength('amount', 20)
            ->requirePresence('amount', 'create')
            ->allowEmptyString('amount', false);

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
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));
        $rules->add($rules->existsIn(['duty_slip_id'], 'DutySlips'));

        return $rules;
    }
}
