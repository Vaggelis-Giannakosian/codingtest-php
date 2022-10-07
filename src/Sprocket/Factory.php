<?php

namespace App\Sprocket;

class Factory
{
    /**
     * Static factory method used to create and return Sprocket instances
     *
     * @return Sprocket
     */
    public static function create(): Sprocket
    {
        return new Sprocket();
    }
}
