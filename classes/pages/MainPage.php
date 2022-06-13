<?php

require_once('../repositories/EventRepository.php');

class MainPage extends AbstractPage{
    public function render() {
        $this->setTitle('Main');

        $user = '';

        if ($this->getLoginInfo() != 0) {
            $user = UserRepository::getUser($this->getLoginInfo());
        }

        RenderingService::render("MainPageTemplate.php", [
            'user' => $user,
            'events' => EventRepository::getEvents()
        ]);
    }
}