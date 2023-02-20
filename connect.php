<?php


require_once 'config.php';

function connect(string $host, string $db, string $user, string $password)
{
    try {
        $dsn = "pgsql:host=$host;port=5432;dbname=$db;";

        // make a database connection
         new PDO(
            $dsn,
            $user,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        echo " Opened database successfully";
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

return connect($host, $db, $user, $password);