<?php

class Members extends Table {

    public $id = 0;
    public $name = '';
    public $education = 0;
    public $city = 0;
    public $born_date = null;
    public $summary ="";

    public function validate()
    {
        return false;
    }

    public static function getAll() {
        $db = Database::getDB();

        return $db->query("
            SELECT `m`.`id`, `m`.`name`, `et`.`name` as `education`, `e`.`place`, `c`.`name` as `city`, DATE_FORMAT(`m`.`born_date`, '%d.%m.%Y') as `born_date`, `m`.`summary`
            FROM `members` as `m`
            INNER JOIN `educations` as `e` ON `m`.`education` = `e`.`id`
            INNER JOIN `education_types` as `et` ON `e`.`education_type` = `et`.`id`
            INNER JOIN `cities` as `c` ON `m`.`city` = `c`.`id`
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}