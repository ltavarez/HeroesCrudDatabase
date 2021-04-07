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

$companies = $service->GetList();

?>

<?php echo $layout->printHeader(); ?>

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-company-modal">
            Nueva compañia
        </button>

    </div>
</div>

<div class="row">

    <?php if (count($companies) == 0) : ?>

        <h2>No hay compañias registradas</h2>

    <?php else : ?>

        <?php foreach ($companies as $key => $company) : ?>

            <div class="col-md-3">

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><?= $company->Name ?></h5> 
                    </div>

                    <div class="card-body">
                        <a href="edit.php?id=<?= $company->Id ?>" class="btn btn-primary">Editar</a>
                        <a href="#" data-id="<?= $company->Id ?>" class="btn btn-danger btn-delete">Eliminar</a>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>



    <?php endif; ?>
    
</div>

<div class="modal fade" id="nuevo-company-modal" tabindex="-1" aria-labelledby="nuevoCompanyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoCompanyLabel">Nueva compañia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="add.php" method="POST">
                    <div class="mb-3">
                        <label for="company-name" class="form-label">Nombre de la compañia</label>
                        <input name="Name" type="text" class="form-control" id="company-name">

                    </div>  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $layout->printFooter(); ?>

<script src="../assets/js/site/company/list.js"></script>

