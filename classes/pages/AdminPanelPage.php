<?php

require_once('../repositories/EventRepository.php');

class AdminPanelPage extends AbstractPage{
    public function render() {
        $this->setTitle('AdminPanel');

        $user = '';

        if ($this->getLoginInfo() != 0) {
            $user = UserRepository::getUser($this->getLoginInfo());
        }

        RenderingService::render("AdminPanelPageTemplate.php", [
            'user' => $user,
            'users' => UserRepository::getUsers(),
            'usersRegisteredToday' => UserRepository::getUsersRegisteredToday(),
            'isAdmin' => UserRepository::userIsAdmin($this->getLoginInfo())
        ]);
    }
}