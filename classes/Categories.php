<?php

class Categories {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `category`")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(Category $city) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO category (name)
            VALUES (:name)
        ");
        $statement->bindParam(":name", $city->name);

        return $statement->execute();
    }
}
