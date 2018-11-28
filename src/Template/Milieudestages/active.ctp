<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milieudestage[]|\Cake\Collection\CollectionInterface $milieudestages
 */
$loguser = $this->request->session()->read('Auth.User');
$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if (false): ?>
            <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <?php if ($userrole === "admin"): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Milieudestage inactive'), ['controller' => 'Milieudestages', 'action' => 'inactive']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?></li>
        <?php if ($userrole !== "etudiant"): ?>
            <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Etudiants'), ['controller' => 'Etudiants', 'action' => 'index']) ?> </li>
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
<div class="milieudestages index large-9 medium-8 columns content">
    <h3><?= __('Milieudestages Active') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adresse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ville') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code_postal') ?></th>
                <?php if (false): ?>
                    <th scope="col"><?= $this->Paginator->sort('nom_respo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('telephone_respo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fax_respo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('courriel_respo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('adresse_admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ville_admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('province_admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('code_postal_admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('region_admin_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('facilite') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('remarque') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('info_solicitation') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('info_contrat') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reponse_milieu') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date_inv') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date_rappel') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                <?php endif; ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($milieudestages as $milieudestage): ?>
                <tr>
                    <?php if (false): ?>
                        <td><?= $this->Number->format($milieudestage->id) ?></td>
                    <?php endif; ?>
                    <td><?= h($milieudestage->nom) ?></td>
                    <td><?= h($milieudestage->adresse) ?></td>
                    <td><?= h($milieudestage->ville) ?></td>
                    <td><?= h($milieudestage->province) ?></td>
                    <td><?= h($milieudestage->code_postal) ?></td>
                    <?php if (false): ?>
                        <td><?= h($milieudestage->nom_respo) ?></td>
                        <td><?= h($milieudestage->telephone_respo) ?></td>
                        <td><?= h($milieudestage->fax_respo) ?></td>
                        <td><?= h($milieudestage->courriel_respo) ?></td>
                        <td><?= h($milieudestage->adresse_admin) ?></td>
                        <td><?= h($milieudestage->ville_admin) ?></td>
                        <td><?= h($milieudestage->province_admin) ?></td>
                        <td><?= h($milieudestage->code_postal_admin) ?></td>
                        <td><?= $milieudestage->has('region') ? $this->Html->link($milieudestage->region->id, ['controller' => 'Regions', 'action' => 'view', $milieudestage->region->id]) : '' ?></td>
                        <td><?= h($milieudestage->facilite) ?></td>
                        <td><?= h($milieudestage->remarque) ?></td>
                        <td><?= h($milieudestage->info_solicitation) ?></td>
                        <td><?= h($milieudestage->info_contrat) ?></td>
                        <td><?= h($milieudestage->reponse_milieu) ?></td>
                        <td><?= h($milieudestage->date_inv) ?></td>
                        <td><?= h($milieudestage->date_rappel) ?></td>
                        <td><?= h($milieudestage->actif) ?></td>
                        <td><?= $milieudestage->has('user') ? $this->Html->link($milieudestage->user->username, ['controller' => 'Users', 'action' => 'view', $milieudestage->user->id]) : '' ?></td>
                        <td><?= h($milieudestage->created) ?></td>
                        <td><?= h($milieudestage->modified) ?></td>
                    <?php endif; ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $milieudestage->id]) ?>
                        <?php if ($userrole === "admin"): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $milieudestage->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $milieudestage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milieudestage->id)]) ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
