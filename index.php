<?php require_once 'template/header.php'; ?>
<?php
    $cities = Cities::getAll();
    $work_types = WorkTypes::getAll();
    $works = Works::getAll();
    $expositions = Expositions::getAll();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card block">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Экспонаты</h5>
                    <a href="add-work.php" aria-label="Добавить город">
                        <img class="btn-icon" src="images/plus.svg" alt="" aria-hidden="true">
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Год создания</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($works as $key => $work) {
                                print("
                                    <tr>
                                        <td>{$work['name']}</td>
                                        <td>{$work['create_date']}</td>
                                    </tr>
                                ");
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card block">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Города</h5>
                    <a href="add-city.php" aria-label="Добавить город">
                        <img class="btn-icon" src="images/plus.svg" alt="" aria-hidden="true">
                    </a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($cities as $key => $entry) {
                            print("<li class='list-group-item'>{$entry['name']}</li>");
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card block">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Типы работ</h5>
                    <a href="add-typeWork.php" aria-label="Добавить тип работы">
                        <img class="btn-icon" src="images/plus.svg" alt="" aria-hidden="true">
                    </a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($work_types as $key => $entry) {
                            print("<li class='list-group-item'>{$entry['name']}</li>");
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10">
            <div class="card block">
                <div class="card-header">
                    <h5 class="mb-0">Выставки, которые Вы успеете посетить</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Дата начала</th>
                            <th>Дата конца</th>
                            <th>Тип выставки</th>
                            <th>Место проведения</th>
                            <th>Адрес</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($expositions as $key => $exposition) {
                            print("
                                <tr>
                                    <td>{$exposition['startDate']}</td>
                                    <td>{$exposition['endDate']}</td>
                                    <td>{$exposition['typeName']}</td>
                                    <td>{$exposition['hallName']}</td>
                                    <td>{$exposition['address']}</td>                                   
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