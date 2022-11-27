<?php

namespace app\models;
use app\Database;
use PDO;

class God extends Database
{
    /**
     * @return mixed
     */
    public function getType()
    {
        $query = $this->pdo->prepare("SELECT * FROM type");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array|false
     */
    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT t1.*, t2.id as type_id, t2.name as type_name FROM products as t1 LEFT JOIN type as t2 ON t1.type = t2.id ORDER BY t1.id DESC');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sku
     * @return void
     */
    public function deleteProducts($sku)
    {
        $query = $this->pdo->prepare("DELETE FROM products WHERE sku = '$sku' ");
        $query->execute();
    }


    /**
     * @param $sku
     * @return bool
     */
    public function checkProductSku($sku): bool
    {
        $query = $this->pdo->prepare("SELECT * FROM products WHERE sku=:sku");
        $query->bindParam(':sku', $sku);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return true;
        } else {
            return false;
        }
    }

}