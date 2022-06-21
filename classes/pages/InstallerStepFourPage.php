<?php

class InstallerStepFourPage extends AbstractInstallerPage{

    private $installerMessage;
    private $isStepDone;

    public function render() {
        $this->installerMessage = "Stwórz konto administratora";
        $this->isStepDone = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->CreateAdminAccount();
        }

        RenderingService::render("InstallerStepFourPageTemplate.php",
        [
            'loginInfo' => 0,
            'isStepDone' => $this->isStepDone,
            'installerMessage' => $this->installerMessage
        ]);
    }

    private function CreateAdminAccount(){
        try{
            UserRepository::insertAdmin($_POST);
            $this->installerMessage = "Poprawnie stworzono konto administratora.";
            $this->isStepDone = true;
        }catch(Exception $ex){
            $this->installerMessage = "Tworzenie konta administratora nie powiodło się: " . $ex->getMessage();
        }
    }
}