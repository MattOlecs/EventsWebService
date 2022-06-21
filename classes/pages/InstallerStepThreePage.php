<?php

class InstallerStepThreePage extends AbstractInstallerPage{
    
    private $installerMessage;
    private $isStepDone;

    public function render() {
        $this->installerMessage = "Stwórz bazę danych";
        $this->isStepDone = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->createDbAndInsertData();
        }

        RenderingService::render("InstallerStepThreePageTemplate.php",
        [
            'loginInfo' => 0,
            'isStepDone' => $this->isStepDone,
            'installerMessage' => $this->installerMessage
        ]);
    }

    private function createDbAndInsertData(){
        try{
            UtilsRepository::createDB();
            $this->installerMessage = "Poprawnie stworzono bazę danych.";
            $this->isStepDone = true;
        }catch(Exception $ex){
            $this->installerMessage = "Tworzenie bazy danych nie powiodło się: " . $ex->getMessage();
        }
    }
}