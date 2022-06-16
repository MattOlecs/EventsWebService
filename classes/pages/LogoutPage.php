<?php

class LogoutPage extends AbstractPage {
    public function render()
    {
        echo "<script>console.log('render');</script>";
        $this->setTitle('Logout');
        UtilsRepository::logout();
        $this->refreshStatus();
        RenderingService::render("LogoutPageTemplate.php");
    }
}