<?php

class Category {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `category`")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(City $city) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO category (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $categorys->name);

        return $statement->execute();
    }
}
