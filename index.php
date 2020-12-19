<?php require_once 'template/header.php'; ?>
<?php
    $categorys = Category::getAll();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card block">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Категории</h5>
                    <a href="add-category.php" aria-label="Добавить город">
                        +   
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Название категории</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categorys as $key => $category) {
                                print("
                                    <tr>
                                        <td>{$category['name']}</td>
                                       
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