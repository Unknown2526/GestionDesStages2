<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrateur[]|\Cake\Collection\CollectionInterface $administrateurs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Administrateur'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="administrateurs index large-9 medium-8 columns content">
    <h3><?= __('Administrateurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courriel') ?></th>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <?php endif; ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($administrateurs as $administrateur): ?>
                <tr>
                    <?php if (false): ?>
                        <td><?= $this->Number->format($administrateur->id) ?></td>
                    <?php endif; ?>
                    <td><?= h($administrateur->nom) ?></td>
                    <td><?= h($administrateur->telephone) ?></td>
                    <td><?= h($administrateur->courriel) ?></td>
                    <?php if (false): ?>
                        <td><?= $administrateur->has('user') ? $this->Html->link($administrateur->user->id, ['controller' => 'Users', 'action' => 'view', $administrateur->user->id]) : '' ?></td>
                        <td><?= $this->Number->format($administrateur->created) ?></td>
                        <td><?= $this->Number->format($administrateur->modified) ?></td>
                    <?php endif; ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $administrateur->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrateur->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrateur->id)]) ?>
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
