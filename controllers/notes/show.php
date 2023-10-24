<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database'], 'zest', '123456');

$heading = 'Note';
$currentUserId = 5;

$note = $db->query('select * from notes where id = ?', [$_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);