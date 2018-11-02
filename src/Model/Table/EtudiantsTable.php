<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etudiants Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
<<<<<<< HEAD
=======
 * @property |\Cake\ORM\Association\BelongsToMany $Offres
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
 *
 * @method \App\Model\Entity\Etudiant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etudiant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etudiant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etudiant|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etudiant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtudiantsTable extends Table
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
<<<<<<< HEAD
        
        $this->addBehavior('Translate', ['fields' => ['info_supp']]);
        
=======

>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
        $this->setTable('etudiants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
<<<<<<< HEAD
=======
        $this->belongsToMany('Offres', [
            'foreignKey' => 'etudiant_id',
            'targetForeignKey' => 'offre_id',
            'joinTable' => 'etudiants_offres'
        ]);
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
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
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->allowEmpty('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 255)
            ->allowEmpty('prenom');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 255)
            ->allowEmpty('telephone');

        $validator
            ->scalar('courriel')
            ->maxLength('courriel', 255)
            ->requirePresence('courriel', 'create')
            ->notEmpty('courriel');

        $validator
            ->scalar('info_supp')
            ->allowEmpty('info_supp');

        $validator
            ->boolean('actif')
            ->allowEmpty('actif');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
<<<<<<< HEAD
=======
    
    public function findEtudiant(Query $query, array $options)
    {
        $query->where([
            $this->alias() . '.id' => 1
        ]);
        return $query;
    }
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
}
