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
        <?php if ($userrole !== "etudiant"): ?>
            <li><?= $this->Html->link(__('Edit Milieudestage'), ['action' => 'edit', $milieudestage->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete Milieudestage'), ['action' => 'delete', $milieudestage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milieudestage->id)]) ?> </li>
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
        <?php if ($userrole === "admin"): ?>
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
        <?php endif; ?>
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
        <h4><?= __('Related Missions') ?></h4>
        <?php if (!empty($milieudestage->missions)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if ($userrole === 'admin'): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Nom') ?></th>
                    <?php if (false): ?>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    <?php endif; ?>
                </tr>
                <?php foreach ($milieudestage->missions as $missions): ?>
                    <tr>
                        <?php if ($userrole === 'admin'): ?>
                            <td><?= h($missions->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($missions->nom) ?></td>
                        <?php if (false): ?>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Missions', 'action' => 'view', $missions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Missions', 'action' => 'edit', $missions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Missions', 'action' => 'delete', $missions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $missions->id)]) ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Typeclienteles') ?></h4>
        <?php if (!empty($milieudestage->typeclienteles)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if ($userrole === 'admin'): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Type') ?></th>
                    <?php if (false): ?>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    <?php endif; ?>
                </tr>
                <?php foreach ($milieudestage->typeclienteles as $typeclienteles): ?>
                    <tr>
                        <?php if ($userrole === 'admin'): ?>
                            <td><?= h($typeclienteles->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($typeclienteles->type) ?></td>
                        <?php if (false): ?>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Typeclienteles', 'action' => 'view', $typeclienteles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Typeclienteles', 'action' => 'edit', $typeclienteles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Typeclienteles', 'action' => 'delete', $typeclienteles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeclienteles->id)]) ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Typeetablissements') ?></h4>
        <?php if (!empty($milieudestage->typeetablissements)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <?php if ($userrole === 'admin'): ?>
                        <th scope="col"><?= __('Id') ?></th>
                    <?php endif; ?>
                    <th scope="col"><?= __('Nom') ?></th>
                    <?php if (false): ?>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    <?php endif; ?>
                </tr>
                <?php foreach ($milieudestage->typeetablissements as $typeetablissements): ?>
                    <tr>
                        <?php if ($userrole === 'admin'): ?>
                            <td><?= h($typeetablissements->id) ?></td>
                        <?php endif; ?>
                        <td><?= h($typeetablissements->nom) ?></td>
                        <?php if (false): ?>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Typeetablissements', 'action' => 'view', $typeetablissements->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Typeetablissements', 'action' => 'edit', $typeetablissements->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Typeetablissements', 'action' => 'delete', $typeetablissements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeetablissements->id)]) ?>
                            </td>
                        <?php endif; ?>
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
                    <?php if ($userrole === "admin"): ?>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Milieudestage Id') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                    <?php endif; ?>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($milieudestage->offres as $offres): ?>
                    <tr>
                        <td><?= h($offres->id) ?></td>
                        <td><?= h($offres->titre) ?></td>
                        <td><?= h($offres->region) ?></td>
                        <td><?= h($offres->tache) ?></td>
                        <td><?= h($offres->responsabilite) ?></td>
                        <?php if ($userrole === "admin"): ?>
                            <td><?= h($offres->milieudestage_id) ?></td>
                            <td><?= h($offres->user_id) ?></td>
                            <td><?= h($offres->milieudestage_id) ?></td>
                            <td><?= h($offres->created) ?></td>
                            <td><?= h($offres->modified) ?></td>
                        <?php endif; ?>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Offres', 'action' => 'view', $offres->id]) ?>
                            <?php if ($userrole !== "etudiant"): ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offres', 'action' => 'edit', $offres->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offres', 'action' => 'delete', $offres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offres->id)]) ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
