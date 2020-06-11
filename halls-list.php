<?php require_once 'template/header.php'; ?>
<?php
$halls = ExpositionHalls::getAll();
?>
        <div class="row">
            <div class="col">
                <div class="card block">
                    <div class="card-header">
                        <h5 class="mb-0">Места проведения</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Дата начала выставки</th>
                                <th>Дата конца выставки</th>
                                <th>Название зала</th>
                                <th>Адрес</th>
                                <th>Площадь (м²)</th>
                                <th>Имя владельца</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($halls as $key => $hall) {
                                print("
                                <tr>
                                    <td>{$hall['startDate']}</td>
                                    <td>{$hall['endDate']}</td>
                                    <td>{$hall['hallName']}</td>
                                    <td>{$hall['address']}</td>
                                    <td>{$hall['area']}</td>
                                    <td>{$hall['ownerName']}</td>
                                </tr>
                            ");
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php require_once 'template/footer.php'; ?><?php
