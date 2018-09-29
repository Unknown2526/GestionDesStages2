<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Milieudestages Model
 *
 * @property \App\Model\Table\RegionsTable|\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OffresTable|\Cake\ORM\Association\HasMany $Offres
 * @property \App\Model\Table\MissionsTable|\Cake\ORM\Association\BelongsToMany $Missions
 * @property \App\Model\Table\TypeclientelesTable|\Cake\ORM\Association\BelongsToMany $Typeclienteles
 * @property \App\Model\Table\TypeetablissementsTable|\Cake\ORM\Association\BelongsToMany $Typeetablissements
 *
 * @method \App\Model\Entity\Milieudestage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Milieudestage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Milieudestage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Milieudestage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Milieudestage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Milieudestage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Milieudestage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Milieudestage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MilieudestagesTable extends Table
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

        $this->setTable('milieudestages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_admin_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Offres', [
            'foreignKey' => 'milieudestage_id'
        ]);
        $this->belongsToMany('Missions', [
            'foreignKey' => 'milieudestage_id',
            'targetForeignKey' => 'mission_id',
            'joinTable' => 'milieudestages_missions'
        ]);
        $this->belongsToMany('Typeclienteles', [
            'foreignKey' => 'milieudestage_id',
            'targetForeignKey' => 'typeclientele_id',
            'joinTable' => 'milieudestages_typeclienteles'
        ]);
        $this->belongsToMany('Typeetablissements', [
            'foreignKey' => 'milieudestage_id',
            'targetForeignKey' => 'typeetablissement_id',
            'joinTable' => 'milieudestages_typeetablissements'
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
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 255)
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->scalar('ville')
            ->maxLength('ville', 255)
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->requirePresence('province', 'create')
            ->notEmpty('province');

        $validator
            ->scalar('code_postal')
            ->maxLength('code_postal', 255)
            ->requirePresence('code_postal', 'create')
            ->notEmpty('code_postal');

        $validator
            ->scalar('exigence')
            ->allowEmpty('exigence');

        $validator
            ->scalar('nom_respo')
            ->maxLength('nom_respo', 255)
            ->allowEmpty('nom_respo');

        $validator
            ->scalar('telephone_respo')
            ->maxLength('telephone_respo', 255)
            ->allowEmpty('telephone_respo');

        $validator
            ->scalar('fax_respo')
            ->maxLength('fax_respo', 255)
            ->allowEmpty('fax_respo');

        $validator
            ->scalar('courriel_respo')
            ->maxLength('courriel_respo', 255)
            ->allowEmpty('courriel_respo');

        $validator
            ->scalar('adresse_admin')
            ->maxLength('adresse_admin', 255)
            ->allowEmpty('adresse_admin');

        $validator
            ->scalar('ville_admin')
            ->maxLength('ville_admin', 255)
            ->allowEmpty('ville_admin');

        $validator
            ->scalar('province_admin')
            ->maxLength('province_admin', 255)
            ->allowEmpty('province_admin');

        $validator
            ->scalar('code_postal_admin')
            ->maxLength('code_postal_admin', 255)
            ->allowEmpty('code_postal_admin');

        $validator
            ->scalar('facilite')
            ->maxLength('facilite', 255)
            ->allowEmpty('facilite');

        $validator
            ->scalar('tache')
            ->allowEmpty('tache');

        $validator
            ->scalar('remarque')
            ->maxLength('remarque', 255)
            ->allowEmpty('remarque');

        $validator
            ->scalar('info_solicitation')
            ->maxLength('info_solicitation', 255)
            ->allowEmpty('info_solicitation');

        $validator
            ->scalar('info_contrat')
            ->maxLength('info_contrat', 255)
            ->allowEmpty('info_contrat');

        $validator
            ->scalar('reponse_milieu')
            ->maxLength('reponse_milieu', 255)
            ->allowEmpty('reponse_milieu');

        $validator
            ->scalar('autre_info')
            ->allowEmpty('autre_info');

        $validator
            ->dateTime('date_inv')
            ->allowEmpty('date_inv');

        $validator
            ->dateTime('date_rappel')
            ->allowEmpty('date_rappel');

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
        $rules->add($rules->existsIn(['region_admin_id'], 'Regions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
