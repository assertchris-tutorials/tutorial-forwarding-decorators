<?php

class GreeterDecorator1
{
    private $greeter;

    public function __construct($greeter)
    {
        $this->greeter = $greeter;
    }

    public function greet()
    {
        return $this->greeter->greet() . " modified by decorator 1";
    }
}

extend("greeter", function(Greeter $greeter) {
    return new GreeterDecorator1($greeter);
});
