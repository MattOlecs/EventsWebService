<?php

class AboutPage extends AbstractPage{
    public function render() {
        $this->setTitle('About');

        RenderingService::render("AboutPageTemplate.php", [
            
        ]);
    }
}