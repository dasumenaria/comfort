<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Counters Model
 *
 * @property \App\Model\Table\LoginsTable|\Cake\ORM\Association\HasMany $Logins
 *
 * @method \App\Model\Entity\Counter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Counter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Counter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Counter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Counter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Counter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Counter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Counter findOrCreate($search, callable $callback = null, $options = [])
 */
class CountersTable extends Table
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

        $this->setTable('counters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Logins', [
            'foreignKey' => 'counter_id'
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
