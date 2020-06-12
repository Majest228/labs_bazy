<?php

class Educations {
    public static function add(Education $education) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO `educations` (`education_type`, `place`) VALUES (:education_type, :place);
        ");
        $statement->bindParam(':education_type', $education->education_type);
        $statement->bindParam(':place', $education->place);

        if ($statement->execute()) {
            $education->id = $db->lastInsertId();

            return true;
        } else {
            return false;
        }
    }
}