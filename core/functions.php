<?php
use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function url($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require basePath("views/$code.php");
    die();
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $args)
{
    extract($args);
    require basePath('views/' . $path);
}