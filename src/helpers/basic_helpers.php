<?php

/**
 * Call the given Closure with the given value then return the value.
 *
 * @template Value
 *
 * @param Value $value
 * @param callable|null $callback
 * @return Value
 */
if (!function_exists('tap')) {
    function tap($value, Closure $callback = null)
    {
        if (!is_null($callback)) {
            $callback($value);
        }

        return $value;
    }
}
