<?php

class ExpositionHalls {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
            SELECT
                DATE_FORMAT(expositions.start_date, '%d.%m.%y %H:%i') AS startDate,
                DATE_FORMAT(expositions.end_date, '%d.%m.%y %H:%i') AS endDate,
                exposition_halls.name AS hallName,
                exposition_halls.address AS address,
                exposition_halls.area AS area,
                owners.name AS ownerName
            FROM `exposition_halls`
            JOIN owners ON exposition_halls.id = owners.id
            JOIN expositions ON exposition_halls.id = expositions.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}