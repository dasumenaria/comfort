<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReferenceDetails Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\SuppliersTable|\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\LedgersTable|\Cake\ORM\Association\BelongsTo $Ledgers
 * @property \App\Model\Table\ReceiptsTable|\Cake\ORM\Association\BelongsTo $Receipts
 * @property \App\Model\Table\ReceiptRowsTable|\Cake\ORM\Association\BelongsTo $ReceiptRows
 * @property \App\Model\Table\PaymentRowsTable|\Cake\ORM\Association\BelongsTo $PaymentRows
 * @property \App\Model\Table\JournalVoucherRowsTable|\Cake\ORM\Association\BelongsTo $JournalVoucherRows
 * @property |\Cake\ORM\Association\BelongsTo $Invoices
 *
 * @method \App\Model\Entity\ReferenceDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReferenceDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReferenceDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReferenceDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReferenceDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReferenceDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReferenceDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReferenceDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class ReferenceDetailsTable extends Table
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

        $this->setTable('reference_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ledgers', [
            'foreignKey' => 'ledger_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Receipts', [
            'foreignKey' => 'receipt_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ReceiptRows', [
            'foreignKey' => 'receipt_row_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PaymentRows', [
            'foreignKey' => 'payment_row_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('JournalVoucherRows', [
            'foreignKey' => 'journal_voucher_row_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id'
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
            ->date('transaction_date')
            ->allowEmptyDate('transaction_date');

        $validator
            ->scalar('type')
            ->maxLength('type', 30)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('ref_name')
            ->maxLength('ref_name', 255)
            ->requirePresence('ref_name', 'create')
            ->allowEmptyString('ref_name', false);

        $validator
            ->decimal('debit')
            ->requirePresence('debit', 'create')
            ->allowEmptyString('debit', false);

        $validator
            ->decimal('credit')
            ->requirePresence('credit', 'create')
            ->allowEmptyString('credit', false);

        $validator
            ->scalar('opening_balance')
            ->maxLength('opening_balance', 10)
            ->allowEmptyString('opening_balance');

        $validator
            ->integer('due_days')
            ->allowEmptyString('due_days', false);

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['ledger_id'], 'Ledgers'));
        $rules->add($rules->existsIn(['receipt_id'], 'Receipts'));
        $rules->add($rules->existsIn(['receipt_row_id'], 'ReceiptRows'));
        $rules->add($rules->existsIn(['payment_row_id'], 'PaymentRows'));
        $rules->add($rules->existsIn(['journal_voucher_row_id'], 'JournalVoucherRows'));
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));

        return $rules;
    }
}
