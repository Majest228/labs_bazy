<?php

class Owner extends Table {
    public $id = 0;
    public $type = 0;
    public $name = '';
    public $address = '';
    public $tel = '';

    public function validate() {
        return (
            !empty($this->type) &&
            !empty($this->name) &&
            !empty($this->address) &&
            !empty($this->tel)
        );
    }

    public static function add(Owner $owner) {
        $db = Database::getDB();

        $statement = $db->prepare("
            INSERT INTO `owners` (`type`, `name`, `address`, `tel`)
            VALUES (:type, :name , :address, :tel)
        ");
        $statement->bindParam(':type', $owner->type);
        $statement->bindParam(':name', $owner->name);
        $statement->bindParam(':address', $owner->address);
        $statement->bindParam(':tel', $owner->tel);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}