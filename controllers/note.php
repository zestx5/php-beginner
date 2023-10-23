<?php

$config = require 'config.php';
$db = new Database($config['database'], 'zest', '123456');

$heading = 'Note';
$currentUserId = 5;

$note = $db->query('select * from notes where id = ?', [$_GET['id']])->fetch();

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

require 'views/note.view.php';