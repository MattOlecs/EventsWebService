<?php

class InstallerStepOnePage extends AbstractInstallerPage{
    
    private $installerMessage;
    private $isStepDone;

    public function render() {

        $this->isStepDone = true;

        RenderingService::render("InstallerStepOnePageTemplate.php",
        [
            'loginInfo' => 0,
            'isStepDone' => $this->isStepDone,
            'installerMessage' => $this->installerMessage
        ]);
    }
}