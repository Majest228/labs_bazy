<?php

class Owners{
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
            SELECT
                owners.name,
                owner_types.name as type,
                owners.address,
                owners.tel
            FROM `owners`
            INNER JOIN owner_types on owners.type = owner_types.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}
