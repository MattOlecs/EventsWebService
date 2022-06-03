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
        $registeredUsers = EventRepository::getNamesOfUsersRegisteredForEvent($this->eventId);
        $isRegistered = EventRepository::isUserRegisteredforEvent($this->eventId, 1);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($isRegistered){
                EventRepository::unregisterUserFromEvent($this->eventId, 1);
                $isRegistered = false;
            }
            else{
                EventRepository::registerUserForEvent($this->eventId, 1);
                $isRegistered = true;
            }

            $registeredUsers = EventRepository::getNamesOfUsersRegisteredForEvent($this->eventId);
        }

        RenderingService::render(
            "EventDetailsPageTemplate.php", 
            [
                'event' => $event,
                'creator' => $creatorName,
                'registeredUsers' => $registeredUsers,
                'isRegistered' => $isRegistered
            ]);
    }
}