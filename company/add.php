<?php
require_once 'company.php';
require_once '../helpers/utilities.php';
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../database/HeroesContext.php';
require_once 'ServiceDatabaseCompany.php';


$service = new ServiceDatabaseCompany();

    if(isset($_POST["Name"])){

        $company = new Company(0,$_POST["Name"]);
        $service->Add($company);     

        header("Location: list.php");
        exit();
    }

?>