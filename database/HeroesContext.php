<?php

class HeroesContext{

    public $db;
    private $fileHandler;

    public function __construct($directory)
    {

        $this->fileHandler = new JsonFileHandler($directory,"configuration");
        $configuration = $this->fileHandler->ReadConfiguration();
        $this->db = new mysqli($configuration->server,$configuration->user,$configuration->password,$configuration->database);
                
        if($this->db->connect_error){
            exit('Error connecting to database');
        }

        
    }

}


?>