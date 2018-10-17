<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsTo $Files
 * @property \App\Model\Table\AdministrateursTable|\Cake\ORM\Association\HasMany $Administrateurs
 * @property \App\Model\Table\EtudiantsTable|\Cake\ORM\Association\HasMany $Etudiants
 * @property \App\Model\Table\MilieudestagesTable|\Cake\ORM\Association\HasMany $Milieudestages
 * @property \App\Model\Table\OffresTable|\Cake\ORM\Association\HasMany $Offres
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id'
        ]);
        $this->hasMany('Administrateurs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Etudiants', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Milieudestages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Offres', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('username')
                ->maxLength('username', 255)
                ->email('username')
                ->requirePresence('username', 'create')
                ->notEmpty('username');

        $validator
                ->scalar('password')
                ->maxLength('password', 255)
                ->minLength('password', 5)
                ->requirePresence('password', 'create')
                ->notEmpty('password');

        $validator
                ->scalar('uuid')
                ->maxLength('uuid', 255)
                ->requirePresence('uuid', 'create')
                ->notEmpty('uuid');

        $validator
                ->boolean('verify')
                ->allowEmpty('verify');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }

}
