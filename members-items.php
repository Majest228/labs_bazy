<?php require_once 'template/header.php'; ?>
<?php
$items = Items::getAll();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card block">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Участники</h5>
                        <a href="add-items.php" aria-label="Добавить город">
                            <img class="btn-icon" src="images/plus.svg" alt="" aria-hidden="true">
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0">
                            <colgroup>
                                <col width="130"/>
                                <col width="175"/>

                            </colgroup>
                            <thead>
                            <tr>

                                <th>Образование</th>
                                <th>Место обучения</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($items as $key => $item) {
                                print("
                                    <tr>
                                        <td>{$item['name']}</td>
                                        <td>{$item['price']}</td>
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
<?php require_once 'template/footer.php'; ?>