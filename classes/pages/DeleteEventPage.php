<?php

require_once('../repositories/EventRepository.php');

class DeleteEventPage extends AbstractPage {

    private $eventId;

    public function __construct($id) {
        parent::__construct();

        $this->eventId = $id;
    }

    public function render() {
        $this->setTitle('Delete event');

        $eventName = EventRepository::getEvent($this->eventId)['name'];
        $isDeleted = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (array_values($_POST)[0] == "confirm"){
                EventRepository::deleteEvent($this->eventId);
                $isDeleted = true;
            }
        }

        RenderingService::render(
            "DeleteEventPageTemplate.php",
            [
                'eventName' => $eventName,
                'isDeleted' => $isDeleted
            ]);
    }
}