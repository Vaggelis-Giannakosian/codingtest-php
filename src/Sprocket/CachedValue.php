<?php

namespace App\Sprocket;

/**
 * This class is used to wrap cached items and provide a simple API
 *
 * @template Value
 */
class CachedValue
{
    /**
     * @var Value $value
     */
    private $value;
    private ?int $expiresInSeconds;

    /**
     * @param Value $value
     * @param int|null $expiresInSeconds
     */
    public function __construct($value, int $expiresInSeconds = null)
    {
        $this->value = $value;
        $this->expiresInSeconds = $expiresInSeconds;
    }

    /**
     * Static factory method used as a proxy to the class constructor
     *
     * @param $value
     * @param int|null $expiresInSeconds
     * @return CachedValue
     */
    public static function create($value, int $expiresInSeconds = null): CachedValue
    {
        return new static($value, $expiresInSeconds);
    }

    /**
     * Access the underlying value
     *
     * @return Value
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * Check if cached value has expired.
     * - If the expiresInSeconds is null, it never expires.
     * @return bool
     */
    public function hasExpired(): bool
    {
        return $this->expiresInSeconds && time() >= $this->expiresInSeconds;
    }
}
