<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database'], 'zest', '123456');
$currentUserId = 5;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = ?', [$_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = ?', [$_POST['id']]);

    header('location: /notes');
    exit();
} else {
    $heading = 'Note';

    $note = $db->query('select * from notes where id = ?', [$_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'heading' => $heading,
        'note' => $note
    ]);
}