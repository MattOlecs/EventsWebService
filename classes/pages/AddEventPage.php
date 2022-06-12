<?php

require_once('../repositories/EventRepository.php');

class AddEventPage extends AbstractPage {

    public function render() {
        $this->setTitle('Add event');

        RenderingService::render("AddEventPageTemplate.php");
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->insertEvent($_POST);
        }
    }

    private function insertEvent($values){
        EventRepository::insertEvent($values);
    }

}