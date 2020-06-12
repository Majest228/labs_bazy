<?php require_once 'template/header.php'; ?>
<?php
    $members = Members::getAll();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card block">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Участники</h5>
                        <a href="add-members.php" aria-label="Добавить город">
                            <img class="btn-icon" src="images/plus.svg" alt="" aria-hidden="true">
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0">
                            <colgroup>
                                <col width="130"/>
                                <col width="175"/>
                                <col/>
                                <col/>
                                <col/>
                                <col/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Образование</th>
                                    <th>Место обучения</th>
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
                                        <td>{$member['place']}</td>
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