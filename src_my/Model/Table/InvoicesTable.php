<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @property \App\Model\Table\InvoiceTypesTable|\Cake\ORM\Association\BelongsTo $InvoiceTypes
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\LoginsTable|\Cake\ORM\Association\BelongsTo $Logins
 * @property \App\Model\Table\CountersTable|\Cake\ORM\Association\BelongsTo $Counters
 * @property \App\Model\Table\WaveoffLoginsTable|\Cake\ORM\Association\BelongsTo $WaveoffLogins
 * @property \App\Model\Table\WaveoffCountersTable|\Cake\ORM\Association\BelongsTo $WaveoffCounters
 * @property \App\Model\Table\FinancialYearsTable|\Cake\ORM\Association\BelongsTo $FinancialYears
 * @property \App\Model\Table\GstFiguresTable|\Cake\ORM\Association\BelongsTo $GstFigures
 * @property \App\Model\Table\InvoiceDetailsTable|\Cake\ORM\Association\HasMany $InvoiceDetails
 *
 * @method \App\Model\Entity\Invoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Invoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoicesTable extends Table
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

        $this->setTable('invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('InvoiceTypes', [
            'foreignKey' => 'invoice_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Logins', [
            'foreignKey' => 'login_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Counters', [
            'foreignKey' => 'counter_id',
            'joinType' => 'INNER'
        ]);
         
        $this->belongsTo('FinancialYears', [
            'foreignKey' => 'financial_year_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('GstFigures', [
            'foreignKey' => 'gst_figure_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InvoiceDetails', [
            'foreignKey' => 'invoice_id'
        ]);
        
        $this->belongsTo('DutySlips');
        $this->BelongsTo('Ledgers');
        $this->BelongsTo('AccountingGroups');
        $this->BelongsTo('AccountingEntries');
        $this->BelongsTo('ReferenceDetails');
        $this->BelongsTo('SupplierTariffs');
        $this->BelongsTo('Services');
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
            ->scalar('invoice_no')
            ->maxLength('invoice_no', 15)
            ->requirePresence('invoice_no', 'create')
            ->allowEmptyString('invoice_no', false);
 

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->allowEmptyDate('date', false);

        $validator
            ->scalar('payment_type')
            ->maxLength('payment_type', 10)
            ->requirePresence('payment_type', 'create')
            ->allowEmptyString('payment_type', false);

         

        $validator
            ->scalar('total')
            ->maxLength('total', 20)
            ->requirePresence('total', 'create')
            ->allowEmptyString('total', false);

        $validator
            ->scalar('discount')
            ->maxLength('discount', 10)
            ->requirePresence('discount', 'create')
            ->allowEmptyString('discount', false);

       
        $validator
            ->scalar('grand_total')
            ->maxLength('grand_total', 20)
            ->requirePresence('grand_total', 'create')
            ->allowEmptyString('grand_total', false);

        $validator
            ->scalar('payment_status')
            ->maxLength('payment_status', 10)
            ->requirePresence('payment_status', 'create')
            ->allowEmptyString('payment_status', false);

        $validator
            ->integer('complimenatry_status')
            ->requirePresence('complimenatry_status', 'create')
            ->allowEmptyString('complimenatry_status', false); 

        $validator
            ->date('current_date')
            ->requirePresence('current_date', 'create')
            ->allowEmptyDate('current_date', false);
 

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
        $rules->add($rules->existsIn(['invoice_type_id'], 'InvoiceTypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['login_id'], 'Logins'));
        $rules->add($rules->existsIn(['counter_id'], 'Counters')); 
        $rules->add($rules->existsIn(['financial_year_id'], 'FinancialYears'));
        //$rules->add($rules->existsIn(['gst_figure_id'], 'GstFigures'));

        return $rules;
    }
}
