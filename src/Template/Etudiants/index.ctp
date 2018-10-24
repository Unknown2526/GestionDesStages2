<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant[]|\Cake\Collection\CollectionInterface $etudiants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Etudiant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="etudiants index large-9 medium-8 columns content">
    <h3><?= __('Etudiants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courriel') ?></th>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <?php endif; ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <?php if (false): ?>
                        <td><?= $this->Number->format($etudiant->id) ?></td>
                    <?php endif; ?>
                    <td><?= h($etudiant->nom) ?></td>
                    <td><?= h($etudiant->prenom) ?></td>
                    <td><?= h($etudiant->telephone) ?></td>
                    <td><?= h($etudiant->courriel) ?></td>
                    <?php if (false): ?>
                        <td><?= h($etudiant->actif) ?></td>
                        <td><?= $etudiant->has('user') ? $this->Html->link($etudiant->user->id, ['controller' => 'Users', 'action' => 'view', $etudiant->user->id]) : '' ?></td>
                        <td><?= h($etudiant->created) ?></td>
                        <td><?= h($etudiant->modified) ?></td>
                    <?php endif; ?>
                    <td class="actions">
                        <?= $this->Html->link(__('Convocation'), ['controller' => 'Offres', 'action' => 'sendEconvocation', $etudiant->id]) ?>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $etudiant->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $etudiant->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $etudiant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etudiant->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
