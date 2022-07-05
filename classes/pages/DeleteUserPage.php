<?php

require_once('repositories/EventRepository.php');

class DeleteUserPage extends AbstractPage {

    private $userId;

    public function __construct($id) {
        parent::__construct();

        $this->userId = $id;
    }

    public function render() {
        $this->setTitle('Delete user');

        $userLogin = UserRepository::getUser($this->userId)['login'];
        $isDeleted = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (array_values($_POST)[0] == "confirm"){
                UserRepository::deleteUser($this->userId);
                $isDeleted = true;
            }
        }

        RenderingService::render(
            "DeleteUserPageTemplate.php",
            [
                'userLogin' => $userLogin,
                'isDeleted' => $isDeleted
            ]);
    }
}