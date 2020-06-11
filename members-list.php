<?php require_once 'template/header.php'; ?>
<?php
$labours = Members::getSQL();

?>
    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card block">
                <div class="card-header">
                    <h5 class="mb-0">Проводимые выставки</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Место проведения</th>
                            <th>Тип выставки</th>
                            <th>Начало</th>
                            <th>Конец</th>
                            <th>Название работы</th>
                            <th>Тип работы</th>
                            <th>Участник</th>
                            <th>Возраст участника</th>
                            <th>Дата создание работы</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($labours as $key => $member) {
                            print("
                                    <tr>
                                        <td>{$member['nameHalls']}</td>
                                        <td>{$member['type']}</td>
                                        <td>{$member['dateStart']}</td>
                                        <td>{$member['dateEnd']}</td>
                                        <td>{$member['nameWork']}</td>
                                        <td>{$member['workType']}</td>
                                        <td>{$member['FIO']}</td>
                                        <td>{$member['born_date']}</td>
                                        <td>{$member['create_date']}</td>
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