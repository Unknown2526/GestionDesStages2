<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrateur $administrateur
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Administrateurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="administrateurs form large-9 medium-8 columns content">
    <?= $this->Form->create($administrateur) ?>
    <fieldset>
        <legend><?= __('Add Administrateur') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('telephone');
            echo $this->Form->control('courriel');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
