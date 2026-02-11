<?php
    $isDebugging = option('debug') === true;
    $isLoggedIn = kirby()->user() !== null;
    if ($isDebugging || $isLoggedIn) {
        return; // disable tracking for logged in users and when debugging is enabled
    }

    $scriptUrl = option('floriankarsten.plausible.scriptUrl');
    $proxyEnabled = option('floriankarsten.plausible.proxy.enabled', false);
    if ($proxyEnabled) {
        $scriptUrl = url('plausible/script.js');
    }
?>
<!-- Plausible Analytics -->
<script async src="<?= $scriptUrl ?>"></script>
<script>
    window.plausible=window.plausible||function(){(plausible.q=plausible.q||[]).push(arguments)},plausible.init=plausible.init||function(i){plausible.o=i||{}};
    plausible.init({
        <?php if ($proxyEnabled): ?>
            endpoint: "/plausible/event"
        <?php endif; ?>
    })
</script>