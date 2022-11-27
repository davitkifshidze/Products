<?php

namespace app\models;
use app\Database;
use PDO;

abstract class Product extends Database
{
    public int $type;
    public string $sku;
    public string $name;
    public float $price;

    public function __construct($type,$sku,$name,$price)
    {
        $this->type = $type;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return PDO|null
     */
    protected function get_db(): ?PDO
    {
        $Database = new Database;
        return $Database->get_db();
    }

    /**
     * @param $type
     * @param $sku
     * @param $name
     * @param $price
     * @return Product|false|string
     */
    protected function insert_prod_head($type,$sku,$name,$price){

        $Database = new Database;
        $db = $Database->get_db();

        $statement = $db->prepare("INSERT INTO products(type, sku, name, price) 
                                    VALUES(:type, :sku, :name, :price)");
        $statement->bindParam(':type', $type, PDO::PARAM_INT);
        $statement->bindParam(':sku', $sku, PDO::PARAM_STR);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':price', $price, PDO::PARAM_STR);

        $statement->execute();

        return $db->lastInsertId();


    }


    /**
     * @param $product
     * @return object
     */
    abstract public function create($product) : object;

}