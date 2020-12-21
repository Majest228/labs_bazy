<?php

class Manufacturied {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `manufacturer`")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(Manufactured $manufactured) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO manufacturer (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $manufactured->name);

        return $statement->execute();
    }
}
