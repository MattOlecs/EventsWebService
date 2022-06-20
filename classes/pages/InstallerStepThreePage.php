<?php

class InstallerStepThreePage extends AbstractInstallerPage{
    
    private $headerText;
    private $isStepDone;

    public function render() {
        $this->headerText = "Instalacja serwisu";
        $this->isStepDone = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->createDbAndInsertData();
        }

        RenderingService::render("InstallerStepThreePageTemplate.php",
        [
            'loginInfo' => 0,
            'isStepDone' => $this->isStepDone,
            'headerText' => $this->headerText
        ]);
    }

    private function createDbAndInsertData(){
        UtilsRepository::createDB();
    }
}