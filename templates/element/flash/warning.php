<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message warning" onclick="this.classList.add('hidden');">
    <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.8rem; color: var(--pc-amber);"></i>
    <span style="flex: 1;"><?= $message ?></span>
</div>
