<?php

function dd($value)
{
    echo "
<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function url($value)
{
    $_SERVER['REQUEST_URI'] === $value;
}