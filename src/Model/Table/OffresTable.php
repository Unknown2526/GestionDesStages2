<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offres Model
 *
 * @property \App\Model\Table\RegionsTable|\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MilieudestagesTable|\Cake\ORM\Association\BelongsTo $Milieudestages
 * @property \App\Model\Table\EtudiantsTable|\Cake\ORM\Association\BelongsToMany $Etudiants
 *
 * @method \App\Model\Entity\Offre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Offre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Offre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Offre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offre|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Offre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Offre findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OffresTable extends Table
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

        $this->setTable('offres');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Milieudestages', [
            'foreignKey' => 'milieudestage_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Etudiants', [
            'foreignKey' => 'offre_id',
            'targetForeignKey' => 'etudiant_id',
            'joinTable' => 'etudiants_offres'
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
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmpty('titre');

        $validator
            ->scalar('tache')
            ->maxLength('tache', 255)
            ->requirePresence('tache', 'create')
            ->notEmpty('tache');

        $validator
            ->scalar('responsabilite')
            ->maxLength('responsabilite', 255)
            ->requirePresence('responsabilite', 'create')
            ->notEmpty('responsabilite');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['milieudestage_id'], 'Milieudestages'));

        return $rules;
    }
}
