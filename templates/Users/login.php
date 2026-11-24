<div class="row">
    <div class="column column-50 column-offset-25 large-4 medium-4 large-offset-4 medium-offset-4 columns">
        <div class="users form content panel">
            <h3 class="text-center"><?= __('Login') ?></h3>

            <?= $this->Form->create() ?>
            <fieldset>
                <?= $this->Form->control('email', ['type' => 'email', 'required' => true]) ?>
                <?= $this->Form->control('password', ['type' => 'password', 'required' => true]) ?>
            </fieldset>
            <?= $this->Form->button(__('Login'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>

            <div style="margin-top: 1.2rem; text-align: center;">
                <?= $this->Html->link(__('Forgot Password?'), ['action' => 'forgotPassword']) ?>
            </div>
        </div>
    </div>
</div>
