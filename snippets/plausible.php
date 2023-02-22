<?php if(option('debug') !== true && !kirby()->user()): ?>
<script defer data-domain="<?= option('floriankarsten.plausible.domain') ?? parse_url($kirby->url('index'))['host'] ?>" src="https://plausible.io/js/plausible.js"></script>
<?php endif; ?>
