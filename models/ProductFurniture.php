<?php

namespace app\models;

use PDO;

class ProductFurniture extends Product
{

    public float $height;
    public float $width;
    public float $length;

    public function __construct($type, $sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($type, $sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function create($product): object
    {
        $db = $this->get_db();

        $lastInsertId = parent::insert_prod_head($product['type'], $product['sku'], $product['name'], $product['price']);

        $prod_data['height'] = $product['height'];
        $prod_data['width'] = $product['width'];
        $prod_data['length'] = $product['length'];
        $prod_serialize_data = serialize($prod_data);

        $statement = $db->prepare("UPDATE products SET prod_info = :prod_serialize_data WHERE id = :lastInsertId");
        $statement->bindParam(':prod_serialize_data', $prod_serialize_data, PDO::PARAM_STR);
        $statement->bindParam(':lastInsertId', $lastInsertId, PDO::PARAM_INT);
        $statement->execute();

        return $this;
    }

}