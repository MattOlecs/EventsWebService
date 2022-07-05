<?php

require_once('classes/DbConnection.php');

class LoginPage extends AbstractPage
{

    private $defaults = [
        'login' => 'Login',
        'password' => 'Password',
    ];


    private $values = array();

    public function render() {
        $this->setTitle('Login');
        $errors = array();
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();

            if (count($errors) == 0) {
                $id = UserRepository::userExists($_POST['login']);
                if ($id == 0) {
                    $errors[] = 'User with this login does not exist.';
                } else if (!UserRepository::verifyUser($id, $_POST['password'])) {
                    $errors[] = 'Wrong Password!';
                } else if (!UserRepository::verifyStatus($id)) {
                    $errors[] = 'This user is inactive!';
                } else {
                    $this->values = [];
                    UtilsRepository::login($id);
                    $this->refreshStatus();
                    $success = "Successfully logged in!";
                }
            }
        }

        RenderingService::render("LoginPageTemplate.php", [
            'errors' => $errors,
            'values' => $this->values,
            'success' => $success
        ]);
    }

    private function verify()
    {
        $errors = array();
        $required = ['login', 'password'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $this->defaults[$field] . ' is required!';
            else
                $this->values[$field] = $_POST[$field];
        }
        return $errors;
    }
}