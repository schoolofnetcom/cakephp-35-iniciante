<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" style="background-color: yellow" onclick="this.classList.add('hidden')"><?= $message ?></div>
