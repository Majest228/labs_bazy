<?php

class Items
{
    public static function getAll()
    {
        $db = Database::getDB();

        return $db->query("
           SELECT item.id, product.name,item.price FROM item
           INNER JOIN product ON item.product_id = product.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}