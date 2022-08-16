<?php


/** @var $pdo \PDO */

require_once 'database.php';


// if(isset($_POST['delete'])) {
//     if(isset($_POST['checkbox'])) {
//         foreach($_POST['checkbox'] as $checkbox) {
//             $statement = $pdo->prepare('DELETE FROM skandi Where id = :id');
//             $statement->bindParam(':id', $chechbox);
//             $statement->execute();
//             echo '<pre>';
// var_dump($checkbox);
// echo '</pre>';
//         }
//     }

//     header('Location: index.php');
// }

$id = $_POST['id'] ?? null;

if(!$id) {
    header('location: index.php ');
    exit;
}

            $statement = $pdo->prepare('DELETE FROM skandi where id = :id');
            $statement->bindValue(':id', $id);
            $statement->execute();

            header('Location: index.php');

// echo '<pre>';
// var_dump($id);
// echo '</pre>';

 ?>

