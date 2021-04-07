<?php

 class ServiceSession{   

    private $sessionName;

    private $utilities;

    public function __construct(){
        session_start();
        $this->sessionName = "heroesList";
        $this->utilities = new Utilities();
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

       $_SESSION[$this->sessionName] = $heroes;         
    }

    public function Edit($item){      

        $heroes = $this->GetList();
        
        $index = $this->utilities->getIndexElement($heroes,"Id",$item->Id);

        if($index !== null){
            $heroes[$index] = $item;
            $_SESSION[$this->sessionName] = $heroes;    
        }             
    }

    public function Delete($id){
        $heroes = $this->GetList();

        $index = $this->utilities->getIndexElement($heroes,"Id",$id);

        if(count($heroes) > 0){
            unset($heroes[$index]);
            $_SESSION[$this->sessionName] = $heroes;  
        }
    }

    public function GetById($id){

        $heroes = $this->GetList();

        $heroe = $this->utilities->searchProperty($heroes,"Id",$id);     
        
        return $heroe[0];
    }



    public function GetList(){

        $heroes = isset($_SESSION[ $this->sessionName]) ? $_SESSION[ $this->sessionName] : [];
        
        return $heroes;

    }

    
   
}


?>



