<?php

class LogoutPage extends AbstractPage {
    public function render()
    {
        $this->setTitle('Logout');
        UtilsRepository::logout();
        $this->refreshStatus();
        RenderingService::render("LogoutPageTemplate.php");
    }

}