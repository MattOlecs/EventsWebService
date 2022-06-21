<?php

class InstallerStepOnePage extends AbstractInstallerPage{
    
    private $installerMessage;
    private $isStepDone;

    public function render() {

        $this->isStepDone = false;

        if (file_exists("../public/config/config.php")){

            if(is_writable("../public/config/config.php")){
                $this->installerMessage = "Wykrytko odpowiedni plik config.php.";
                $this->isStepDone = true;
            }
            else{
                $this->installerMessage = "Plik config.php nie posiada praw do zapisu.";
            }
        }
        else{
            $this->installerMessage = "Należy stworzyć plik config.php w /public/config/";
        }

        RenderingService::render("InstallerStepOnePageTemplate.php",
        [
            'loginInfo' => 0,
            'isStepDone' => $this->isStepDone,
            'installerMessage' => $this->installerMessage
        ]);
    }
}