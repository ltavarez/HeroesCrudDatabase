<?php
require_once '../helpers/utilities.php';
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/SerializationFileHandler.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once 'serviceSession.php';
require_once 'ServiceCookies.php';
require_once 'ServiceFile.php';
require_once '../database/HeroesContext.php';
require_once 'ServiceDatabase.php';
require_once 'hero.php';

$service = new ServiceDatabase();

    if(isset($_POST["HeroName"]) && isset($_POST["HeroDescription"]) && isset($_POST["CompanyId"])){

        $hero = new Hero(0,$_POST["HeroName"],$_POST["HeroDescription"],$_POST["CompanyId"],true);
        $service->Add($hero);     

        header("Location: ../index.php");
        exit();
    }

?>