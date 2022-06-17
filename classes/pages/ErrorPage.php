<?php

class ErrorPage extends AbstractPage{
    public function render() {
        $this->setTitle('Error');

        RenderingService::render("ErrorPageTemplate.php",
        [
            'errorMessage' => "(╯°□°）╯︵ ┻━┻"
        ]);
    }
}