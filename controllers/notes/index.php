<?php

$config = require basePath('config.php');
$db = new Database($config['database'], 'zest', '123456');

$heading = 'My Notes';
$notes = $db->query('select * from notes where user_id = ?', [5])->findAll();

view('notes/index.view.php', [
    'heading' => $heading,
    'notes' => $notes
]);