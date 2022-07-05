<?php

class InstallerStepZeroPage extends AbstractInstallerPage{
    
    private $installerMessage;

    public function render() {

    $this->installerMessage = "Plik config/installer.php istnieje. Jeżeli instalacja została już zakończona usuń plik i przejdź do serwisu.";
    
    RenderingService::render("InstallerStepZeroPageTemplate.php",
    [
        'loginInfo' => 0,
        'installerMessage' => $this->installerMessage
    ]);
    }
}