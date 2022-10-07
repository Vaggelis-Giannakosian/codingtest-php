<?php

class Sprocket
{

}

class SprocketFactory
{
    function Create()
    {
        $sprocket = new Sprocket();
        return $sprocket;
    }
}

class SprocketCache
{
    private SprocketFactory $factory;
    function __construct(SprocketFactory $sprocketFactory) {
        $factory = $sprocketFactory;
    }

    function Get(string $key)
    {
        return factory.Create();
    }
}


$sprocketFactory = new SprocketFactory();
$cache = new SprocketCache($sprocketFactory);

echo "Initialized. Add tests showcasing cache behaviour below.";

?>
