<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <?php if (false): ?>
            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <?php endif; ?>
<<<<<<< HEAD
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
        <li><?= $this->Html->link(__('List Administrateurs'), ['controller' => 'Administrateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrateur'), ['controller' => 'Administrateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Etudiants'), ['controller' => 'Etudiants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etudiant'), ['controller' => 'Etudiants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <?php if (false): ?>
        <h3><?= h($user->id) ?></h3>
    <?php endif; ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
<<<<<<< HEAD
            <th scope="row"><?= __('File') ?></th>
            <td><?=
                $user->has('file_id') ? $this->Html->image($user->file->path . $user->file->name, ["alt" => $user->file->name,
                            "width" => "220px",
                            "height" => "150px",
                            'url' => ['controller' => 'Files', 'action' => 'view', $user->file->id]
                        ]) : ''
                ?>
            </td>
        </tr>
        <tr>
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
            <th scope="row"><?= __('Uuid') ?></th>
            <td><?= h($user->uuid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verify') ?></th>
            <td><?= h($user->verify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Administrateurs') ?></h4>
        <?php if (!empty($user->administrateurs)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Nom') ?></th>
                    <th scope="col"><?= __('Telephone') ?></th>
                    <th scope="col"><?= __('Courriel') ?></th>
                    <?php if (false): ?>
                        <th scope="col"><?= __('User Id') ?></th>               
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                    <?php endif; ?>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->administrateurs as $administrateurs): ?>
                    <tr>
                        <?php if (false): ?>
                            <td><?= h($administrateurs->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($administrateurs->nom) ?></td>
                        <td><?= h($administrateurs->telephone) ?></td>
                        <td><?= h($administrateurs->courriel) ?></td>
                        <?php if (false): ?>
                            <td><?= h($administrateurs->user_id) ?></td>                     
                            <td><?= h($administrateurs->created) ?></td>
                            <td><?= h($administrateurs->modified) ?></td>
                        <?php endif; ?>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Administrateurs', 'action' => 'view', $administrateurs->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Administrateurs', 'action' => 'edit', $administrateurs->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Administrateurs', 'action' => 'delete', $administrateurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrateurs->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Etudiants') ?></h4>
        <?php if (!empty($user->etudiants)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Nom') ?></th>
                    <th scope="col"><?= __('Prenom') ?></th>
                    <th scope="col"><?= __('Telephone') ?></th>
                    <th scope="col"><?= __('Courriel') ?></th>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Info Supp') ?></th>
                        <th scope="col"><?= __('Actif') ?></th>                   
                        <th scope="col"><?= __('User Id') ?></th>                 
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                    <?php endif; ?>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->etudiants as $etudiants): ?>
                    <tr>
                        <?php if (false): ?>
                            <td><?= h($etudiants->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($etudiants->nom) ?></td>
                        <td><?= h($etudiants->prenom) ?></td>
                        <td><?= h($etudiants->telephone) ?></td>
                        <td><?= h($etudiants->courriel) ?></td>
                        <?php if (false): ?>
                            <td><?= h($etudiants->info_supp) ?></td>
                            <td><?= h($etudiants->actif) ?></td>                      
                            <td><?= h($etudiants->user_id) ?></td>                     
                            <td><?= h($etudiants->created) ?></td>
                            <td><?= h($etudiants->modified) ?></td>
                        <?php endif; ?>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Etudiants', 'action' => 'view', $etudiants->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Etudiants', 'action' => 'edit', $etudiants->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etudiants', 'action' => 'delete', $etudiants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etudiants->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Milieudestages') ?></h4>
        <?php if (!empty($user->milieudestages)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Nom') ?></th>
                    <th scope="col"><?= __('Adresse') ?></th>
                    <th scope="col"><?= __('Ville') ?></th>
                    <th scope="col"><?= __('Province') ?></th>
                    <th scope="col"><?= __('Code Postal') ?></th>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Exigence') ?></th>
                        <th scope="col"><?= __('Nom Respo') ?></th>
                        <th scope="col"><?= __('Telephone Respo') ?></th>
                        <th scope="col"><?= __('Fax Respo') ?></th>
                        <th scope="col"><?= __('Courriel Respo') ?></th>
                        <th scope="col"><?= __('Adresse Admin') ?></th>
                        <th scope="col"><?= __('Ville Admin') ?></th>
                        <th scope="col"><?= __('Province Admin') ?></th>
                        <th scope="col"><?= __('Code Postal Admin') ?></th>
                        <th scope="col"><?= __('Region Admin Id') ?></th>
                        <th scope="col"><?= __('Facilite') ?></th>
                        <th scope="col"><?= __('Tache') ?></th>
                        <th scope="col"><?= __('Remarque') ?></th>
                        <th scope="col"><?= __('Info Solicitation') ?></th>
                        <th scope="col"><?= __('Info Contrat') ?></th>
                        <th scope="col"><?= __('Reponse Milieu') ?></th>
                        <th scope="col"><?= __('Autre Info') ?></th>
                        <th scope="col"><?= __('Date Inv') ?></th>
                        <th scope="col"><?= __('Date Rappel') ?></th>
                        <th scope="col"><?= __('Actif') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                    <?php endif; ?>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->milieudestages as $milieudestages): ?>
                    <tr>
                        <?php if (false): ?>
                            <td><?= h($milieudestages->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($milieudestages->nom) ?></td>
                        <td><?= h($milieudestages->adresse) ?></td>
                        <td><?= h($milieudestages->ville) ?></td>
                        <td><?= h($milieudestages->province) ?></td>
                        <td><?= h($milieudestages->code_postal) ?></td>
                        <?php if (false): ?>
                            <td><?= h($milieudestages->exigence) ?></td>
                            <td><?= h($milieudestages->nom_respo) ?></td>
                            <td><?= h($milieudestages->telephone_respo) ?></td>
                            <td><?= h($milieudestages->fax_respo) ?></td>
                            <td><?= h($milieudestages->courriel_respo) ?></td>
                            <td><?= h($milieudestages->adresse_admin) ?></td>
                            <td><?= h($milieudestages->ville_admin) ?></td>
                            <td><?= h($milieudestages->province_admin) ?></td>
                            <td><?= h($milieudestages->code_postal_admin) ?></td>
                            <td><?= h($milieudestages->region_admin_id) ?></td>
                            <td><?= h($milieudestages->facilite) ?></td>
                            <td><?= h($milieudestages->tache) ?></td>
                            <td><?= h($milieudestages->remarque) ?></td>
                            <td><?= h($milieudestages->info_solicitation) ?></td>
                            <td><?= h($milieudestages->info_contrat) ?></td>
                            <td><?= h($milieudestages->reponse_milieu) ?></td>
                            <td><?= h($milieudestages->autre_info) ?></td>
                            <td><?= h($milieudestages->date_inv) ?></td>
                            <td><?= h($milieudestages->date_rappel) ?></td>
                            <td><?= h($milieudestages->actif) ?></td>
                            <td><?= h($milieudestages->user_id) ?></td>
                            <td><?= h($milieudestages->created) ?></td>
                            <td><?= h($milieudestages->modified) ?></td>
                        <?php endif; ?>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Milieudestages', 'action' => 'view', $milieudestages->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Milieudestages', 'action' => 'edit', $milieudestages->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Milieudestages', 'action' => 'delete', $milieudestages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milieudestages->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Offres') ?></h4>
        <?php if (!empty($user->offres)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Titre') ?></th>
                    <th scope="col"><?= __('Region Id') ?></th>
                    <?php if (false): ?>
                        <th scope="col"><?= __('Tache') ?></th>
                        <th scope="col"><?= __('Responsabilite') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Milieudestage Id') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                    <?php endif; ?>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->offres as $offres): ?>
                    <tr>
                        <?php if (false): ?>
                            <td><?= h($offres->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($offres->titre) ?></td>
                        <td><?= h($offres->region_id) ?></td>
                        <?php if (false): ?>
                            <td><?= h($offres->tache) ?></td>
                            <td><?= h($offres->responsabilite) ?></td>
                            <td><?= h($offres->user_id) ?></td>
                            <td><?= h($offres->milieudestage_id) ?></td>
                            <td><?= h($offres->created) ?></td>
                            <td><?= h($offres->modified) ?></td>
                        <?php endif; ?>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Offres', 'action' => 'view', $offres->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Offres', 'action' => 'edit', $offres->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offres', 'action' => 'delete', $offres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offres->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
