<?php

class Members {
    public static function getAll()
    {
        $db = Database::getDB();

        return $db->query("
            SELECT `m`.`id`, `m`.`name`, `et`.`name` as `education`, `e`.`place`, `c`.`name` as `city`, DATE_FORMAT(`m`.`born_date`, '%d.%m.%Y') as `born_date`, `m`.`summary`
            FROM `members` as `m`
            INNER JOIN `educations` as `e` ON `m`.`education` = `e`.`id`
            INNER JOIN `education_types` as `et` ON `e`.`education_type` = `et`.`id`
            INNER JOIN `cities` as `c` ON `m`.`city` = `c`.`id`
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSQL()
    {
        $db = Database::getDB();

        return $db->query("
            SELECT
                exposition_halls.name AS nameHalls,
                exposition_types.name AS type,
                expositions.start_date AS dateStart,
                expositions.end_date AS dateEnd,
                works.name AS nameWork,
                work_types.name AS workType,
                members.name AS FIO,
                (
                    (YEAR(CURRENT_DATE) - YEAR(members.born_date)) - (DATE_FORMAT(CURRENT_DATE, '%m%d') < DATE_FORMAT(members.born_date, '%m%d'))
                ) AS born_date, 
                DATE_FORMAT(works.create_date, '%Y') AS create_date 
            FROM `members` 
            JOIN members_works ON members.id = members_works.id
            JOIN works ON members_works.id = works.id
            JOIN work_types ON works.id = work_types.id
            JOIN expositions_members ON members.id = expositions_members.id
            JOIN expositions ON expositions_members.id = expositions.id
            JOIN exposition_types ON expositions.id = exposition_types.id
            JOIN exposition_halls ON expositions.id = exposition_halls.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add(Member $member) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO `members` (`name`, `education`, `city`, `born_date`, `summary`)
            VALUES (:name, :education, :city, :born_date, :summary)
        ");
        $statement->bindParam(':name', $member->name);
        $statement->bindParam(':education', $member->education);
        $statement->bindParam(':city', $member->city);
        $statement->bindParam(':born_date', $member->born_date);
        $statement->bindParam(':summary', $member->summary);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}