<?php

namespace App\Sprocket;

/**
 * Added some helper methods used in the test
 */
class Sprocket
{
    /**
     * Returns the integer object handle for this instance
     *
     * @return int
     */
    public function id(): int
    {
        return spl_object_id($this);
    }

    /**
     * Checks if the Sprocket instance passed is the same as the current instance,
     * which means that they refer to the same memory address.
     *
     * @param Sprocket $object
     * @return bool
     */
    public function is(Sprocket $object): bool
    {
        return $this->id() === $object->id();
    }
}
