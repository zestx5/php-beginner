<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$db = new Database();

$posts = $db->query('select * from posts where id > 1')->fetch(PDO::FETCH_ASSOC);