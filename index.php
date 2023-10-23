<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require 'config.php';

$db = new Database($config['database'], 'zest', '123456');

$posts = $db->query('select * from posts where id > 1')->fetch();