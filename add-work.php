<?php require_once 'template/header.php'; ?>

<?php
$worksType = WorkTypes::getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = isset($_POST['token']) ? $_POST['token'] : null;

    if ($token === $_SESSION['token']) {
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $create_date = isset($_POST['create_date']) ? $_POST['create_date'] : null;

        $work = new Work();
        $work->name = $name;
        $work->type = $type;
        $work->create_date = $create_date;


        if ($work->validate()) {
            $success = Works::add($work);
            $response = $success
                ? [
                    'message' => 'Данные успешно добавлены.',
                    'modifier' => 'success'
                ]
                : [
                    'message' => 'Не удалось добавить данные.',
                    'modifier' => 'danger'
                ];
        } else {
            $response = [
                'message' => 'Данные не заполнены!',
                'modifier' => 'warning'
            ];
        }

        $_SESSION['token'] = uniqid();
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4>Добавление экспоната</h4>
        </div>
    </div>
    <?php if (isset($response)) { ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-<?= $response['modifier']; ?> mb-0"><?= $response['message']; ?></div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <form class="col" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
            <div class="form-group">
                <label for="name">Название экспоната</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Введите название экспоната">
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="type">Тип экспоната</label>
                    <select class="form-control" id="type" name="type">
                        <option value="" disabled selected>Выберите значение</option>
                        <?php foreach ($worksType as $key => $type) {
                            print("<option value='{$type['id']}'>{$type['name']}</option>");
                        } ?>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="create_date">Дата создания</label>
                    <input class="form-control" type="date" id="create_date" name="create_date">
                </div>
            </div>
            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>

<?php require_once 'template/footer.php'; ?>