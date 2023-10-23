<?php

$config = require 'config.php';
$db = new Database($config['database'], 'zest', '123456');


$heading = 'Create Note';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'The body cannot be more than 1000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body,user_id) VALUES(?,?)', [$_POST['body'], 5]);
    }

}

require 'views/note-create.view.php';