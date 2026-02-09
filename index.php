<?php

use Kirby\Cms\App as Kirby;
use Kirby\Http\Remote;
use Kirby\Http\Response;

Kirby::plugin('floriankarsten/plausible', [
    'areas' => [
        'plausible' => function ($kirby) {
            return [
                'label' => 'Analytics',
                'icon' => 'chart',
                'disabled' => false,
                'menu' => true,
                'link' => 'plausible',
                'views' => [
                    [
                        'pattern' => 'plausible',
                        'action'  => function () use ($kirby) {
                            return [
                                'component' => 'k-plausible-view',
                                'title' => 'Analytics',
                                'props' => [
                                    'sharedLink' => $kirby->option('floriankarsten.plausible.sharedLink')
                                ],
                            ];
                        }
                    ]
                ]
            ];
        }
    ],
    'routes' => function ($kirby) {
        return [
            [
                'pattern' => 'plausible/script.js',
                'method' => 'GET',
                'action'  => function () use ($kirby) {
                    if (!$kirby->option('floriankarsten.plausible.proxy.enabled', false)) {
                        return new Response('Proxying is disabled.', 'text/plain', 500);
                    }
                    $scriptUrl = $kirby->option('floriankarsten.plausible.scriptUrl');
                    if (!$scriptUrl) {
                        return new Response('Plausible script URL not configured.', 'text/plain', 500);
                    }
                    $cacheMinutes = $kirby->option('floriankarsten.plausible.proxy.cache', 60 * 24); // default to 24 hours
                    $script = $kirby->cache('floriankarsten.plausible')->getOrSet('script', function () use ($scriptUrl) {
                        $response = Remote::get($scriptUrl);
                        if ($response->code() === 200) {
                            return $response->content();
                        }
                        return null;
                    }, $cacheMinutes);
                    return new Response($script, 'application/javascript', 200, [
                        'Cache-Control' => 'public, max-age=' . ($cacheMinutes * 60),
                    ]);
                }
            ],
            [
                'pattern' => 'plausible/event',
                'method' => 'POST',
                'action'  => function () use ($kirby) {
                    if (!$kirby->option('floriankarsten.plausible.proxy.enabled', false)) {
                        return new Response('Proxying is disabled.', 'text/plain', 500);
                    }
                    $request = $kirby->request();
                    $visitor = $kirby->visitor();
                    $scriptHost = $kirby->option('floriankarsten.plausible.proxy.plausibleEndpoint', 'https://plausible.io');
                    $plausibleEndpoint = rtrim($scriptHost, '/') . '/api/event';
                    $response = Remote::request($plausibleEndpoint, [
                        'method' => 'POST',
                        'agent' => $visitor->userAgent(),
                        'headers' => [
                            'X-Forwarded-For' => $visitor->ip(),
                            'Content-Type' => 'text/plain',
                        ],
                        'data' => $request->body()->contents(),
                    ]);
                    return new Response($response->content(), 'application/json', $response->code());
                }
            ],
        ];
    },
    'snippets' => [
        'plausible' => __DIR__ . '/snippets/plausible.php'
    ]
]);
