<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $class[0] = str_word_count($class) > 1 ? strtolower($class[0]) : $class[0];
    require basePath("$class.php");
});

require basePath('core/router.php');