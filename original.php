<?php

class Greeter
{
    public function greet()
    {
        return "hello world";
    }
}

bind("greeter", function() {
    return new Greeter;
});
