<?php

class LogoutPage extends AbstractPage {
    public function render()
    {
        $this->setTitle('Log Out');
        UtilsRepository::logout();
        $this->refreshStatus();
        RenderingService::render("LogoutPageTemplate.php");
    }

}