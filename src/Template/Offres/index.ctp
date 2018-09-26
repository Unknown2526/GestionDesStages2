<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offre[]|\Cake\Collection\CollectionInterface $offres
 */
$loguser = $this->request->session()->read('Auth.User');
$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole !== "etudiant"){echo $this->Html->link(__('New Offre'), ['action' => 'add']);}?></li>
        <li><?= $this->Html->link(__('List Milieudestages'), ['controller' => 'Milieudestages', 'action' => 'index']) ?></li>
        <li><?php if($userrole === "admin"){echo $this->Html->link(__('New Milieudestage'), ['controller' => 'Milieudestages', 'action' => 'add']);}?></li>
    </ul>
</nav>
<div class="offres index large-9 medium-8 columns content">
    <h3><?= __('Offres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tache') ?></th>
                <th scope="col"><?= $this->Paginator->sort('responsabilite') ?></th>
                <?php if($userrole === "admin"): ?>
                    <th scope="col"><?= $this->Paginator->sort('milieudestage_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <?php endif; ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offres as $offre): ?>
            <tr>
                <td><?= $this->Number->format($offre->id) ?></td>
                <td><?= h($offre->titre) ?></td>
                <td><?= h($offre->region) ?></td>
                <td><?= h($offre->tache) ?></td>
                <td><?= h($offre->responsabilite) ?></td>
                <?php if($userrole === "admin"): ?>
                    <td><?= $offre->has('milieudestage') ? $this->Html->link($offre->milieudestage->id, ['controller' => 'Milieudestages', 'action' => 'view', $offre->milieudestage->id]) : '' ?></td>
                    <td><?= h($offre->created) ?></td>
                    <td><?= h($offre->modified) ?></td>
                <?php endif; ?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $offre->id]) ?>
                    <?php if($userrole === "admin"){echo $this->Html->link(__('Edit'), ['action' => 'edit', $offre->id]);}?>
                    <?php if($userrole === "admin"){echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $offre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offre->id)]);}?>
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
