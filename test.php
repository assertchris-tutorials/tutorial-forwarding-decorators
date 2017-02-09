<?php

require_once __DIR__ . "/locator.php";
require_once __DIR__ . "/original.php";

print make("greeter")->greet() . PHP_EOL;

require_once __DIR__ . "/decorator-1.php";

print make("greeter")->greet() . PHP_EOL;

require_once __DIR__ . "/decorator-2.php";

print make("greeter")->greet() . PHP_EOL;
