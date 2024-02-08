<?php 

try {
    $pdo = new PDO('mysql:dbname=projetphp;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<h2 style="color:#00a400a9">Connetion à la DB établie</h2>';
} catch (PDOException $e) {
    die('<h2 style="color:red">Erreur : ' . $e->getMessage() . '</h2>');
}

?>