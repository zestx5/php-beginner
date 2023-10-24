<?php

use Core\Database;
use Core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database'], 'zest', '123456');


$heading = 'Create Note';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1000 characters is required.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body,user_id) VALUES(?,?)', [$_POST['body'], 5]);
    }

}

view('notes/create.view.php', [
    'heading' => $heading,
    'errors' => $errors
]);