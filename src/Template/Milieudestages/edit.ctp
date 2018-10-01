<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milieudestage $milieudestage
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
                        __('Delete'), ['action' => 'delete', $milieudestage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milieudestage->id)]
                )
                ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Milieudestages'), ['action' => 'index']) ?></li>
        <?php if (false): ?>
            <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?></li>
        <?php if ($userrole !== "etudiant"): ?>
            <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <?php if (false): ?>
            <li><?= $this->Html->link(__('List Listemissions'), ['controller' => 'Listemissions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Listemission'), ['controller' => 'Listemissions', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Listetypeclienteles'), ['controller' => 'Listetypeclienteles', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Listetypeclientele'), ['controller' => 'Listetypeclienteles', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Listetypeetablissements'), ['controller' => 'Listetypeetablissements', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Listetypeetablissement'), ['controller' => 'Listetypeetablissements', 'action' => 'add']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="milieudestages form large-9 medium-8 columns content">
    <?= $this->Form->create($milieudestage) ?>
    <fieldset>
        <legend><?= __('Edit Milieudestage') ?></legend>
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
        echo $this->Form->control('region_admin_id', ['options' => $regions, 'empty' => true]);
        echo $this->Form->control('facilite');
        echo $this->Form->control('tache');
        echo $this->Form->control('remarque');
        echo $this->Form->control('info_solicitation');
        echo $this->Form->control('info_contrat');
        echo $this->Form->control('reponse_milieu');
        echo $this->Form->control('autre_info');
        echo $this->Form->control('date_inv', ['empty' => true]);
        echo $this->Form->control('date_rappel', ['empty' => true]);
        echo $this->Form->control('actif');
        echo ($userrole === "admin") ? $this->Form->control('user_id', ['options' => $users]) : $this->Form->hidden('user_id');
        echo $this->Form->control('missions._ids', ['options' => $missions, 'multiple' => 'checkbox']);
        echo $this->Form->control('typeclienteles._ids', ['options' => $typeclienteles, 'multiple' => 'checkbox']);
        echo $this->Form->control('typeetablissements._ids', ['options' => $typeetablissements, 'multiple' => 'checkbox']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
