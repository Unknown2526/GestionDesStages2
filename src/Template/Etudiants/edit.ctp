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
        <?php if ($userrole === "admin"): ?>
            <li><?=
                $this->Form->postLink(
                        __('Delete'), ['action' => 'delete', $etudiant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etudiant->id)]
                )
                ?></li>
            <li><?= $this->Html->link(__('List Etudiants'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Milieudestages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="etudiants form large-9 medium-8 columns content">
    <?= $this->Form->create($etudiant) ?>
    <fieldset>
        <legend><?= __('Edit Etudiant') ?></legend>
        <?php
        echo $this->Form->control('nom');
        echo $this->Form->control('prenom');
        echo $this->Form->control('telephone');
        echo $this->Form->control('courriel');
        echo $this->Form->control('info_supp');
        
        echo $this->Form->control('Upload Files', ['type' => 'file']);
        
        echo ($userrole === "admin")?$this->Form->control('actif'):$this->Form->hidden('actif');
        echo ($userrole === "admin")?$this->Form->control('user_id', ['options' => $users]):$this->Form->hidden('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
