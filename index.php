<?php

Kirby::plugin('floriankarsten/plausible', [
    'api' => [
        'routes' => [
            [
                'pattern' => 'plausible',
                'action'  => function () {
                    return option('floriankarsten.plausible');
                }
            ]
        ]
	],
	'snippets' => [
		'plausible' => __DIR__ . '/snippets/plausible.php'
	]
]);