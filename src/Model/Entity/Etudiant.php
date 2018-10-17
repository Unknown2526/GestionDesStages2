<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Etudiant Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $telephone
 * @property string $courriel
 * @property string $info_supp
 * @property bool $actif
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Etudiant extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nom' => true,
        'prenom' => true,
        'telephone' => true,
        'courriel' => true,
        'info_supp' => true,
        'actif' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
