<?php if(option('debug') === false): ?>
<script async defer data-domain="<?= option('floriankarsten.plausible.domain') ?? parse_url($kirby->url('index'))['host'] ?>" src="https://plausible.io/js/plausible.js"></script>
<?php endif; ?>