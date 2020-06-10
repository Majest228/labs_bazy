<?php
    spl_autoload_register(function ($class_name) {
        include_once 'classes/'. $class_name . '.php';
    });
?>

<?php require_once 'template/header.php'; ?>
<?php
    $cities = Cities::getAll();
    $work_types = WorkTypes::getAll();
    $members = Members::getAll();
    $works = Works::getAll();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card block">
                <div class="card-header">
                    <h5 class="mb-0">Города</h5>
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
        <div class="col">
            <div class="card block">
                <div class="card-header">
                    <h5 class="mb-0">Типы работ</h5>
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
        <div class="col">
            <div class="card block">
                <div class="card-header">
                    <h5 class="mb-0">Участники</h5>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Образование</th>
                                <th>Город</th>
                                <th>Дата рождения</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($members as $key => $member) {
                                print("
                                    <tr>
                                        <td>{$member['name']}</td>
                                        <td>{$member['education']}</td>
                                        <td>{$member['city']}</td>
                                        <td>{$member['born_date']}</td>
                                    </tr>
                                ");
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="card block">
            <div class="card-header">
                <h5 class="mb-0">Экспонаты</h5>
            </div>
            <div class="card-body">
                <table>
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
</div>

<!--<div id="cities">-->
<!--    <div class="card">-->
<!--        <div class="card-header" id="citiesHeading">-->
<!--            <h5 class="mb-0">-->
<!--                <button class="btn btn-link" data-toggle="collapse" data-target="#citiesBody" aria-expanded="true" aria-controls="collapseOne">-->
<!--                    Города-->
<!--                </button>-->
<!--            </h5>-->
<!--        </div>-->
<!---->
<!--        <div id="citiesBody" class="collapse" aria-labelledby="citiesHeading" data-parent="#cities">-->
<!--            <div class="card-body">-->
<!--                <ul class="list-group">-->
<!--                    --><?php //foreach ($cities as $key => $entry) {
//                        print("<li class='list-group-item'>{$entry['name']}</li>");
//                    } ?>
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div id="workTypes">-->
<!--    <div class="card">-->
<!--        <div class="card-header" id="workTypesHeading">-->
<!--            <h5 class="mb-0">-->
<!--                <button class="btn btn-link" data-toggle="collapse" data-target="#workTypesBody" aria-expanded="true" aria-controls="collapseOne">-->
<!--                    Типы работ-->
<!--                </button>-->
<!--            </h5>-->
<!--        </div>-->
<!---->
<!--        <div id="workTypesBody" class="collapse" aria-labelledby="citiesHeading" data-parent="#workTypes">-->
<!--            <div class="card-body">-->
<!--                <ul class="list-group">-->
<!--                    --><?php //foreach ($work_types as $key => $entry) {
//                        print("<li class='list-group-item'>{$entry['name']}</li>");
//                    } ?>
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php require_once 'template/footer.php'; ?>