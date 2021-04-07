<?php

 class ServiceFile{   

    public $fileHandler;
    public $directory;
    public $filename;
    private $utilities;

    public function __construct($isRoot = false){

        $prefijo = ($isRoot) ? "heroes/" : "";
        $this->directory = "{$prefijo}data";
        $this->filename = "heroes";
        $this->utilities = new Utilities();
        $this->fileHandler = new JsonFileHandler($this->directory,$this->filename);
    }

    public function Add($item){

        $heroes = $this->GetList();

        if(count($heroes) == 0){
            $item->Id = 1;
        }else{

            $lastElement = $this->utilities->getLastElement($heroes);

            $item->Id = $lastElement->Id + 1;
        }      

        array_push($heroes, $item);        

        $this->fileHandler->SaveFile($heroes);

    }

    public function Edit($item){      

        $heroes = $this->GetList();
        
        $index = $this->utilities->getIndexElement($heroes,"Id",$item->Id);

        if($index !== null){
            $heroes[$index] = $item;

            $this->fileHandler->SaveFile($heroes);
        }             
    }

    public function Delete($id){
        $heroes = $this->GetList();

        $index = $this->utilities->getIndexElement($heroes,"Id",$id);

        if(count($heroes) > 0){
            unset($heroes[$index]);
                        
            $this->fileHandler->SaveFile($heroes);
        }
    }

    public function GetById($id){

        $heroes = $this->GetList();

        $heroe = $this->utilities->searchProperty($heroes,"Id",$id);     
        
        return $heroe[0];
    }

    public function GetList(){

        $heroes = $this->fileHandler->ReadFile();
        
        if ($heroes == false) {          
            return array();
        }

        return (array)$heroes;
    }  
   
}


?>



