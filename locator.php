<?php

function bind($key, Closure $factory)
{
    if (!isset($GLOBALS["SERVICES"])) {
        $GLOBALS["SERVICES"] = [];
    }

    $GLOBALS["SERVICES"][$key] = $factory;
}

function extend($key, Closure $factory)
{
    if (!isset($GLOBALS["SERVICES"])) {
        $GLOBALS["SERVICES"] = [];
    }

    if ($previous = make($key)) {
        $GLOBALS["SERVICES"][$key] = function () use ($factory, $previous) {
            return $factory($previous);
        };
    } else {
        $GLOBALS["SERVICES"][$key] = $factory;
    }
}

function make($key)
{
    if (!isset($GLOBALS["SERVICES"])) {
        $GLOBALS["SERVICES"] = [];
    }

    if (isset($GLOBALS["SERVICES"][$key])) {
        $chain = $GLOBALS["SERVICES"][$key];

        while ($chain instanceof Closure) {
            $chain = $chain();
        }

        return $chain;
    }
}
