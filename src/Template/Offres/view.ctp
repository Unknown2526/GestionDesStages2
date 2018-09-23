<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offre $offre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Offre'), ['action' => 'edit', $offre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Offre'), ['action' => 'delete', $offre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Offres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="offres view large-9 medium-8 columns content">
    <h3><?= h($offre->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($offre->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= h($offre->region) ?></td>
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
            <td><?= $offre->has('milieudestage') ? $this->Html->link($offre->milieudestage->id, ['controller' => 'Milieudestages', 'action' => 'view', $offre->milieudestage->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($offre->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($offre->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($offre->modified) ?></td>
        </tr>
    </table>
</div>
