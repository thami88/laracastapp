<?php


$config = require('config.php');
$db = new Database($config['database']);

$header = "My Notes";

$notes = $db->query('select * from notes where user_id = 1')->findAll();

require "views/notes.view.php";
