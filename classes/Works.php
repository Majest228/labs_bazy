<?php


class Works {

    public $id = 0;
    public $name = '';
    public $type = 0;
    public $create_date = null;

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
        SELECT name, DATE_FORMAT(create_date, '%Y') as create_date FROM `works`
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}
