<?php

class GreeterDecorator2
{
    private $greeter;

    public function __construct($greeter)
    {
        $this->greeter = $greeter;
    }

    public function greet()
    {
        return $this->greeter->greet() . " modified by decorator 2";
    }
}

extend("greeter", function($greeter) {
    return new GreeterDecorator2($greeter);
});
