<?php

namespace App\Sprocket;

class Cache
{
    /**
     * The array containing the memoized instances of Sprocket.
     * @var array<string, CachedValue>
     */
    private array $cachedSprockets = [];

    /**
     * The ttl setting of this cache instance.
     * Can be set to null, which means that the keys never expire
     *
     * @var int|null
     */
    private ?int $ttlSeconds;

    /**
     * @param int|null $ttlSeconds
     */
    function __construct(int $ttlSeconds = null)
    {
        $this->ttlSeconds = $ttlSeconds;
    }

    /**
     * Returns an instance of Sprocket that is bind to the current key if found.
     * Otherwise, it creates a new Sprocket instance, binds it to the key and returns it.
     *
     * @param string $key
     * @return Sprocket
     */
    public function get(string $key): Sprocket
    {
        // Check if value is already memoized
        $cachedValue = $this->cachedSprockets[$key] ?? null;

        // If exists and is valid, return it
        if (!empty($cachedValue) && !$cachedValue->hasExpired()) return $cachedValue->get();

        // Else create new instance, memoize and return it.
        $sprocket = Factory::create();
        $expiresInSeconds = $this->ttlSeconds
            ? time() + $this->ttlSeconds
            : null;

        $cachedValue = tap(
            CachedValue::create($sprocket, $expiresInSeconds),
            fn($cachedValue) => $this->cachedSprockets[$key] = $cachedValue
        );

        return $cachedValue->get();
    }

}
