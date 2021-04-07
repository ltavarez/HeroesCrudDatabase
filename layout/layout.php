<?php
    class Layout{

        private $IsRoot;

        public function __construct($isRoot = false)
        {
            $this->IsRoot = $isRoot;
        }

    function printHeader(){

        $directory = ($this->IsRoot) ? "" : "../";

        $header = <<<EOF

        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroes</title>

    <link rel="stylesheet" href="{$directory}assets/css/style.css">
    <link rel="stylesheet" href="{$directory}assets/css/bootstrap/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{$directory}index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <a class="nav-link active" href="{$directory}company/list.php">Compañias</a>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container margin-arriba-8">


EOF;

    echo $header;

    }


    function printFooter(){

        $directory = ($this->IsRoot) ? "" : "../";

        $footer = <<<EOF

        </main>      

        <script src="{$directory}assets/js/jquery/jquery-3.5.1.min.js"></script>
        <script src="{$directory}assets/js/bootstrap/bootstrap.min.js"></script>
    
    </body>
    
    </html>

EOF;

    echo $footer;

    }

}
