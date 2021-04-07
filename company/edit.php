<?php
require_once 'company.php';
require_once '../helpers/utilities.php';
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../database/HeroesContext.php';
require_once '../layout/layout.php';
require_once 'ServiceDatabaseCompany.php';

$layout = new Layout();
$service = new ServiceDatabaseCompany();
$utilities = new Utilities();

$company = null;

if (isset($_GET["id"])) {

    $company = $service->GetById($_GET["id"]);
}

if (isset($_POST["Id"]) && isset($_POST["Name"])) { 

    $company = new Company($_POST["Id"], $_POST["Name"]);

    $service->Edit($company);

    header("Location: list.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php echo $layout->printHeader() ?>

    <?php if ($company == null) : ?>
        <h2>No existe esta compañia</h2>
    <?php else : ?>

        <form action="edit.php" method="POST">

            <input type="hidden" name="Id" value="<?= $company->Id ?>">

            <div class="mb-3">
                <label for="company-name" class="form-label">Nombre de la compañia</label>
                <input name="Name" value="<?php echo $company->Name ?>" type="text" class="form-control" id="company-name">

            </div>

            <a href="list.php" class="btn btn-warning">Volver atras </a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    <?php endif; ?>

    <?php echo $layout->printFooter() ?>

</body>

</html>