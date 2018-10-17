<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offre[]|\Cake\Collection\CollectionInterface $offres
 */
$loguser = $this->request->session()->read('Auth.User');
$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($userrole !== "etudiant"): ?>
            <li><?= $this->Html->link(__('New Offre'), ['action' => 'add']) ?></li>
        <?php endif; ?>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?></li>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="offres index large-9 medium-8 columns content">
    <h3><?= __('Offres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php if (false): ?> 
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region') ?></th> 
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('tache') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('responsabilite') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('milieudestage_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <?php endif; ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offres as $offre): ?>
                <tr>
                    <?php if (false): ?> 
                        <td><?= $this->Number->format($offre->id) ?></td>
                    <?php endif; ?>
                    <td><?= h($offre->titre) ?></td>
                    <td><?= h($offre->region->nom) ?></td>
                    <?php if (false): ?>
                        <td><?= h($offre->tache) ?></td>
                        <td><?= h($offre->responsabilite) ?></td>
                        <td><?= $offre->has('user') ? $this->Html->link($offre->user->username, ['controller' => 'Users', 'action' => 'view', $offre->user->id]) : '' ?></td>
                        <td><?= $offre->has('milieudestage') ? $this->Html->link($offre->milieudestage->nom, ['controller' => 'Milieudestages', 'action' => 'view', $offre->milieudestage->id]) : '' ?></td>
                        <td><?= h($offre->created) ?></td>
                        <td><?= h($offre->modified) ?></td>
                    <?php endif; ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $offre->id]) ?>
                        <?php if ($userrole !== "etudiant"): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offre->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offre->id)]) ?>
                        <?php endif; ?>
                        <?php if ($userrole === "etudiant"): ?>
                            <?= $this->Html->link(__('Postuler'), ['action' => 'postuler', $offre->id]) ?>
                        <?php endif; ?>
                        <?php if ($userrole === "milieu"): ?>
                            <?= $this->Html->link(__('Notifier les étudiants'), ['action' => 'notifierEtudiants', $offre->id]) ?>
                        <?php endif; ?>
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
