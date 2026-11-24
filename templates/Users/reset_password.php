<?php
/**
 * PatientCare Modern Reset Password View
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string $token
 */
?>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-emblem">
                <i class="fa-solid fa-lock-open"></i>
            </div>
            <h2 class="auth-title"><?= __('New Password') ?></h2>
            <p class="auth-subtitle"><?= __('Create a strong new password for your account.') ?></p>
        </div>

        <?= $this->Form->create($user, ['type' => 'post']) ?>
        <div class="input">
            <label for="password">
                <i class="fa-solid fa-lock" style="color: var(--pc-text-muted); margin-right: 0.4rem;"></i>
                <?= __('New Password') ?>
            </label>
            <?= $this->Form->control('password', [
                'type' => 'password',
                'label' => false,
                'required' => true,
                'value' => '',
                'placeholder' => 'Min. 6 characters',
                'autofocus' => true,
            ]) ?>
        </div>

        <div class="input">
            <label for="confirm-password">
                <i class="fa-solid fa-shield-check" style="color: var(--pc-text-muted); margin-right: 0.4rem;"></i>
                <?= __('Confirm New Password') ?>
            </label>
            <?= $this->Form->control('confirm_password', [
                'type' => 'password',
                'label' => false,
                'required' => true,
                'value' => '',
                'placeholder' => 'Re-enter your password',
            ]) ?>
        </div>

        <div style="margin-top: 2.4rem;">
            <?= $this->Form->button(
                '<i class="fa-solid fa-check"></i> ' . __('Update Password'),
                ['class' => 'button', 'style' => 'width: 100%;', 'escapeTitle' => false]
            ) ?>
        </div>
        <?= $this->Form->end() ?>

        <div class="auth-footer">
            <?= $this->Html->link(
                '<i class="fa-solid fa-arrow-left"></i> ' . __('Back to Login'),
                ['action' => 'login'],
                ['escape' => false]
            ) ?>
        </div>
    </div>
</div>
