<?php

class ExpositionHalls {

    public $id = 0;
    public $owner = 0;
    public $name = '';
    public $area = 0;
    public $address = '';
    public $tel = '';

    public function validate()
    {
        return false;
    }

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
            SELECT expositions.start_date as startDate, expositions.end_date as endDate, exposition_halls.name as hallName, exposition_halls.address as address, exposition_halls.area as area, owners.name as ownerName FROM `exposition_halls`
             JOIN owners ON exposition_halls.id = owners.id
             JOIN expositions ON exposition_halls.id = expositions.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}
