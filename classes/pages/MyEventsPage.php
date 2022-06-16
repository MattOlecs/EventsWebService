<?php

require_once('../repositories/EventRepository.php');

class MyEventsPage extends BaseEventsPage{

    public function getEvents()
    {
        return EventRepository::getUserCreatedEvents($this->getLoginInfo());
    }
}