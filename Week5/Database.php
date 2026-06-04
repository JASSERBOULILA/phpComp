<?php 
    /** 
     * Database connection class
     * Note that this does not run SQL queries ... it acts as a safe highway  between
     * PHP and your database
     * 
     */

    class Database{
        private $host;
        private $dbName;
        private $userName;
        private $password;

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
            //create a DSN (Data Source Name)
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
            //2. Configure PDO Options array
            //we configure PDO to change its default behaviors to be safer and easier to work with
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