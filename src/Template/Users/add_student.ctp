<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Create new account') ?></legend>
        <?php
        echo $this->Form->control('username');
        echo $this->Form->control('password');
<<<<<<< HEAD
        echo $this->Form->control('file_id', ['options' => $files, 'empty' => true]);
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
