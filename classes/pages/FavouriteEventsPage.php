<?php

require_once('repositories/EventRepository.php');

class FavouriteEventsPage extends BaseEventsPage{

    public function getEvents()
    {
        return EventRepository::getFavouriteEventsData($this->getLoginInfo());
    }
}