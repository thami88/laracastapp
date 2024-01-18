<?php

require "functions.php";
require "Database.php";
// require "router.php";

$config = require('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id = :id"; // :id wildcard

$posts = $db->query($query, [':id' => $id])->fetch();

var_dump($posts);

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
