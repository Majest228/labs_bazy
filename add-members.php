<?php require_once 'template/header.php'; ?>

<?php
$cities = Cities::getAll();
$educations = EducationTypes::getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = isset($_POST['token']) ? $_POST['token'] : null;

    if ($token === $_SESSION['token']) {
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $born_date = isset($_POST['born_date']) ? $_POST['born_date'] : null;
        $city = isset($_POST['city']) ? $_POST['city'] : null;
        $education_type = isset($_POST['education_type']) ? $_POST['education_type'] : null;
        $place = isset($_POST['place']) ? $_POST['place'] : null;
        $summary = isset($_POST['summary']) ? $_POST['summary'] : null;

        $education = new Education();
        $education->education_type = $education_type;
        $education->place = $place;

        if ($education->validate()) {
            $success = Educations::add($education);

            if (!$success) {
                $response = [
                    'message' => 'Не удалось добавить данные.',
                    'modifier' => 'danger'
                ];

                exit();
            }
        }

        $member = new Member();
        $member->name = $name;
        $member->education = $education->id;
        $member->city = $city;
        $member->born_date = $born_date;
        $member->summary = $summary;

        if ($member->validate()) {
            $success = Members::add($member);
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
            <h4>Добавление участника</h4>
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
                    <label for="name">Фамилия Имя</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Введите имя и фимилию участника">
                </div>
                <div class="form-group col">
                    <label for="born_date">Дата рождения</label>
                    <input class="form-control" type="date" id="born_date" name="born_date" placeholder="Введите дату рождения участника">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="city">Город</label>
                    <select class="form-control" id="city" name="city">
                        <option value="" disabled selected>Выберите значение</option>
                        <?php foreach ($cities as $key => $city) {
                            print("<option value='{$city['id']}'>{$city['name']}</option>");
                        } ?>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="education">Образование</label>
                    <select class="form-control" id="education" name="education_type">
                        <option value="" disabled selected>Выберите значение</option>
                        <?php foreach ($educations as $key => $education) {
                            print("<option value='{$education['id']}'>{$education['name']}</option>");
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="place">Место обучения</label>
                <input class="form-control" type="text" id="place" name="place" placeholder="Введите место обучения">
            </div>
            <div class="form-group">
                <label for="summary">Краткая биография</label>
                <textarea class="form-control" id="summary" name="summary" placeholder="Краткая биография"></textarea>
            </div>
            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>

<?php require_once 'template/footer.php'; ?>