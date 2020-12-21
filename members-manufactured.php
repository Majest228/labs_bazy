<?php require_once 'template/header.php'; ?>
<?php
$manufacturied = Manufacturied::getAll();

?>
    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card block">
                <div class="card-header">
                    <h5 class="mb-0">Проводимые выставки</h5>
                    <a href="add-manufactured.php" aria-label="Добавить фирму">
                        +
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Место проведения</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($manufacturied as $key => $manufactured) {
                            print("
                                <tr>
                                    <td>{$manufactured['name']}</td>
                                </tr>
                            ");
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'template/footer.php'; ?>