<?php

namespace app\models;

use PDO;

class ProductDvd extends Product
{

    public float $size;

    public function __construct($type, $sku, $name, $price, $size)
    {
        parent::__construct($type, $sku, $name, $price);
        $this->size = $size;

    }

    public function create($product): object
    {
        $db = $this->get_db();

        $lastInsertId = parent::insert_prod_head($product['type'], $product['sku'], $product['name'], $product['price']);

        $prod_data['size'] = $product['size'];
        $prod_serialize_data = serialize($prod_data);

        $statement = $db->prepare("UPDATE products SET prod_info = :prod_serialize_data WHERE id = :lastInsertId");
        $statement->bindParam(':prod_serialize_data', $prod_serialize_data, PDO::PARAM_STR);
        $statement->bindParam(':lastInsertId', $lastInsertId, PDO::PARAM_INT);
        $statement->execute();

        return $this;
    }
}




