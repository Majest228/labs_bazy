<?php


class Works {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
            SELECT name, DATE_FORMAT(create_date, '%Y') as create_date FROM `works`
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(Work $work) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO `works` (`name`, `type`, `create_date`)
            VALUES (:name, :type, :create_date)
        ");
        $statement->bindParam(':name', $work->name);
        $statement->bindParam(':type', $work->type);
        $statement->bindParam(':create_date', $work->create_date);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
