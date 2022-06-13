<?php

require_once('../repositories/EventRepository.php');

class AddEventPage extends AbstractPage {

    public function render() {
        $this->setTitle('Add event');

        $isCreated = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->insertEvent($_POST);
            $isCreated = true;
        }

        RenderingService::render(
            "AddEventPageTemplate.php",
            [
                'isCreated' => $isCreated
            ]);
    }

    private function insertEvent($values){
        EventRepository::insertEvent($values, $this->getLoginInfo());
    }
}