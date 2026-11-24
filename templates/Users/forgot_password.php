<?php
/**
 * @var \App\View\AppView $this
 * @var string|null $resetUrl
 */
?>
<div class="row">
    <div class="column column-50 column-offset-25 large-4 medium-4 large-offset-4 medium-offset-4 columns">
        <div class="users form content panel">
            <h3 class="text-center"><?= __('Forgot Password') ?></h3>

            <?php if (!empty($resetUrl)): ?>
                <div style="background: #e8f5e9; border: 1px solid #4caf50; border-radius: 4px; padding: 1.5rem; margin-bottom: 2rem; text-align: center;">
                    <h4 style="color: #2e7d32; margin-top: 0; font-weight: bold;"><?= __('Reset Link Ready!') ?></h4>
                    <p style="margin-bottom: 1rem;"><?= __('Click the button below to reset your password:') ?></p>
                    <p>
                        <a href="<?= h($resetUrl) ?>" class="button" style="display: inline-block; padding: 0.8rem 1.6rem; font-weight: bold;">
                            <?= __('Reset Password Now') ?>
                        </a>
                    </p>
                    <p style="margin-bottom: 0;">
                        <small style="word-break: break-all; color: #555;">
                            <?= __('Link:') ?> <a href="<?= h($resetUrl) ?>"><?= h($resetUrl) ?></a>
                        </small>
                    </p>
                </div>
            <?php endif; ?>

            <p><?= __('Enter your account email address below and we will generate a link to reset your password.') ?></p>

            <?= $this->Form->create() ?>
            <fieldset>
                <?= $this->Form->control('email', [
                    'type' => 'email',
                    'label' => __('Email Address'),
                    'required' => true,
                    'placeholder' => 'Enter your registered email',
                ]) ?>
            </fieldset>
            <?= $this->Form->button(__('Generate Reset Link'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>

            <div style="margin-top: 1.2rem; text-align: center;">
                <?= $this->Html->link(__('Back to Login'), ['action' => 'login']) ?>
            </div>
        </div>
    </div>
</div>
