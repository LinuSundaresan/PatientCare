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
<div class="message error" onclick="this.classList.add('hidden');">
    <i class="fa-solid fa-circle-exclamation" style="font-size: 1.8rem; color: var(--pc-rose);"></i>
    <span style="flex: 1;"><?= $message ?></span>
</div>
