<?php


class WorkTypes extends Table {

    public $id = 0;
    public $name = '';

    public function validate()
    {
        return false;
    }

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `work_types`")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(WorkType $workType) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO work_types (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $workType->name);

        return $statement->execute();
    }
}
