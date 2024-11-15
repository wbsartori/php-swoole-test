<?php

namespace PhpSwooleTest;

use PDO;
use PDOException;

class PDOConnectionSQLite
{
    private const CONFIG = 'database/database.sqlite';

    public function connect(): PDO
    {
        $pdo = null;
        $database = dirname(__DIR__) . DIRECTORY_SEPARATOR . self::CONFIG;
        try {
            $pdo = new PDO("sqlite:{$database}");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erro ao conectar-se com o banco" . $e->getMessage();
        }
    }
}