<?php

require_once('../repositories/EventRepository.php');

class EventDetailsPage extends AbstractPage
{

    private $eventId;

    public function __construct($id)
    {
        parent::__construct();

        $this->eventId = $id;
    }

    public function render()
    {
        $this->setTitle('Details');

        if (!EventRepository::doesEventExist($this->eventId)){
            RoutingService::redirectToErrorPage();
            return;
        }

        $event = EventRepository::getEvent($this->eventId);
        $creatorData = UserRepository::getUser($event['id_owner']);
        $creatorName = $creatorData['login'];
        $registeredUsers = EventRepository::getNamesOfUsersRegisteredForEvent($this->eventId);
        $isRegistered = EventRepository::isUserRegisteredforEvent($this->eventId, $this->getLoginInfo());
        $isCreator = $event['id_owner'] == $this->getLoginInfo();
        $isAdmin = UtilsRepository::isAdmin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($isRegistered) {
                EventRepository::unregisterUserFromEvent($this->eventId, $this->getLoginInfo());
                $isRegistered = false;
            } else {
                EventRepository::registerUserForEvent($this->eventId, $this->getLoginInfo());
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
                'isRegistered' => $isRegistered,
                'isCreator' => $isCreator,
                'isAdmin' => $isAdmin
            ]
        );
    }
}
