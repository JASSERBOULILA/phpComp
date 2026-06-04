<?php 

class MovieCrud
{
    public function __construct(PDO $activePdoConnection)
    {
        $this->dbConnection = $activePdoConnection;


        
    }
    public function readlAllPopular($selectPage = 1){
        $recordPerPage = 12;
        $offset = ($selectPage -1)* $recordPerPage;

        $sqlQuery = "SELECT * FROM lessonMovies ORDER BY popularity DESC LIMIT :limit OFFSET :offset";
        try{
            $statement = $this->dbConnection->prepare($sqlQuery);
            $statement->bindValue(':limit', $recordPerPage, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll();
        }catch(PDOException $e){
            return [];
        }
    }
}

?>