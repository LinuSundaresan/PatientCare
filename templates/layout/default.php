<?php
/**
 * PatientCare Modern Healthcare Application Layout
 *
 * @var \App\View\AppView $this
 */

$cakeDescription = 'PatientCare';
$currentController = strtolower((string)$this->getRequest()->getParam('controller'));
$identity = $this->getRequest()->getAttribute('identity');
$userEmail = $identity ? ($identity['email'] ?? $identity->get('email') ?? 'User') : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> - <?= $cakeDescription ?> Medical Portal
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Core Stylesheets -->
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'modern']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>
    <header class="site-header">
        <nav class="top-nav">
            <!-- Brand Logo -->
            <a href="<?= $this->Url->build('/') ?>" class="top-nav-brand">
                <div class="brand-emblem">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <div class="brand-text">
                    Patient<span>Care</span>
                    <span class="brand-badge">PORTAL</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <?php if ($identity): ?>
                <ul class="top-nav-menu">
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa-solid fa-user-injured"></i> ' . __('Patients'),
                            ['controller' => 'Patients', 'action' => 'index'],
                            [
                                'escape' => false,
                                'class' => 'nav-link' . ($currentController === 'patients' ? ' active' : '')
                            ]
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa-solid fa-calendar-check"></i> ' . __('Appointments'),
                            ['controller' => 'Appointments', 'action' => 'index'],
                            [
                                'escape' => false,
                                'class' => 'nav-link' . ($currentController === 'appointments' ? ' active' : '')
                            ]
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa-solid fa-user-doctor"></i> ' . __('Doctors'),
                            ['controller' => 'Doctors', 'action' => 'index'],
                            [
                                'escape' => false,
                                'class' => 'nav-link' . ($currentController === 'doctors' ? ' active' : '')
                            ]
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa-solid fa-shield-halved"></i> ' . __('Carriers'),
                            ['controller' => 'Carriers', 'action' => 'index'],
                            [
                                'escape' => false,
                                'class' => 'nav-link' . ($currentController === 'carriers' ? ' active' : '')
                            ]
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa-solid fa-file-invoice-dollar"></i> ' . __('Invoices'),
                            ['controller' => 'Invoices', 'action' => 'index'],
                            [
                                'escape' => false,
                                'class' => 'nav-link' . ($currentController === 'invoices' ? ' active' : '')
                            ]
                        ) ?>
                    </li>
                </ul>
            <?php endif; ?>

            <!-- User / Auth Actions -->
            <div class="top-nav-auth">
                <?php if ($identity): ?>
                    <span class="user-pill" title="<?= h($userEmail) ?>">
                        <span class="user-avatar-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="user-email-text" style="max-width: 14rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <?= h($userEmail) ?>
                        </span>
                    </span>

                    <?= $this->Html->link(
                        '<i class="fa-solid fa-users-gear"></i> ' . __('Users'),
                        ['controller' => 'Users', 'action' => 'index'],
                        [
                            'escape' => false,
                            'class' => 'btn-nav-action' . ($currentController === 'users' ? ' active' : '')
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        '<i class="fa-solid fa-arrow-right-from-bracket"></i> ' . __('Logout'),
                        ['controller' => 'Users', 'action' => 'logout'],
                        [
                            'escape' => false,
                            'class' => 'btn-nav-logout'
                        ]
                    ) ?>
                <?php else: ?>
                    <?= $this->Html->link(
                        '<i class="fa-solid fa-arrow-right-to-bracket"></i> ' . __('Login'),
                        ['controller' => 'Users', 'action' => 'login'],
                        [
                            'escape' => false,
                            'class' => 'btn-nav-login'
                        ]
                    ) ?>
                <?php endif; ?>

                <!-- Mobile Navigation Toggle -->
                <button type="button" class="mobile-nav-toggle" aria-label="Toggle Navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Menu -->
        <?php if ($identity): ?>
            <div class="mobile-nav-drawer">
                <?= $this->Html->link('<i class="fa-solid fa-user-injured"></i> ' . __('Patients'), ['controller' => 'Patients', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link' . ($currentController === 'patients' ? ' active' : '')]) ?>
                <?= $this->Html->link('<i class="fa-solid fa-calendar-check"></i> ' . __('Appointments'), ['controller' => 'Appointments', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link' . ($currentController === 'appointments' ? ' active' : '')]) ?>
                <?= $this->Html->link('<i class="fa-solid fa-user-doctor"></i> ' . __('Doctors'), ['controller' => 'Doctors', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link' . ($currentController === 'doctors' ? ' active' : '')]) ?>
                <?= $this->Html->link('<i class="fa-solid fa-shield-halved"></i> ' . __('Carriers'), ['controller' => 'Carriers', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link' . ($currentController === 'carriers' ? ' active' : '')]) ?>
                <?= $this->Html->link('<i class="fa-solid fa-file-invoice-dollar"></i> ' . __('Invoices'), ['controller' => 'Invoices', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link' . ($currentController === 'invoices' ? ' active' : '')]) ?>
                <hr style="margin: 1rem 0; border: none; border-top: 1px solid var(--pc-border);">
                <?= $this->Html->link('<i class="fa-solid fa-users-gear"></i> ' . __('Manage Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']) ?>
                <?= $this->Html->link('<i class="fa-solid fa-arrow-right-from-bracket"></i> ' . __('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'nav-link', 'style' => 'color: var(--pc-rose);']) ?>
            </div>
        <?php endif; ?>
    </header>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <i class="fa-solid fa-heart-pulse" style="color: var(--pc-primary);"></i>
                    <span>PatientCare Medical System</span>
                    <span style="color: var(--pc-text-light);">•</span>
                    <span style="font-weight: 500; font-size: 1.25rem;">HIPAA Compliant Healthcare Portal</span>
                </div>
                <div style="display: flex; align-items: center; gap: 1.6rem; flex-wrap: wrap;">
                    <div class="footer-status">
                        <span class="status-dot"></span>
                        <span>System Operational</span>
                    </div>
                    <span>&copy; <?= date('Y') ?> PatientCare Inc. All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>

    <?= $this->Html->script('app') ?>
    <?= $this->fetch('script') ?>
</body>

</html>
