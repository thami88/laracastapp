<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// validate the form input
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide an email address';
}
 
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide an password of at least seven characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
// check if the account alreay exist 

$db = App::resolve(Database::class);

$result = $db->query('select * from users where email = :email',[
    'email' => $email
])->find();

if ($user) {
    // if yes, redirect to a login page
    header('location: /');
    exit();
}else {
    // if not, save one to the database, and then log the user in, and redirect
    $db->query('INSERT INTO users (email,password) VALUES (:email, :password)',[
        'email' => $email,
        'password' => $password
    ]);

    // mark that user logged in
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}

    
