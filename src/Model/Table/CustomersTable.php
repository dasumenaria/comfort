<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\EmailsTable|\Cake\ORM\Association\BelongsTo $Emails
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id'); 
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
            ->scalar('name')
            ->maxLength('name', 70)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->scalar('Contact_person')
            ->maxLength('Contact_person', 20)
            ->requirePresence('Contact_person', 'create')
            ->allowEmptyString('Contact_person', false);

        $validator
            ->scalar('office_no')
            ->maxLength('office_no', 20)
            ->requirePresence('office_no', 'create')
            ->allowEmptyString('office_no', false);

        $validator
            ->scalar('Residence_no')
            ->maxLength('Residence_no', 20)
            ->requirePresence('Residence_no', 'create')
            ->allowEmptyString('Residence_no', false);

        $validator
            ->requirePresence('mobile_no', 'create')
            ->allowEmptyString('mobile_no', false);

        $validator
            ->scalar('fax_no')
            ->maxLength('fax_no', 20)
            ->requirePresence('fax_no', 'create')
            ->allowEmptyString('fax_no', false);

        $validator
            ->integer('opening_bal')
            ->requirePresence('opening_bal', 'create')
            ->allowEmptyString('opening_bal', false);

        $validator
            ->integer('closing_bal')
            ->requirePresence('closing_bal', 'create')
            ->allowEmptyString('closing_bal', false);

        $validator
            ->scalar('srvctaxregno')
            ->maxLength('srvctaxregno', 20)
            ->requirePresence('srvctaxregno', 'create')
            ->allowEmptyString('srvctaxregno', false);

        $validator
            ->scalar('panno')
            ->maxLength('panno', 20)
            ->requirePresence('panno', 'create')
            ->allowEmptyString('panno', false);

        $validator
            ->scalar('creditlimit')
            ->maxLength('creditlimit', 20)
            ->requirePresence('creditlimit', 'create')
            ->allowEmptyString('creditlimit', false);

        $validator
            ->scalar('block_status')
            ->maxLength('block_status', 20)
            ->requirePresence('block_status', 'create')
            ->allowEmptyString('block_status', false);

        $validator
            ->scalar('servicetax_status')
            ->maxLength('servicetax_status', 10)
            ->requirePresence('servicetax_status', 'create')
            ->allowEmptyString('servicetax_status', false);

        $validator
            ->scalar('gst_number')
            ->maxLength('gst_number', 100)
            ->requirePresence('gst_number', 'create')
            ->allowEmptyString('gst_number', false);

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->requirePresence('state', 'create')
            ->allowEmptyString('state', false);

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->requirePresence('city', 'create')
            ->allowEmptyString('city', false);

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
        $rules->add($rules->existsIn(['email_id'], 'Emails'));

        return $rules;
    }
}
