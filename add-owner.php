<?php require_once 'template/header.php'; ?>

<?php
$owners = OwnerTypes::getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = isset($_POST['token']) ? $_POST['token'] : null;

    if ($token === $_SESSION['token']) {
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $address = isset($_POST['address']) ? $_POST['address'] : null;
        $tel = isset($_POST['tel']) ? $_POST['tel'] : null;

        $owner = new Owner();
        $owner->type = $type;
        $owner->name = $name;
        $owner->address = $address;
        $owner->tel = $tel;

        if ($owner->validate()) {
            $success = Owner::add($owner);
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
                <h4>Добавление владельца</h4>
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
                <div class="form-row">
                    <div class="form-group col">
                            <label for="type">Тип организации</label>
                            <select class="form-control" id="type" name="type">
                                <option value="" disabled selected>Выберите значение</option>
                                <?php foreach ($owners as $key => $type) {
                                    print("<option value='{$type['id']}'>{$type['name']}</option>");
                                } ?>
                            </select>
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label for="name">Название огранизации</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Введите название организации">
                </div>
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Введите адрес">
                </div>
                <div class="form-group">
                    <label for="tel">Телефон</label>
                    <input class="form-control" type="text" id="tel" name="tel" placeholder="Введите номер телефона">
                </div>
                <button class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

<?php require_once 'template/footer.php'; ?>