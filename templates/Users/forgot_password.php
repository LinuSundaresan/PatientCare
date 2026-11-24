<?php
/**
 * PatientCare Modern Forgot Password View
 *
 * @var \App\View\AppView $this
 * @var string|null $resetUrl
 */
?>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-emblem" style="background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%);">
                <i class="fa-solid fa-key"></i>
            </div>
            <h2 class="auth-title"><?= __('Reset Password') ?></h2>
            <p class="auth-subtitle"><?= __('Enter your registered email address and we will generate a secure reset link.') ?></p>
        </div>

        <?php if (!empty($resetUrl)): ?>
            <div style="background: var(--pc-emerald-light); border: 1.5px solid var(--pc-emerald-border); border-radius: var(--pc-radius); padding: 2rem; margin-bottom: 2.4rem; text-align: center;">
                <div style="color: var(--pc-emerald-dark); font-size: 2rem; margin-bottom: 0.6rem;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <h4 style="color: var(--pc-emerald-dark); margin: 0 0 0.6rem 0; font-weight: 700;"><?= __('Reset Link Ready!') ?></h4>
                <p style="margin-bottom: 1.4rem; font-size: 1.35rem; color: var(--pc-emerald-dark);"><?= __('Click the button below to proceed to password reset:') ?></p>
                <p style="margin-bottom: 1.2rem;">
                    <a href="<?= h($resetUrl) ?>" class="button" style="display: inline-flex; font-weight: 700;">
                        <i class="fa-solid fa-unlock-keyhole"></i>
                        <?= __('Reset Password Now') ?>
                    </a>
                </p>
                <p style="margin-bottom: 0;">
                    <small style="word-break: break-all; color: var(--pc-text-muted);">
                        <?= __('Direct link:') ?> <a href="<?= h($resetUrl) ?>" style="color: var(--pc-primary);"><?= h($resetUrl) ?></a>
                    </small>
                </p>
            </div>
        <?php endif; ?>

        <?= $this->Form->create() ?>
        <div class="input">
            <label for="email">
                <i class="fa-solid fa-envelope" style="color: var(--pc-text-muted); margin-right: 0.4rem;"></i>
                <?= __('Registered Account Email') ?>
            </label>
            <?= $this->Form->control('email', [
                'type' => 'email',
                'label' => false,
                'required' => true,
                'placeholder' => 'name@hospital.com',
                'autofocus' => true,
            ]) ?>
        </div>

        <div style="margin-top: 2.4rem;">
            <?= $this->Form->button(
                '<i class="fa-solid fa-paper-plane"></i> ' . __('Generate Reset Link'),
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
