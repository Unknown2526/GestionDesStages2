<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant $etudiant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Etudiants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="etudiants form large-9 medium-8 columns content">
    <?= $this->Form->create($etudiant) ?>
    <fieldset>
        <legend><?= __('Add Etudiant') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            echo $this->Form->control('telephone');
            echo $this->Form->control('courriel');
            echo $this->Form->control('info_supp');
            echo $this->Form->control('actif');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
