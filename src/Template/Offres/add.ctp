<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offre $offre
 */
$loguser = $this->request->session()->read('Auth.User');
$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Offres'), ['action' => 'index']) ?></li>
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
<div class="offres form large-9 medium-8 columns content">
    <?= $this->Form->create($offre) ?>
    <fieldset>
        <legend><?= __('Add Offre') ?></legend>
        <?php
        echo $this->Form->control('titre');
        echo $this->Form->control('region_id', ['options' => $regions, 'empty' => true]);
        echo $this->Form->control('tache');
        echo $this->Form->control('responsabilite');
        echo ($userrole === "admin")?$this->Form->control('user_id', ['options' => $users]):'';
        echo ($userrole === "admin")?$this->Form->control('milieudestage_id', ['options' => $milieudestages]):'';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
