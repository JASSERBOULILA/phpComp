<?php

class pizzaRecords
{
    private $conn;
    private $table = "pizzaOrder";

    public $id;
    public $name;
    public $size;
    public $quantity;
    public $topping;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($name, $size, $quantity, $topping)
    {
        $sql = "INSERT INTO {$this->table}
                (name, size, quantity, topping)
                VALUES
                (:name, :size, :quantity, :topping)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':name' => $name,
            ':size' => $size,
            ':quantity' => $quantity,
            ':topping' => $topping
        ]);
    }
}
?>