<?php

class Cities {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `cities`")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(City $city) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO cities (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $city->name);

        return $statement->execute();
    }
}
