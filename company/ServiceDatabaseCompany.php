<?php

 class ServiceDatabaseCompany{   

    private $context;
    private $directory;

    public function __construct($isRoot = false){

        $prefijo = ($isRoot) ? "" : "../";
        $this->directory = "{$prefijo}database";   
        $this->utilities = new Utilities();
        $this->context = new HeroesContext($this->directory);
    }

    public function Add($item){

        $stmt = $this->context->db->prepare("insert into company (Name) values(?)");
        $stmt->bind_param("s", $item->Name);
        $stmt->execute();
        $stmt->close();

    }

    public function Edit($item){      

        $stmt = $this->context->db->prepare("update company set Name = ? where Id = ?");
        $stmt->bind_param("si", $item->Name,$item->Id);
        $stmt->execute();
        $stmt->close();           
    }

    public function Delete($id){
        $stmt = $this->context->db->prepare("delete from company where Id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();  
    }

    public function GetById($id){

        $company = null;

        $stmt = $this->context->db->prepare("select * from company where Id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

          $row = $result->fetch_object();
          $company = new Company($row->Id,$row->Name);           
            
        }
        return $company;
    }

    public function GetList(){

        $listadoCompanies = array();

        $stmt = $this->context->db->prepare("select * from company");
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return array();
        } else {

            while ($row = $result->fetch_object()) {

                $company = new Company($row->Id,$row->Name);
                array_push($listadoCompanies, $company);
            }
        }

        return $listadoCompanies;
    }  
   
}
