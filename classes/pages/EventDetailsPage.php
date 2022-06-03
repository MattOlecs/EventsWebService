<?php

require_once('../repositories/EventRepository.php');

class EventDetailsPage extends AbstractPage{
    
    private $eventId;

    public function __construct($id) {
        parent::__construct();

        $this->eventId = $id;
    }
    
    public function render() {
        $this->setTitle('Details');
        
        $event = EventRepository::getEvent($this->eventId);
        $creatorData = UserRepository::getUserInfo($event['creator_user_id']);
        $creatorName = $creatorData['first_name'] . " " . $creatorData['last_name'];

        RenderingService::render(
            "EventDetailsPageTemplate.php", 
            [
                'event' => $event,
                'creator' => $creatorName
            ]);
    }
}