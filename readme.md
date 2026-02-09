# Kirby Plausible
Simple plugin providing Plausible tracking and iframe panel view to Kirby panel.

![CleanShot 2021-11-04 at 17 53 43](https://user-images.githubusercontent.com/4954323/140384031-efdf83d7-06a3-4ce3-a60b-3827fe63fd9c.png)

## Installation

`composer require floriankarsten/kirby-plausible`
or download from [releases](https://github.com/floriankarsten/kirby-plausible/releases)

## How to use

1. Create a shared link https://plausible.io/docs/shared-links
1. Set `floriankarsten.plausible.sharedLink` in config.php
    ```php
    // config/config.php
    'floriankarsten.plausible' => [
        // Required
        'scriptUrl' => 'https://plausible.io/js/XYZ.js', // replace with the URL of the Plausible site you want to use

        // Required
        'sharedLink' => 'https://plausible.io/share/yourwebsiteurl.com?auth=Jz0mCWTPu5opXi0sAgRrq',

        // Optional: To proxy Plausible through your own server (helps avoid ad blockers)
        // 'proxy' => [
            // 'enabled' => true,
            // 'cache' => 60 * 24, // 24 hours, optional
            // 'plausibleEndpoint' => 'https://plausible.io', // customize the Plausible instance when self-hosting, optional
        // ]
    ];
    ```
1. Add the following snippet inside your site's `<head>` tag. Note that this will not generate any output for logged in users or when Kirby is in debug mode.
    ```php
    <?php snippet('plausible'); ?>
    ```

### Proxy setup

To avoid ad blockers you can proxy the Plausible script and events through your own server.

1. Set `floriankarsten.plausible.proxy.enabled` to `true` in your config.php
2. When self-hosting Plausible, set `floriankarsten.plausible.proxy.plausibleEndpoint` to your Plausible instance URL.

More information about the Plausible proxy setup can be found in the [Plausible documentation](https://plausible.io/docs/proxy/introduction).

### Optional measurements / additional Plausible options

There are a number of additional options you can set when initialising Plausible (more here: https://plausible.io/docs/script-extensions). The easiest way to set these is by copying `snippets/plausible.php` from the plugin into your own snippets folder and modifying it to your needs.

## Troubleshooting

### The panel menu item doesn't show up or is not working

- Make sure you have set a valid `sharedLink` in your config.php.
- If you have overwritten your panel menu items using the `panel.menu` option, include `plausible` in the array of menu items.

## Credits

This plugin wouldn't happen without [@garethworld](https://github.com/garethworld) who kindly hired me to make it and then wanted to have it released to Kirby community. Yaaaaay