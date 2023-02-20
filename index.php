<?php 

// Créez une connexion de base de données au serveur PostgreSQL 
$pdo = require("connect.php");


$pdo->query("
    CREATE OR REPLACE FUNCTION add(
        a INTEGER,
        b INTEGER)
      RETURNS integer AS $$
    BEGIN
        return a * b;
    END; $$
      LANGUAGE 'plpgsql';
");

$statement = $pdo->prepare("SELECT add(:a, :b)");

$a = 20;
$b = 100;
$statement->bindValue(':a', $a, PDO::PARAM_INT);
$statement->bindValue(':b', $b, PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetchColumn();

echo "The result of $a * $b is $result";