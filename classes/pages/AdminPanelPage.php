<?php

require_once('repositories/EventRepository.php');

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
            'usersRegistered' => UserRepository::getUsersRegistered(),
            'usersRegisteredToday' => UserRepository::getUsersRegisteredToday(),
            'eventsCreated' => EventRepository::getEventsCreated(),
            'eventsCreatedToday' => EventRepository::getEventsCreatedToday(),
            'eventsJoined' => EventRepository::getEventsJoined(),
            'eventsJoinedToday' => EventRepository::getEventsJoinedToday(),
            'usersLogged' => UserRepository::getUsersLogged(),
            'usersLoggedToday' => UserRepository::getUsersLoggedToday(),
            'avgLoggedTime' => UserRepository::getAvgLoggedTime(),
            'mostOwnedEvents' => UserRepository::getMostOwnedEventsUserLogin(),
            'mostActiveUser' => UserRepository::getMostActiveUser(),
            'leastActiveUser' => UserRepository::getLeastActiveUser(),
            'isAdmin' => UserRepository::userIsAdmin($this->getLoginInfo())
        ]);
    }
}