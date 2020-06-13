<?php

class OwnerTypes extends Table {
    public $id = 0;
    public $name = '';

    public function validate() {
        return !empty($this->name);
    }

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `owner_types`")->fetchAll(PDO::FETCH_ASSOC);
    }
}