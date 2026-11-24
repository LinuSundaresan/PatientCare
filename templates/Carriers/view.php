<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrier $carrier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Carrier'), ['action' => 'edit', $carrier->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Carrier'), ['action' => 'delete', $carrier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrier->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carriers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Carrier'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="carriers view content">
            <h3><?= h($carrier->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($carrier->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Carrier Code') ?></th>
                    <td><?= h($carrier->carrier_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carrier->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($carrier->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modefied') ?></th>
                    <td><?= h($carrier->modefied) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Patients') ?></h4>
                <?php if (!empty($carrier->patients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Street Address') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Zipcode') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($carrier->patients as $patient) : ?>
                        <tr>
                            <td><?= h($patient->id) ?></td>
                            <td><?= h($patient->name) ?></td>
                            <td><?= h($patient->street_address) ?></td>
                            <td><?= h($patient->city) ?></td>
                            <td><?= h($patient->state) ?></td>
                            <td><?= h($patient->zipcode) ?></td>
                            <td><?= h($patient->email) ?></td>
                            <td><?= h($patient->phone) ?></td>
                            <td><?= h($patient->created) ?></td>
                            <td><?= h($patient->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patient->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Patients', 'action' => 'delete', $patient->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $patient->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>