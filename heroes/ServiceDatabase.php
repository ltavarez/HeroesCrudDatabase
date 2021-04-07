<?php

 class ServiceDatabase{   

    private $context;
    private $directory;

    public function __construct($isRoot = false){

        $prefijo = ($isRoot) ? "" : "../";
        $this->directory = "{$prefijo}database";   
        $this->utilities = new Utilities();
        $this->context = new HeroesContext($this->directory);
    }

    public function Add($item){

        $stmt = $this->context->db->prepare("insert into hero (Name,Description,CompanyId,Status) values(?,?,?,?)");
        $stmt->bind_param("ssii", $item->Name, $item->Description,$item->CompanyId,$item->Status);
        $stmt->execute();
        $stmt->close();

    }

    public function Edit($item){      

        $stmt = $this->context->db->prepare("update hero set Name = ?,Description = ?,CompanyId = ?,Status = ? where Id = ?");
        $stmt->bind_param("ssiii", $item->Name, $item->Description,$item->CompanyId,$item->Status,$item->Id);
        $stmt->execute();
        $stmt->close();           
    }

    public function Delete($id){
        $stmt = $this->context->db->prepare("delete from hero where Id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();  
    }

    public function GetById($id){

        $hero = null;

        $stmt = $this->context->db->prepare("select * from hero where Id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

          $row = $result->fetch_object();
          $hero = new Hero($row->Id,$row->Name,$row->Description,$row->CompanyId,$row->Status);           
            
        }
        return $hero;
    }

    public function GetList(){

        $listadoHeroes = array();

        $stmt = $this->context->db->prepare("select h.*, c.Name as 'CompanyName' from hero h inner join company c on h.CompanyId = c.Id ");
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return array();
        } else {

            while ($row = $result->fetch_object()) {

                $hero = new Hero($row->Id,$row->Name,$row->Description,$row->CompanyId,$row->Status);
                $hero->CompanyName = $row->CompanyName;
                array_push($listadoHeroes, $hero);
            }
        }

        return $listadoHeroes;
    }  
   
}
