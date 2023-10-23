<?php

$config = require 'config.php';
$db = new Database($config['database'], 'zest', '123456');


$heading = 'Create Note';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT INTO notes(body,user_id) VALUES(?,?)', [$_POST['body'], 5]);
}

require 'views/note-create.view.php';