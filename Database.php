<?php

namespace app;
use PDO;

class Database
{
    protected ?PDO $pdo = null;
    private ?PDO $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_task', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db = $this->pdo;
    }

    /**
     * @return PDO|null
     */
    protected function get_db(): ?PDO
    {
        return $this->db;
    }

}

