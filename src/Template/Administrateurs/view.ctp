<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrateur $administrateur
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Administrateur'), ['action' => 'edit', $administrateur->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Administrateur'), ['action' => 'delete', $administrateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrateur->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Administrateurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrateur'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="administrateurs view large-9 medium-8 columns content">
    <?php if (false): ?>
        <h3><?= h($administrateur->id) ?></h3>
    <?php endif; ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($administrateur->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($administrateur->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courriel') ?></th>
            <td><?= h($administrateur->courriel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $administrateur->has('user') ? $this->Html->link($administrateur->user->id, ['controller' => 'Users', 'action' => 'view', $administrateur->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $this->Number->format($administrateur->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= $this->Number->format($administrateur->modified) ?></td>
        </tr>
    </table>
</div>
