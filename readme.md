# Kirby Plausible
Simple plugin providing Plausible iframe panel view to Kirby panel and frontend snippet.

![CleanShot 2021-11-04 at 17 53 43](https://user-images.githubusercontent.com/4954323/140384031-efdf83d7-06a3-4ce3-a60b-3827fe63fd9c.png)
## Installation
`composer require  floriankarsten/kirby-plausible`
or download from releases

## How to use
1. Create a shared link https://plausible.io/docs/shared-links
1. Set `floriankarsten.plausible.sharedLink` in config.php
    ```php
    // config/config.php
    'floriankarsten.plausible' => [
        // Required
        'sharedLink' => 'https://plausible.io/share/yourwebsiteurl.com?auth=Jz0mCWTPu5opXi0sAgRrq',
        // Optional: The value that will be set in data-domain attribute of <script> tag.
        'domain' => 'test.com', // Defaults to $site->url()
        // Optional: To use a self-hosted Plausible instance
        // 'scriptHost' => 'https://plausible.example.com',
        // Optional: To use Plausible script extensions
        // 'scriptName' => 'plausible.outbound-links.exclusions'
    ];
    ```
1. Add the following snippet inside your site's `<head>` tag. Note that this will not generate any output for logged in users or when Kirby is in debug mode.
    ```php
    <?php snippet('plausible'); ?>
    ```

This plugin wouldn't happen without [@garethworld](https://github.com/garethworld) who kindly hired me to make it and then wanted to have it released to Kirby community. Yaaaaay
