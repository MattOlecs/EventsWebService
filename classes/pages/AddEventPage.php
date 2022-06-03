<?php

require_once('../repositories/EventRepository.php');

class AddEventPage extends AbstractPage {

    public function render() {
        $this->setTitle('Add event');

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->insertEvent($_POST);
        }

        RenderingService::render("AddEventPageTemplate.php");
    }

    private function insertEvent($values){
        EventRepository::insertEvent($values);
    }
}