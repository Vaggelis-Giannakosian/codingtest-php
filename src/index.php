<?php
require '../vendor/autoload.php';

use App\Sprocket\Cache;

$ttlSeconds = 1;
$cache = new Cache($ttlSeconds);

$keyWithoutTtl = "key_without_ttl";
checkCachedKey($keyWithoutTtl);

$keyWithTtl = "key_with_ttl";
checkCachedKey($keyWithTtl, $ttlSeconds);

function checkCachedKey(string $key, int $ttlSeconds = 0): void
{
    global $cache;

    $firstInstance = $cache->get($key);
    sleep($ttlSeconds);
    $secondInstance = $cache->get($key);

    $message = "The instances for '{$key}' are ";
    $message .= $firstInstance->is($secondInstance) ? "" : "not ";

    echo $message . "the same (#{$firstInstance->id()} - #{$secondInstance->id()})\n";
}
