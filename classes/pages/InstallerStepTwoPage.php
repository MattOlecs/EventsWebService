<?php

class InstallerStepTwoPage extends AbstractInstallerPage{
    
    private $headerText;
    private $isDataSet;

    public function render() {
        $this->headerText = "Instalacja serwisu";
        $this->isDataSet = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->writeToConfigFile($_POST);
        }

        RenderingService::render("InstallerStepTwoPageTemplate.php",
        [
            'loginInfo' => 0,
            'isDataSet' => $this->isDataSet,
            'headerText' => $this->headerText
        ]);
    }

    private function writeToConfigFile($values){
        $file=fopen("../public/config/config.php","w");
        $config = "<?php
         \$host=\"".$_POST['host']."\";
         \$user=\"".$_POST['user']."\";
         \$password=\"".$_POST['password']."\";
         \$dbname=\"".$_POST['dbname']."\";";
        
         if (!fwrite($file, $config)) { 
            print "Nie mogę zapisać do pliku ($file)"; 
            exit; 
        } 
        
        fclose($file); 
        $this->isDataSet = true;
    }
}