<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database ::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// validate the form input
if (!Validator ::email($email)) {
    $errors['email'] = 'Please provide an email address';
}
 
if (!Validator::string($password)) {
    $errors['password'] = 'Please provide an valid password';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' =>  $errors
    ]);
}

$user = $db->query('select * from users where email = :email',[
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password,$user['password'])) {
        login([
            'email' => $email
        ]);   
    
        header('location: /');
        exit(); 
    }
}

return view('session/create.view.php', [
    'errors' =>  [
        'email' => 'No matching account found for that email address and password'
    ]
]); 


 