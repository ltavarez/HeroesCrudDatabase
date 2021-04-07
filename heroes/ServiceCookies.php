<?php

 class ServiceCookies{   

    private $CookieName;

    private $utilities;

    public function __construct(){
        session_start();
        $this->CookieName = "heroesList";
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

        setcookie($this->CookieName,json_encode($heroes),$this->GetCookieTime(), "/");

    }

    public function Edit($item){      

        $heroes = $this->GetList();
        
        $index = $this->utilities->getIndexElement($heroes,"Id",$item->Id);

        if($index !== null){
            $heroes[$index] = $item;

            setcookie($this->CookieName,json_encode($heroes),$this->GetCookieTime(), "/");    
        }             
    }

    public function Delete($id){
        $heroes = $this->GetList();

        $index = $this->utilities->getIndexElement($heroes,"Id",$id);

        if(count($heroes) > 0){
            unset($heroes[$index]);
            
            setcookie($this->CookieName,json_encode($heroes),$this->GetCookieTime(), "/");
        }
    }

    public function GetById($id){

        $heroes = $this->GetList();

        $heroe = $this->utilities->searchProperty($heroes,"Id",$id);     
        
        return $heroe[0];
    }

    public function GetList(){

       $heroes = array();

       if(isset($_COOKIE[$this->CookieName])){

         $heroes =(array) json_decode($_COOKIE[$this->CookieName]); 

       }
       return $heroes;
    }

    private function GetCookieTime(){
        return time() + 60 * 60 * 24 * 30;
    }   
   
}


?>



