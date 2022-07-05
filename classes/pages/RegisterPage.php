<?php

require_once('classes/DbConnection.php');

class RegisterPage extends AbstractPage
{

    private $defaults = [
        'login' => 'Login',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirm' => 'Password confirmation'
    ];

    private $values = array();
    
    public function render() {
        $this->setTitle('Register');

        $errors = array();
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();

            if (count($errors) == 0) {
                $result = UserRepository::insertUser($_POST);
                if (is_int($result) && $result != 0)
                    $success = "Successfully registered!";
                else if (is_int($result) && $result == 0)
                    $errors[] = "An Error Occurred!";
                else {
                    if (strstr($result, '23000') && strstr($result, 'email'))
                        $errors[] = 'Account with this email already exists!';
                    else if (strstr($result, '23000') && strstr($result, 'login'))
                        $errors[] = 'Account with this login already exists!';
                    else {
                        $this->values = array();
                        $success = "Successfully registered!";
                    }
                }
            }
        }
        RenderingService::render("RegisterPageTemplate.php", [
            'errors' => $errors,
            'defaults' => $this->defaults,
            'values' => $this->values,
            'success' => $success
        ]);
    }

    private function verify()
    {
        $errors = array();
        $required = ['login', 'email', 'password', 'password_confirm'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $this->defaults[$field] . ' is required!';
            else
                $this->values[$field] = $_POST[$field];
        }

        if (count($errors) == 0) {
            if ($_POST['password'] != $_POST['password_confirm'])
                $errors[] = 'Passwords do not match!';
        }
        return $errors;
    }
}