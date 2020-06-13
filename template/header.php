<?php
    session_start();
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = uniqid();
    }

    spl_autoload_register(function ($class_name) {
        include_once 'classes/'. $class_name . '.php';
    });

    function createLink($href, $text) {
        $is_active = $_SERVER['REQUEST_URI'] == $href;
        $class_name = $is_active
            ? 'header__item header__item--current'
            : 'header__item';

        print("
            <div class='$class_name'>
                <a href='$href' class='header__link'>$text</a>
            </div>
        ");
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выставочные залы</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/styles/main.css">
    <link rel="stylesheet" href="template/styles/mix.css">
</head>
<body class="page">
    <header class="header">
        <div class="header__brand">
            <h1 class="header__title">Выставочные залы</h1>
        </div>
        <nav class="header__nav">
            <?php
                createLink("/members-list.php", "Проводимые выставки");
                createLink("/members.php", "Участники");
                createLink("/owners-list.php", "Владельцы");
                createLink("/halls-list.php", "Выставочные залы");
                createLink("/", "Главная");
            ?>
        </nav>
    </header>
    <main class="content">