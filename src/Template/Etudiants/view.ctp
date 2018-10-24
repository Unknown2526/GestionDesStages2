<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant $etudiant
 */
$loguser = $this->request->session()->read('Auth.User');
$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Etudiant'), ['action' => 'edit', $etudiant->id]) ?> </li>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Form->postLink(__('Delete Etudiant'), ['action' => 'delete', $etudiant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etudiant->id)]) ?> </li>
            <li><?= $this->Html->link(__('List Etudiants'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Etudiant'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="etudiants view large-9 medium-8 columns content">
    <?php if (false): ?>
        <h3><?= h($etudiant->id) ?></h3>
    <?php endif; ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($etudiant->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($etudiant->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($etudiant->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courriel') ?></th>
            <td><?= h($etudiant->courriel) ?></td>
        </tr>
        <?php if ($userrole === "admin"): ?>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $etudiant->has('user') ? $this->Html->link($etudiant->user->id, ['controller' => 'Users', 'action' => 'view', $etudiant->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($etudiant->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($etudiant->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Actif') ?></th>
                <td><?= $etudiant->actif ? __('Yes') : __('No'); ?></td>
            </tr>
        <?php endif; ?>
    </table>
    <div class="row">
        <h4><?= __('Info Supp') ?></h4>
        <?= $this->Text->autoParagraph(h($etudiant->info_supp)); ?>
    </div>
    <?php if ($userrole !== "milieu"): ?>
        <div class="related">
            <h4><?= __('Related Offres') ?></h4>
            <?php if (!empty($etudiant->offres)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Titre') ?></th>
                        <th scope="col"><?= __('Milieudestages') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($etudiant->offres as $offres): ?>
                        <tr>
                            <td><?= h($offres->titre) ?></td>
                            <td><?= h($offres->milieudestage_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offres', 'action' => 'view', $offres->id]) ?>
                                <?php if ($userrole === "admin"): ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Offres', 'action' => 'edit', $offres->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offres', 'action' => 'delete', $offres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offres->id)]) ?>
                                <?php endif; ?>
                                <?php if ($userrole === "etudiant"): ?>
                                    <?= $this->Html->link(__('Unapply'), ['controller' => 'Offres','action' => 'unapply', $offres->id]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
