<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sesions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\HasMany $Payments
 * @property \Cake\ORM\Association\HasMany $Schedules
 * @property \Cake\ORM\Association\BelongsToMany $Services
 *
 * @method \App\Model\Entity\Sesion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sesion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sesion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sesion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sesion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sesion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sesion findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SesionsTable extends Table
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

        $this->table('sesions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'sesion_id'
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'sesion_id'
        ]);
        $this->belongsToMany('Services', [
            'foreignKey' => 'sesion_id',
            'targetForeignKey' => 'service_id',
            'joinTable' => 'sesions_services'
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
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('paid')
            ->allowEmpty('paid');

        $validator
            ->boolean('executed')
            ->allowEmpty('executed');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
