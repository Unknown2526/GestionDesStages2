<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <?php if (false): ?>
            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Administrateurs'), ['controller' => 'Administrateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Administrateur'), ['controller' => 'Administrateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Etudiants'), ['controller' => 'Etudiants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etudiant'), ['controller' => 'Etudiants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php if (false): ?> 
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('uuid') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('verify') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <?php endif; ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <?php if (false): ?>
                        <td><?= $this->Number->format($user->id) ?></td>
                    <?php endif; ?>
                    <td><?= h($user->username) ?></td>
                    <?php if (false): ?>
                        <td><?= h($user->password) ?></td>
                    <?php endif; ?>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td><?=
                        $user->has('file_id') ? $this->Html->image($user->file->path . $user->file->name, ["alt" => $user->file->name,
                                    "width" => "220px",
                                    "height" => "150px",
                                    'url' => ['controller' => 'Files', 'action' => 'view', $user->file->id]
                                ]) : ''
                        ?></td>
                    <?php if (false): ?>
                        <td><?= h($user->uuid) ?></td>
                        <td><?= h($user->verify) ?></td>
                        <td><?= h($user->created) ?></td>
                        <td><?= h($user->modified) ?></td>
                    <?php endif; ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
