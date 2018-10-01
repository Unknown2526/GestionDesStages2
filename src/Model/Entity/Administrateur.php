<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Administrateur Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $telephone
 * @property string $courriel
 * @property int $user_id
 * @property int $created
 * @property int $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Administrateur extends Entity
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
        'telephone' => true,
        'courriel' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
