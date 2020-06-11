<?php require_once 'template/header.php'; ?>
<?php

$members = Members::getAll();

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card block">
                    <div class="card-header">
                        <h5 class="mb-0">Участники</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Образование</th>
                                <th>Город</th>
                                <th>Дата рождения</th>
                                <th>Краткая биография</th>
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
                                        <td>{$member['summary']}</td>
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