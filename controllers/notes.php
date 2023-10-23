<?php

$config = require 'config.php';
$db = new Database($config['database'], 'zest', '123456');

$heading = 'My Notes';
$notes = $db->query('select * from notes where user_id = ?', [5])->findAll();

require 'views/notes.view.php';