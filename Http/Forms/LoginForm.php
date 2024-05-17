<?php

namespace Http\Forms;

use Core\Validator;

class  LoginForm
{
    protected $errors = [];

    public function validate($email, $password )
    {
        if (!Validator  ::email($email)) {
        $this->errors['email'] = 'Please provide an email address';
        }

        if (!Validator::string($password)) {
        $this->errors['password'] = 'Please provide an valid password';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors; 
    }
}