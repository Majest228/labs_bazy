<?php

class Products
{
    public static function getAll()
    {
        $db = Database::getDB();

        return $db->query("
        SELECT product.id,product.name as pname,manufacturer.name as mname,category.name,item.price as price FROM product
        INNER JOIN category ON product.category_id = category.id
        INNER JOIN manufacturer ON product.manufacturer_id = manufacturer.id 
        INNER JOIN item ON product.id = item.product_id

        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}