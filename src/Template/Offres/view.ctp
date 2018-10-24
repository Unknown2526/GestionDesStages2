<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offre $offre
 */
$loguser = $this->request->session()->read('Auth.User');
$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($userrole === "etudiant"): ?>
            <li><?= $this->Html->link(__('Postuler'), ['controller' => 'Offres', 'action' => 'postuler', $offre['id']]) ?> </li>
        <?php endif; ?>
        <?php if ($userrole !== "etudiant"): ?>
            <li><?= $this->Html->link(__('Edit Offre'), ['action' => 'edit', $offre->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete Offre'), ['action' => 'delete', $offre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offre->id)]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Offres'), ['action' => 'index']) ?> </li>
        <?php if ($userrole !== "etudiant"): ?>
            <li><?= $this->Html->link(__('New Offre'), ['action' => 'add']) ?> </li>
        <?php endif; ?>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?> </li>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']) ?> </li>
        <?php endif; ?>
    </ul>
</nav>
<div class="offres view large-9 medium-8 columns content">
    <?php if (false): ?>
        <h3><?= h($offre->id) ?></h3>
    <?php endif; ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($offre->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= h($offre->region_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tache') ?></th>
            <td><?= h($offre->tache) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsabilite') ?></th>
            <td><?= h($offre->responsabilite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Milieudestage') ?></th>
            <td><?= $offre->has('milieudestage') ? $this->Html->link($offre->milieudestage->nom, ['controller' => 'Milieudestages', 'action' => 'view', $offre->milieudestage->id]) : '' ?></td>
        </tr>
        <?php if ($userrole === "admin"): ?>      
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $offre->has('user') ? $this->Html->link($offre->user->username, ['controller' => 'Users', 'action' => 'view', $offre->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($offre->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($offre->modified) ?></td>
            </tr>
        <?php endif; ?>
    </table>
    <?php if ($userrole !== "etudiant"): ?>
        <div class="related">
            <h4><?= __('Related Etudiants') ?></h4>
            <?php if (!empty($offre->etudiants)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Nom') ?></th>
                        <th scope="col"><?= __('Prenom') ?></th>
                        <th scope="col"><?= __('Telephone') ?></th>
                        <th scope="col"><?= __('Courriel') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($offre->etudiants as $etudiants): ?>
                        <tr>                       
                            <td><?= h($etudiants->nom) ?></td>
                            <td><?= h($etudiants->prenom) ?></td>
                            <td><?= h($etudiants->telephone) ?></td>
                            <td><?= h($etudiants->courriel) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Etudiants', 'action' => 'view', $etudiants->id]) ?>
                                <?php if ($userrole === "admin"): ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Etudiants', 'action' => 'edit', $etudiants->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etudiants', 'action' => 'delete', $etudiants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etudiants->id)]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
