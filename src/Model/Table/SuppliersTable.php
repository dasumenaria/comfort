<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \App\Model\Table\SupplierTypesTable|\Cake\ORM\Association\BelongsTo $SupplierTypes
 * @property \App\Model\Table\SupplierTypeSubsTable|\Cake\ORM\Association\BelongsTo $SupplierTypeSubs
 * @property \App\Model\Table\EmailsTable|\Cake\ORM\Association\BelongsTo $Emails
 *
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, callable $callback = null, $options = [])
 */
class SuppliersTable extends Table
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

        $this->setTable('suppliers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('SupplierTypes', [
            'foreignKey' => 'supplier_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SupplierTypeSubs', [
            'foreignKey' => 'supplier_type_sub_id',
            'joinType' => 'INNER'
        ]);

         $this->hasMany('SupplierTariffs', [ 
            'foreignKey' => 'supplier_id'
        ]);
        
        $this->BelongsTo('Ledgers');
        $this->BelongsTo('AccountingGroups');
        $this->BelongsTo('AccountingEntries');
        $this->BelongsTo('ReferenceDetails');
       
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
            ->scalar('supplier_type_id')
            ->requirePresence('supplier_type_id', 'create')
            ->allowEmptyString('supplier_type_id', false);

        $validator
            ->scalar('supplier_type_sub_id')
            ->requirePresence('supplier_type_sub_id', 'create')
            ->allowEmptyString('supplier_type_sub_id', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 40)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);



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
        $rules->add($rules->existsIn(['supplier_type_id'], 'SupplierTypes'));
        $rules->add($rules->existsIn(['supplier_type_sub_id'], 'SupplierTypeSubs'));
        

        return $rules;
    }
}
