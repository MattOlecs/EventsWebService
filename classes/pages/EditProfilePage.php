<?php

require_once('repositories/EventRepository.php');

class EditProfilePage extends AbstractPage
{
    private $userId;

    public function __construct($id)
    {
        parent::__construct();

        $this->userId = $id;
    }

    private $defaults = [
        'username' => 'Username',
        'email' => 'Email',
        'password' => 'Password'
    ];

    private $values = array();

    public function render()
    {
        $this->setTitle('Edit profile');

        $errors = array();
        $success = "";

        if (isset($this->userId) and $_SESSION['isAdmin'] == 1) {
            $id = $this->userId;
        } else {
            $id = $this->getLoginInfo();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();

            if (count($errors) == 0) {
                $result = UserRepository::updateUser($id, $_POST);
                if (is_int($result) && $result != 0)
                    $success = "Profile data changed!";
                else if (is_int($result) && $result == 0)
                    $errors[] = "An Error Occurred!";
                else {
                    if (strstr($result, '23000') && strstr($result, 'email'))
                        $errors[] = 'Account with this email already exists!';
                    else if (strstr($result, '23000') && strstr($result, 'login'))
                        $errors[] = 'Account with this login already exists!';
                    else if (strstr($result, '23000') && strstr($result, 'username'))
                        $errors[] = 'Account with this username already exists!';
                    else {
                        $this->values = array();
                        $success = "Profile data changed!";
                    }
                }
            }
        }
        RenderingService::render("EditProfilePageTemplate.php", [
            'errors' => $errors,
            'defaults' => $this->defaults,
            'values' => $this->values,
            'success' => $success,
            'current' => UserRepository::getUser($id)
        ]);
    }

    private function verify()
    {
        $errors = array();
        $required = ['username', 'password', 'email'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $this->defaults[$field] . ' is required!';
            else
                $this->values[$field] = $_POST[$field];
        }
        return $errors;
    }
}
