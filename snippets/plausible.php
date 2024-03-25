<?php if(option('debug') !== true && !kirby()->user()): ?>
<script defer data-domain="<?= option('floriankarsten.plausible.domain') ?? parse_url($kirby->url('index'))['host'] ?>" src="<?= option('floriankarsten.plausible.scriptHost') ?? 'https://plausible.io' ?>/js/<?= option('floriankarsten.plausible.scriptName') ?? 'plausible' ?>.js"></script>
<?php endif; ?>
