<?php

    class Hero{

        public $Id;
        public $Name;
        public $Description;
        public $CompanyId;
        public $Status;
        public $CompanyName;

        public function __construct($id,$name,$description,$companyId,$status)
        {

            $this->Id = $id;
            $this->Name = $name;
            $this->Description = $description;
            $this->CompanyId = $companyId;
            $this->Status = $status;            
        }

        

    }

?>