<?php

class Owners{

    public $id = 0;
    public $type = 0;
    public $name = '';
    public $address = '';
    public $tel = '';

    public function validate()
    {
        return false;
    }

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
SELECT owners.name, owner_types.name as type, owners.address, owners.tel 
FROM `owners`
INNER JOIN owner_types on owners.type = owner_types.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}
