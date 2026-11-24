<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');">
    <i class="fa-solid fa-bell" style="font-size: 1.8rem; color: var(--pc-primary);"></i>
    <span style="flex: 1;"><?= $message ?></span>
</div>
