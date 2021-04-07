<?php

require_once 'company.php';
require_once '../helpers/utilities.php';
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../database/HeroesContext.php';
require_once 'ServiceDatabaseCompany.php';

$service = new ServiceDatabaseCompany();

    $containId = isset($_GET["id"]);

    if($containId){
        $service->Delete($_GET["id"]);
    }

    header("Location: list.php");
    exit();
?>