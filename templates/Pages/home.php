<?php
/**
 * PatientCare Modern Healthcare Medical Dashboard
 *
 * @var \App\View\AppView $this
 */

use Cake\ORM\TableRegistry;

$identity = $this->getRequest()->getAttribute('identity');

// Safe query for dashboard metrics
$patientCount = 0;
$appointmentCount = 0;
$doctorCount = 0;
$carrierCount = 0;
$invoiceCount = 0;

try {
    $patientCount = TableRegistry::getTableLocator()->get('Patients')->find()->count();
    $appointmentCount = TableRegistry::getTableLocator()->get('Appointments')->find()->count();
    $doctorCount = TableRegistry::getTableLocator()->get('Doctors')->find()->count();
    $carrierCount = TableRegistry::getTableLocator()->get('Carriers')->find()->count();
    $invoiceCount = TableRegistry::getTableLocator()->get('Invoices')->find()->count();
} catch (\Throwable $e) {
    // Graceful fallback if database connection or tables are not initialized
}
?>

<div class="dashboard-container">
    <!-- Hero Banner -->
    <div class="dashboard-hero">
        <div style="display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
            <div>
                <?php if ($identity): ?>
                    <span style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255, 255, 255, 0.2); padding: 0.4rem 1.2rem; border-radius: var(--pc-radius-full); font-size: 1.3rem; font-weight: 700; margin-bottom: 1.2rem; letter-spacing: 0.04em;">
                        <i class="fa-solid fa-stethoscope"></i> CLINICAL PORTAL ACTIVE
                    </span>
                    <h1>Welcome, <?= h($identity['name'] ?? $identity['email'] ?? 'Medical Staff') ?></h1>
                    <p>PatientCare Clinical Intelligence & Practice Management System. Monitor patients, schedule appointments, coordinate with insurance carriers, and track billing.</p>
                <?php else: ?>
                    <span style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255, 255, 255, 0.2); padding: 0.4rem 1.2rem; border-radius: var(--pc-radius-full); font-size: 1.3rem; font-weight: 700; margin-bottom: 1.2rem; letter-spacing: 0.04em;">
                        <i class="fa-solid fa-shield-heart"></i> PATIENTCARE HEALTHCARE SUITE
                    </span>
                    <h1>Integrated Medical & Patient Care Portal</h1>
                    <p>Secure, modern electronic healthcare administration. Streamlined patient records, doctor scheduling, insurance claims, and medical invoicing in one unified platform.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="hero-actions">
            <?php if ($identity): ?>
                <?= $this->Html->link(
                    '<i class="fa-solid fa-user-plus"></i> ' . __('New Patient'),
                    ['controller' => 'Patients', 'action' => 'add'],
                    ['escape' => false, 'class' => 'button btn-hero-white']
                ) ?>
                <?= $this->Html->link(
                    '<i class="fa-solid fa-calendar-plus"></i> ' . __('Book Appointment'),
                    ['controller' => 'Appointments', 'action' => 'add'],
                    ['escape' => false, 'class' => 'button btn-hero-ghost']
                ) ?>
                <?= $this->Html->link(
                    '<i class="fa-solid fa-file-invoice"></i> ' . __('Generate Invoice'),
                    ['controller' => 'Invoices', 'action' => 'add'],
                    ['escape' => false, 'class' => 'button btn-hero-ghost']
                ) ?>
            <?php else: ?>
                <?= $this->Html->link(
                    '<i class="fa-solid fa-right-to-bracket"></i> ' . __('Access Medical Portal'),
                    ['controller' => 'Users', 'action' => 'login'],
                    ['escape' => false, 'class' => 'button btn-hero-white']
                ) ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="stats-grid">
        <!-- Patients Card -->
        <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index']) ?>" class="stat-card">
            <div class="stat-card-header">
                <span class="stat-title"><?= __('Patients') ?></span>
                <div class="stat-icon stat-icon-blue">
                    <i class="fa-solid fa-user-injured"></i>
                </div>
            </div>
            <div class="stat-value"><?= number_format($patientCount) ?></div>
            <div class="stat-footer">
                <span>View Patient Records</span>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </a>

        <!-- Appointments Card -->
        <a href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'index']) ?>" class="stat-card">
            <div class="stat-card-header">
                <span class="stat-title"><?= __('Appointments') ?></span>
                <div class="stat-icon stat-icon-teal">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
            <div class="stat-value"><?= number_format($appointmentCount) ?></div>
            <div class="stat-footer">
                <span>Manage Schedule</span>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </a>

        <!-- Doctors Card -->
        <a href="<?= $this->Url->build(['controller' => 'Doctors', 'action' => 'index']) ?>" class="stat-card">
            <div class="stat-card-header">
                <span class="stat-title"><?= __('Doctors') ?></span>
                <div class="stat-icon stat-icon-emerald">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
            </div>
            <div class="stat-value"><?= number_format($doctorCount) ?></div>
            <div class="stat-footer">
                <span>Staff Directory</span>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </a>

        <!-- Carriers Card -->
        <a href="<?= $this->Url->build(['controller' => 'Carriers', 'action' => 'index']) ?>" class="stat-card">
            <div class="stat-card-header">
                <span class="stat-title"><?= __('Insurance Carriers') ?></span>
                <div class="stat-icon stat-icon-amber">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
            </div>
            <div class="stat-value"><?= number_format($carrierCount) ?></div>
            <div class="stat-footer">
                <span>Coverage & Policies</span>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </a>

        <!-- Invoices Card -->
        <a href="<?= $this->Url->build(['controller' => 'Invoices', 'action' => 'index']) ?>" class="stat-card">
            <div class="stat-card-header">
                <span class="stat-title"><?= __('Invoices & Billing') ?></span>
                <div class="stat-icon stat-icon-rose">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
            </div>
            <div class="stat-value"><?= number_format($invoiceCount) ?></div>
            <div class="stat-footer">
                <span>Financial Overview</span>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </a>
    </div>

    <!-- Quick Navigation Modules -->
    <div style="margin-bottom: 2.5rem;">
        <h3 style="font-weight: 800; color: var(--pc-text-heading); margin-bottom: 1.8rem; display: flex; align-items: center; gap: 0.8rem;">
            <i class="fa-solid fa-grip" style="color: var(--pc-primary);"></i>
            <span>Clinical Modules</span>
        </h3>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr)); gap: 2rem;">
            <!-- Module 1: Patient Management -->
            <div class="content" style="padding: 2.4rem !important;">
                <div style="display: flex; align-items: flex-start; gap: 1.6rem; margin-bottom: 1.6rem;">
                    <div style="width: 4.8rem; height: 4.8rem; border-radius: 1.2rem; background: var(--pc-primary-lighter); color: var(--pc-primary); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-hospital-user"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.4rem 0; font-weight: 700;">Patient Records</h4>
                        <p style="margin: 0; color: var(--pc-text-muted); font-size: 1.35rem;">Manage complete patient demographic data, contact information, insurance linking, and medical history.</p>
                    </div>
                </div>
                <div style="display: flex; gap: 0.8rem;">
                    <?= $this->Html->link(__('View All Patients'), ['controller' => 'Patients', 'action' => 'index'], ['class' => 'button btn-sm']) ?>
                    <?= $this->Html->link(__('Register Patient'), ['controller' => 'Patients', 'action' => 'add'], ['class' => 'button button-outline btn-sm']) ?>
                </div>
            </div>

            <!-- Module 2: Appointment Scheduler -->
            <div class="content" style="padding: 2.4rem !important;">
                <div style="display: flex; align-items: flex-start; gap: 1.6rem; margin-bottom: 1.6rem;">
                    <div style="width: 4.8rem; height: 4.8rem; border-radius: 1.2rem; background: var(--pc-teal-light); color: var(--pc-teal); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.4rem 0; font-weight: 700;">Appointment Scheduler</h4>
                        <p style="margin: 0; color: var(--pc-text-muted); font-size: 1.35rem;">Coordinate patient consultation times, assign medical practitioners, and manage clinic calendar flow.</p>
                    </div>
                </div>
                <div style="display: flex; gap: 0.8rem;">
                    <?= $this->Html->link(__('View Schedule'), ['controller' => 'Appointments', 'action' => 'index'], ['class' => 'button btn-sm']) ?>
                    <?= $this->Html->link(__('Book Visit'), ['controller' => 'Appointments', 'action' => 'add'], ['class' => 'button button-outline btn-sm']) ?>
                </div>
            </div>

            <!-- Module 3: Medical Doctors -->
            <div class="content" style="padding: 2.4rem !important;">
                <div style="display: flex; align-items: flex-start; gap: 1.6rem; margin-bottom: 1.6rem;">
                    <div style="width: 4.8rem; height: 4.8rem; border-radius: 1.2rem; background: var(--pc-emerald-light); color: var(--pc-emerald); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-user-md"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.4rem 0; font-weight: 700;">Physicians & Staff</h4>
                        <p style="margin: 0; color: var(--pc-text-muted); font-size: 1.35rem;">Staff roster, clinical availability status, patient intake capacity, and doctor appointment tracking.</p>
                    </div>
                </div>
                <div style="display: flex; gap: 0.8rem;">
                    <?= $this->Html->link(__('Doctor Directory'), ['controller' => 'Doctors', 'action' => 'index'], ['class' => 'button btn-sm']) ?>
                    <?= $this->Html->link(__('Add Doctor'), ['controller' => 'Doctors', 'action' => 'add'], ['class' => 'button button-outline btn-sm']) ?>
                </div>
            </div>

            <!-- Module 4: Insurance Carriers -->
            <div class="content" style="padding: 2.4rem !important;">
                <div style="display: flex; align-items: flex-start; gap: 1.6rem; margin-bottom: 1.6rem;">
                    <div style="width: 4.8rem; height: 4.8rem; border-radius: 1.2rem; background: var(--pc-amber-light); color: var(--pc-amber); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-building-shield"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.4rem 0; font-weight: 700;">Insurance Carriers</h4>
                        <p style="margin: 0; color: var(--pc-text-muted); font-size: 1.35rem;">Maintain approved health insurance carriers, plan codes, policy details, and claim linkages.</p>
                    </div>
                </div>
                <div style="display: flex; gap: 0.8rem;">
                    <?= $this->Html->link(__('Carrier List'), ['controller' => 'Carriers', 'action' => 'index'], ['class' => 'button btn-sm']) ?>
                    <?= $this->Html->link(__('Add Carrier'), ['controller' => 'Carriers', 'action' => 'add'], ['class' => 'button button-outline btn-sm']) ?>
                </div>
            </div>

            <!-- Module 5: Billing & Invoicing -->
            <div class="content" style="padding: 2.4rem !important;">
                <div style="display: flex; align-items: flex-start; gap: 1.6rem; margin-bottom: 1.6rem;">
                    <div style="width: 4.8rem; height: 4.8rem; border-radius: 1.2rem; background: var(--pc-rose-light); color: var(--pc-rose); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.4rem 0; font-weight: 700;">Invoices & Billing</h4>
                        <p style="margin: 0; color: var(--pc-text-muted); font-size: 1.35rem;">Generate itemized patient invoices for consultations, procedures, due dates, and settlement tracking.</p>
                    </div>
                </div>
                <div style="display: flex; gap: 0.8rem;">
                    <?= $this->Html->link(__('Manage Invoices'), ['controller' => 'Invoices', 'action' => 'index'], ['class' => 'button btn-sm']) ?>
                    <?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add'], ['class' => 'button button-outline btn-sm']) ?>
                </div>
            </div>

            <!-- Module 6: User Security -->
            <div class="content" style="padding: 2.4rem !important;">
                <div style="display: flex; align-items: flex-start; gap: 1.6rem; margin-bottom: 1.6rem;">
                    <div style="width: 4.8rem; height: 4.8rem; border-radius: 1.2rem; background: var(--pc-surface-subtle); color: var(--pc-text-body); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.4rem 0; font-weight: 700;">User Administration</h4>
                        <p style="margin: 0; color: var(--pc-text-muted); font-size: 1.35rem;">Manage hospital staff credentials, portal users, secure password resets, and access rights.</p>
                    </div>
                </div>
                <div style="display: flex; gap: 0.8rem;">
                    <?= $this->Html->link(__('Manage Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'button btn-sm']) ?>
                    <?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'button button-outline btn-sm']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
