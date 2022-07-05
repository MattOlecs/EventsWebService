<?php

class InstallerStepTwoPage extends AbstractInstallerPage{
    
    private $installerMessage;
    private $isStepDone;

    public function render() {
        $this->installerMessage = "Tworzenie pliku konfiguracyjnego";
        $this->isStepDone = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->writeToConfigFile($_POST);
        }

        RenderingService::render("InstallerStepTwoPageTemplate.php",
        [
            'loginInfo' => 0,
            'isStepDone' => $this->isStepDone,
            'installerMessage' => $this->installerMessage
        ]);
    }

    private function writeToConfigFile(){
        $file=fopen("config/config.php","w");
        $config = 
        "<?php
        global \$config;
        \$config['host']=\"".$_POST['host']."\";
        \$config['user']=\"".$_POST['user']."\";
        \$config['password']=\"".$_POST['password']."\";
        \$config['dbname']=\"".$_POST['dbname']."\";";
        
        if (!fwrite($file, $config)) { 
            exit; 
        } 
        
        fclose($file); 
        $this->isStepDone = true;
    }
}