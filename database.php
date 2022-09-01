<?php

$servername = "localhost";
$username = "id19427212_bork";
$password = "H^FyW5fi^aA&Dgx?";
$database = "id19427212_test";

try {

    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // echo "Connected Successfully";
    
} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}


?>
