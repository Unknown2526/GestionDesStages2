<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <?php if (false): ?>
            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <?php endif; ?>
<<<<<<< HEAD
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
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
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->control('username');
        echo $this->Form->control('password');
        echo $this->Form->control('role_id', ['options' => $roles]);
<<<<<<< HEAD
        echo $this->Form->control('file_id', ['options' => $files, 'empty' => true]);
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
