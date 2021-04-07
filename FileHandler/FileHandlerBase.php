<?php

    class FileHandlerBase{

        protected $directory;
        protected $filename;


        function __construct($directory,$filename)
        {
            $this->directory = $directory;
            $this->filename = $filename;
        }

        function CreateDirectory($path){

            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
    
        }

    }
