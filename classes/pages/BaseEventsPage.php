<?php

require_once('repositories/EventRepository.php');

class BaseEventsPage extends AbstractPage{
    public function render() {
        $this->setTitle('Main');

        $user = '';

        if ($this->getLoginInfo() != 0) {
            $user = UserRepository::getUser($this->getLoginInfo());
        }

        $favouriteEventsIds = EventRepository::getFavouriteEvents($this->getLoginInfo());

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $eventId = $_POST['event_id'];
            $isFavourite = EventRepository::isFavouriteEvent($eventId, $this->getLoginInfo());
            
            if($isFavourite){
                EventRepository::deleteFavouriteEvent($eventId, $this->getLoginInfo());
            }
            else{
                EventRepository::addFavouriteEvent($eventId, $this->getLoginInfo());
            }
        }

        $arrrr = EventRepository::getFavouriteEvents($this->getLoginInfo());

        RenderingService::render("MainPageTemplate.php", [
            'user' => $user,
            'events' => $this->getEvents(),
            'favouriteEvents' => EventRepository::getFavouriteEvents($this->getLoginInfo())
        ]);
    }

    public function getEvents(){
        return EventRepository::getEvents();
    }
}