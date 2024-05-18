<?php

use Core\Session;

view('session/create.view.php', [
    'header' => 'Login',
    'errors' => Session::get('errors')
]);