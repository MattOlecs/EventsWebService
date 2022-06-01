<?php

require_once('../repositories/EventRepository.php');

class MainPage extends AbstractPage{
    public function render() {
        $this->setTitle('Main');

        $user = '';

        // if($this->getLoginInfo() != 0 ){
        //     $user = User::getUserInfo($this->getLoginInfo());
        // }

        RenderingService::render("MainPageTemplate.php", [
            'user' => UserRepository::getUserInfo(1),
            'events' => EventRepository::getEvents()
        ]);
    }
}