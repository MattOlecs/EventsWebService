<?php

require_once('../services/RenderingService.php');
require_once('../repositories/UserRepository.php');

abstract class AbstractPage {

    public function __construct(){
        session_start();
    }

    public function setTitle($title) {
        RenderingService::inject('title', $title);
    }

    public abstract function render();
}