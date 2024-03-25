# Kirby Plausible
Simple plugin providing plausible iframe panel view to kirby panel and simple frontend snippet.

![CleanShot 2021-11-04 at 17 53 43](https://user-images.githubusercontent.com/4954323/140384031-efdf83d7-06a3-4ce3-a60b-3827fe63fd9c.png)
## Instalation
`composer require  floriankarsten/kirby-plausible`
or download from releases

## How to use
1. Create a shared link https://plausible.io/docs/shared-links
2. Set `floriankarsten.plausible.sharedLink` in config.php

There is also `floriankarsten.plausible.domain` which allows you to overwrite `data-domain` in the frontend snippet.

`config.php` example
```php
'floriankarsten.plausible' => [
	'sharedLink' => 'https://plausible.io/share/yourwebsiteurl.com?auth=Jz0mCWTPu5opXi0sAgRrq',
	'domain' => 'test.com', // not required if not set it will be taken from $site->url
	// To use a self-hosted Plausible instance
	//'scriptHost' => 'https://plausible.example.com',
	// To use Plausible script extensions
	//'scriptName' => 'plausible.outbound-links.exclusions'
];
```

Frontend snippet place iside head tag. Automatically disabled when kirby is in debug mode.
```php
<?php snippet('plausible'); ?>
```

This plugin wouldn't happen without [@garethworld](https://github.com/garethworld) who kindly hired me to make it and then wanted to have it released to Kirby community. Yaaaaay
