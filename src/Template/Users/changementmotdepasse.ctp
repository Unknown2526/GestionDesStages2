<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Modification du mot de passe') ?></legend>
        <?php
            echo $this->Form->control('password', array('label' => 'Mot de passe'));
            echo $this->Form->control('password2', array('type' => 'password', 'label' => 'Confirmer votre mot de passe'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
