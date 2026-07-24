<?php 

class Pizza{
    private $conn;
    private $table = "pizzaOrder";

    public $id;
    public $name;
    public $price;
    public $quantity;
    public $topping;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function create($name, $price, $quantity, $topping)
    {
        $sql = "INSERT INTO {$this->table}
                (name, price, quantity, topping)
                VALUES
                (:name, :price, :quantity, :topping)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':quantity' => $quantity,
            ':topping' => $topping
        ]);
    }

    

}
?>