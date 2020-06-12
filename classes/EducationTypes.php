<?php

class EducationTypes {
    public static function getAll() {
        $db = Database::getDB();

        return $db->query("SELECT * FROM `education_types`")->fetchAll(PDO::FETCH_ASSOC);
    }
}