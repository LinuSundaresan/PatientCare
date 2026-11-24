<?php
/**
 * PatientCare Modern Error Layout
 *
 * @var \App\View\AppView $this
 */

$cakeDescription = 'PatientCare';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> - <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'modern']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 3rem 1.6rem; background: var(--pc-bg);">
        <div style="max-width: 60rem; width: 100%; text-align: center; background: #ffffff; border: 1px solid var(--pc-border); border-radius: var(--pc-radius-xl); padding: 4rem; box-shadow: var(--pc-shadow-xl);">
            <div style="width: 7rem; height: 7rem; border-radius: 50%; background: var(--pc-rose-light); color: var(--pc-rose); display: inline-flex; align-items: center; justify-content: center; font-size: 3rem; margin-bottom: 2rem;">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <?= $this->Flash->render() ?>
            <div style="margin-bottom: 2.5rem;">
                <?= $this->fetch('content') ?>
            </div>
            <div>
                <?= $this->Html->link(
                    '<i class="fa-solid fa-house"></i> ' . __('Return to Home'),
                    '/',
                    ['escape' => false, 'class' => 'button']
                ) ?>
                <?= $this->Html->link(
                    '<i class="fa-solid fa-arrow-left"></i> ' . __('Go Back'),
                    'javascript:history.back()',
                    ['escape' => false, 'class' => 'button button-outline', 'style' => 'margin-left: 1rem;']
                ) ?>
            </div>
        </div>
    </div>
</body>

</html>
