# Kirby Plausible
Simple plugin providing plausible iframe panel view to kirby panel and simple frontend snippet.

## How to use
1. Create a shared link https://plausible.io/docs/shared-links
2. Set `floriankarsten.plausible.shareLink` in config.php

There is also `floriankarsten.plausible.domain` which allows you to overwrite `data-domain` in the frontend snippet.

config.php example
```php
'floriankarsten.plausible' => [
	'sharedLink' => 'https://plausible.io/share/yourwebsiteurl.com?auth=Jz0mCWTPu5opXi0sAgRrq',
	'domain' => 'test.com' // not required if not set it will be taken from $site->url
];
```

Frontend snippet place iside head tag. Automatically disabled when kirby is in debug mode.
```php
<?php snippet('plausible'); ?>
```

This plugin wouldn't happen without [@garethworld](https://github.com/garethworld) who kindly payed me for it and then wanted to have it released to Kirby community.
