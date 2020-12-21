<?php require_once 'template/header.php'; ?>
<?php
$products = Products::getAll();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card block">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Участники</h5>
                    <a href="add-products.php" aria-label="Добавить город">
                        <img class="btn-icon" src="images/plus.svg" alt="" aria-hidden="true">
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <colgroup>
                            <col width="130"/>
                            <col width="105"/>
                            <col width="105"/>
                            <col width="105"/>

                        </colgroup>
                        <thead>
                        <tr>

                            <th>Товар</th>
                            <th>Фирма </th>
                            <th>Категория</th>
                            <th>Цену</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $key => $product) {
                            print("
                                    <tr>
                                        <td>{$product['pname']} </td>
                                        <td>{$product['mname']}</td>
                                         <td>{$product['name']}</td>
                                          <td>{$product['price']} тг</td>
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