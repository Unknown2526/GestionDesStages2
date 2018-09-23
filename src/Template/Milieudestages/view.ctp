<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milieudestage $milieudestage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Milieudestage'), ['action' => 'edit', $milieudestage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Milieudestage'), ['action' => 'delete', $milieudestage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milieudestage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Milieudestages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milieudestage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listemissions'), ['controller' => 'Listemissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listemission'), ['controller' => 'Listemissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listetypeclienteles'), ['controller' => 'Listetypeclienteles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listetypeclientele'), ['controller' => 'Listetypeclienteles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listetypeetablissements'), ['controller' => 'Listetypeetablissements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listetypeetablissement'), ['controller' => 'Listetypeetablissements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="milieudestages view large-9 medium-8 columns content">
    <h3><?= h($milieudestage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($milieudestage->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($milieudestage->adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= h($milieudestage->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($milieudestage->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code Postal') ?></th>
            <td><?= h($milieudestage->code_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom Respo') ?></th>
            <td><?= h($milieudestage->nom_respo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone Respo') ?></th>
            <td><?= h($milieudestage->telephone_respo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax Respo') ?></th>
            <td><?= h($milieudestage->fax_respo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courriel Respo') ?></th>
            <td><?= h($milieudestage->courriel_respo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse Admin') ?></th>
            <td><?= h($milieudestage->adresse_admin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville Admin') ?></th>
            <td><?= h($milieudestage->ville_admin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province Admin') ?></th>
            <td><?= h($milieudestage->province_admin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code Postal Admin') ?></th>
            <td><?= h($milieudestage->code_postal_admin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $milieudestage->has('region') ? $this->Html->link($milieudestage->region->id, ['controller' => 'Regions', 'action' => 'view', $milieudestage->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facilite') ?></th>
            <td><?= h($milieudestage->facilite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarque') ?></th>
            <td><?= h($milieudestage->remarque) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info Solicitation') ?></th>
            <td><?= h($milieudestage->info_solicitation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info Contrat') ?></th>
            <td><?= h($milieudestage->info_contrat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reponse Milieu') ?></th>
            <td><?= h($milieudestage->reponse_milieu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $milieudestage->has('user') ? $this->Html->link($milieudestage->user->id, ['controller' => 'Users', 'action' => 'view', $milieudestage->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($milieudestage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Inv') ?></th>
            <td><?= h($milieudestage->date_inv) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Rappel') ?></th>
            <td><?= h($milieudestage->date_rappel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($milieudestage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($milieudestage->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $milieudestage->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Exigence') ?></h4>
        <?= $this->Text->autoParagraph(h($milieudestage->exigence)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tache') ?></h4>
        <?= $this->Text->autoParagraph(h($milieudestage->tache)); ?>
    </div>
    <div class="row">
        <h4><?= __('Autre Info') ?></h4>
        <?= $this->Text->autoParagraph(h($milieudestage->autre_info)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Listemissions') ?></h4>
        <?php if (!empty($milieudestage->listemissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Milieudestage Id') ?></th>
                <th scope="col"><?= __('Mission Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($milieudestage->listemissions as $listemissions): ?>
            <tr>
                <td><?= h($listemissions->milieudestage_id) ?></td>
                <td><?= h($listemissions->mission_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Listemissions', 'action' => 'view', $listemissions->milieudestage_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Listemissions', 'action' => 'edit', $listemissions->milieudestage_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Listemissions', 'action' => 'delete', $listemissions->milieudestage_id], ['confirm' => __('Are you sure you want to delete # {0}?', $listemissions->milieudestage_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Listetypeclienteles') ?></h4>
        <?php if (!empty($milieudestage->listetypeclienteles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Milieudestage Id') ?></th>
                <th scope="col"><?= __('Typeclientele Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($milieudestage->listetypeclienteles as $listetypeclienteles): ?>
            <tr>
                <td><?= h($listetypeclienteles->milieudestage_id) ?></td>
                <td><?= h($listetypeclienteles->typeclientele_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Listetypeclienteles', 'action' => 'view', $listetypeclienteles->milieudestage_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Listetypeclienteles', 'action' => 'edit', $listetypeclienteles->milieudestage_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Listetypeclienteles', 'action' => 'delete', $listetypeclienteles->milieudestage_id], ['confirm' => __('Are you sure you want to delete # {0}?', $listetypeclienteles->milieudestage_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Listetypeetablissements') ?></h4>
        <?php if (!empty($milieudestage->listetypeetablissements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Milieudestage Id') ?></th>
                <th scope="col"><?= __('Typeetablissement Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($milieudestage->listetypeetablissements as $listetypeetablissements): ?>
            <tr>
                <td><?= h($listetypeetablissements->milieudestage_id) ?></td>
                <td><?= h($listetypeetablissements->typeetablissement_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Listetypeetablissements', 'action' => 'view', $listetypeetablissements->milieudestage_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Listetypeetablissements', 'action' => 'edit', $listetypeetablissements->milieudestage_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Listetypeetablissements', 'action' => 'delete', $listetypeetablissements->milieudestage_id], ['confirm' => __('Are you sure you want to delete # {0}?', $listetypeetablissements->milieudestage_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Offres') ?></h4>
        <?php if (!empty($milieudestage->offres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Region') ?></th>
                <th scope="col"><?= __('Tache') ?></th>
                <th scope="col"><?= __('Responsabilite') ?></th>
                <th scope="col"><?= __('Milieudestage Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($milieudestage->offres as $offres): ?>
            <tr>
                <td><?= h($offres->id) ?></td>
                <td><?= h($offres->titre) ?></td>
                <td><?= h($offres->region) ?></td>
                <td><?= h($offres->tache) ?></td>
                <td><?= h($offres->responsabilite) ?></td>
                <td><?= h($offres->milieudestage_id) ?></td>
                <td><?= h($offres->created) ?></td>
                <td><?= h($offres->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Offres', 'action' => 'view', $offres->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Offres', 'action' => 'edit', $offres->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offres', 'action' => 'delete', $offres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offres->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
