<?php

namespace PhpSwooleTest;

use PDO;
use Throwable;

class ExampleService
{

    private PDO $database;

    public function __construct()
    {
        $this->database = (new PDOConnectionSQLite())->connect();
    }

    public function getDatabase(): PDO
    {
        return $this->database;
    }

    public function customers(): array
    {
        try {
            $sql = 'SELECT * FROM customers';
            $statement = $this->database->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (Throwable $exception) {
            return [
                'status' => 200,
                'message' => $exception->getMessage()
            ];
        }
    }
}