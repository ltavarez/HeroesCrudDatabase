<?php

    class Utilities{

    public $companies = [1=> "DC", 2=>"Marvel"];
 

    public function getLastElement($list){

        $countList = count($list);
        $lastElement = $list[$countList -1];

        return $lastElement;

    }

    public function searchProperty($list,$property,$value){

        $filters = [];

        foreach($list as $item){

            if($item->$property == $value){
                array_push($filters, $item);
            }
        }

        return $filters;
    }

    public function getIndexElement($list,$property,$value){

        foreach($list as $key => $item){

            if($item->$property == $value){             
                return $key;              
               
            }
        }
    }

}
