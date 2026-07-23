<?php 
    class Database{
        private $host ="172.31.22.43";
        private $dbName ="PizzaOrder";
        private $userName ="Jasser200657132";
        private $password ="xKhhRBS7EN";

        private $pdoInstance = null;

        public function __construct($host, $dbName, $userName, $password){
            $this->host = $host;
            $this->dbName = $dbName;
            $this->userName = $userName;
            $this->password = $password;
        }

        public function connect(){
            if($this->pdoInstance !== null){
                return $this->pdoInstance;
            }
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            //3. the try/catch block
            try{
                $this->pdoInstance = new PDO($dsn, $this->userName, $this->password, $options);
                return $this->pdoInstance;
            }catch(PDOException $e){
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }
?>