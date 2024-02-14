<?php 

try {
    $pdo = new PDO('mysql:dbname=projetphp;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<h2 style="color:red">Erreur : ' . $e->getMessage() . '</h2>');
}