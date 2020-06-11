<?php

class Expositions extends Table {

    public $id = 0;
    public $hall = 0;
    public $type = 0;
    public $start_date = null;
    public $end_date = null;

    public function validate()
    {
        return false;
    }

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT expositions.start_date as startDate, expositions.end_date as endDate, exposition_types.name as typeName, exposition_halls.name as hallName, exposition_halls.address as address
FROM `expositions` 
JOIN exposition_types ON expositions.id = exposition_types.id
JOIN exposition_halls ON expositions.id = exposition_halls.id
WHERE expositions.start_date > CURRENT_DATE
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

}
