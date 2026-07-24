<?php

class Database
{
    private $host = "172.31.22.43";
    private $db_name = "Jasser200657132";
    private $username = "Jasser200657132";
    private $password = "xKhhRBS7EN";

    public $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $this->conn->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return $this->conn;

        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            return null;
        }
    }
}
?>