<?php
/**
 * PatientCare Modern Login View
 *
 * @var \App\View\AppView $this
 */
?>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-emblem">
                <i class="fa-solid fa-heart-pulse"></i>
            </div>
            <h2 class="auth-title"><?= __('Welcome Back') ?></h2>
            <p class="auth-subtitle"><?= __('Enter your credentials to access the PatientCare Medical Portal.') ?></p>
        </div>

        <?= $this->Form->create() ?>
        <div class="input">
            <label for="email">
                <i class="fa-solid fa-envelope" style="color: var(--pc-text-muted); margin-right: 0.4rem;"></i>
                <?= __('Email Address') ?>
            </label>
            <?= $this->Form->control('email', [
                'type' => 'email',
                'required' => true,
                'placeholder' => 'name@hospital.com',
                'label' => false,
                'autofocus' => true,
            ]) ?>
        </div>

        <div class="input">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.7rem;">
                <label for="password" style="margin-bottom: 0;">
                    <i class="fa-solid fa-lock" style="color: var(--pc-text-muted); margin-right: 0.4rem;"></i>
                    <?= __('Password') ?>
                </label>
                <?= $this->Html->link(__('Forgot?'), ['action' => 'forgotPassword'], [
                    'style' => 'font-size: 1.25rem; font-weight: 600;'
                ]) ?>
            </div>
            <?= $this->Form->control('password', [
                'type' => 'password',
                'required' => true,
                'placeholder' => '••••••••',
                'label' => false,
            ]) ?>
        </div>

        <div style="margin-top: 2.4rem;">
            <?= $this->Form->button(
                '<i class="fa-solid fa-right-to-bracket"></i> ' . __('Sign In to Portal'),
                ['class' => 'button', 'style' => 'width: 100%;', 'escapeTitle' => false]
            ) ?>
        </div>
        <?= $this->Form->end() ?>

        <div class="auth-security-badge">
            <i class="fa-solid fa-shield-halved" style="color: var(--pc-emerald);"></i>
            <span>HIPAA Compliant & Encrypted Session</span>
        </div>
    </div>
</div>
