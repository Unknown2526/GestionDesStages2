<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EtudiantsOffres Model
 *
 * @property \App\Model\Table\EtudiantsTable|\Cake\ORM\Association\BelongsTo $Etudiants
 * @property \App\Model\Table\OffresTable|\Cake\ORM\Association\BelongsTo $Offres
 *
 * @method \App\Model\Entity\EtudiantsOffre get($primaryKey, $options = [])
 * @method \App\Model\Entity\EtudiantsOffre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EtudiantsOffre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EtudiantsOffre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EtudiantsOffre|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EtudiantsOffre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EtudiantsOffre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EtudiantsOffre findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtudiantsOffresTable extends Table
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

        $this->setTable('etudiants_offres');
        $this->setDisplayField('etudiant_id');
        $this->setPrimaryKey(['etudiant_id', 'offre_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Etudiants', [
            'foreignKey' => 'etudiant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Offres', [
            'foreignKey' => 'offre_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['etudiant_id'], 'Etudiants'));
        $rules->add($rules->existsIn(['offre_id'], 'Offres'));

        return $rules;
    }
}
