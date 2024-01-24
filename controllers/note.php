<?php


$config = require('config.php');
$db = new Database($config['database']);

$header = "Note";
$currentUserId = 1;

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";
