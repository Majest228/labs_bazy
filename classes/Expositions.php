<?php

class Expositions {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
            SELECT
                DATE_FORMAT(expositions.start_date, '%d.%m.%y %H:%i') AS startDate,
                DATE_FORMAT(expositions.end_date, '%d.%m.%y %H:%i') AS endDate,
                exposition_types.name AS typeName,
                exposition_halls.name AS hallName,
                exposition_halls.address AS address
            FROM `expositions` 
            JOIN exposition_types ON expositions.id = exposition_types.id
            JOIN exposition_halls ON expositions.id = exposition_halls.id
            WHERE expositions.start_date > CURRENT_DATE
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

}
