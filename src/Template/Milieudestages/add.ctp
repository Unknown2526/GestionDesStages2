<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milieudestage $milieudestage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Milieudestages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Listemissions'), ['controller' => 'Listemissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listemission'), ['controller' => 'Listemissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Listetypeclienteles'), ['controller' => 'Listetypeclienteles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listetypeclientele'), ['controller' => 'Listetypeclienteles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Listetypeetablissements'), ['controller' => 'Listetypeetablissements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listetypeetablissement'), ['controller' => 'Listetypeetablissements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="milieudestages form large-9 medium-8 columns content">
    <?= $this->Form->create($milieudestage) ?>
    <fieldset>
        <legend><?= __('Add Milieudestage') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('adresse');
            echo $this->Form->control('ville');
            echo $this->Form->control('province');
            echo $this->Form->control('code_postal');
            echo $this->Form->control('exigence');
            echo $this->Form->control('nom_respo');
            echo $this->Form->control('telephone_respo');
            echo $this->Form->control('fax_respo');
            echo $this->Form->control('courriel_respo');
            echo $this->Form->control('adresse_admin');
            echo $this->Form->control('ville_admin');
            echo $this->Form->control('province_admin');
            echo $this->Form->control('code_postal_admin');
            echo $this->Form->control('region_admin_id', ['options' => $regions]);
            echo $this->Form->control('facilite');
            echo $this->Form->control('tache');
            echo $this->Form->control('remarque');
            echo $this->Form->control('info_solicitation');
            echo $this->Form->control('info_contrat');
            echo $this->Form->control('reponse_milieu');
            echo $this->Form->control('autre_info');
            echo $this->Form->control('date_inv');
            echo $this->Form->control('date_rappel');
            echo $this->Form->control('actif');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
