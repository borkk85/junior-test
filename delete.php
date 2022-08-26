<?php


/** @var $pdo \PDO */

require 'database.php';


if(isset($_POST['delete'])) {
    if(isset($_POST['checkbox'])) {
        foreach($_POST['checkbox'] as $id) {
            $statement = $pdo->prepare('DELETE FROM skandi Where id = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();

            
    // echo '<pre>';
    // var_dump($checkbox);
    // echo '</pre>';
        }
    }
header('Location: index.php');
    
}


 ?>

