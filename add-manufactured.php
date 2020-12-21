<?php require_once 'template/header.php'; ?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = isset($_POST['token']) ? $_POST['token'] : null;

    if ($token === $_SESSION['token']) {
        $name = isset($_POST['name']) ? $_POST['name'] : null;

        $manufactured = new Manufactured();
        $manufactured->name = $name;

        if ($manufactured->validate()) {
            $success = Manufacturied::add($manufactured);
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
} ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4>Добавление города</h4>
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
                    <label for="name">Название</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Введите название города">
                </div>
                <button class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

<?php require_once 'template/footer.php'; ?>