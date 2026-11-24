<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string $token
 */
?>
<div class="row">
    <div class="column column-50 column-offset-25 large-4 medium-4 large-offset-4 medium-offset-4 columns">
        <div class="users form content panel">
            <h3 class="text-center"><?= __('Reset Password') ?></h3>
            <p><?= __('Please enter your new password.') ?></p>

            <?= $this->Form->create($user, ['type' => 'post']) ?>
            <fieldset>
                <?= $this->Form->control('password', [
                    'type' => 'password',
                    'label' => __('New Password'),
                    'required' => true,
                    'value' => '',
                    'placeholder' => 'Enter new password (min. 6 characters)',
                ]) ?>
                <?= $this->Form->control('confirm_password', [
                    'type' => 'password',
                    'label' => __('Confirm New Password'),
                    'required' => true,
                    'value' => '',
                    'placeholder' => 'Re-enter new password',
                ]) ?>
            </fieldset>
            <?= $this->Form->button(__('Reset Password'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>

            <div style="margin-top: 1.2rem; text-align: center;">
                <?= $this->Html->link(__('Back to Login'), ['action' => 'login']) ?>
            </div>
        </div>
    </div>
</div>
