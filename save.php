<?php

/** @var $pdo \PDO */

require 'database.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST')  {

$sku = $_POST['sku'];
$sku = filter_var($sku, FILTER_SANITIZE_STRING);
$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);
$price = $_POST['price'];
$price = filter_var($price, FILTER_SANITIZE_STRING);
$productType = $_POST['productType'];
$productType = filter_var($productType, FILTER_SANITIZE_STRING);
$size = $_POST['size'];
$size = filter_var($size, FILTER_SANITIZE_STRING);
$weight = $_POST['weight'];
$weight = filter_var($weight, FILTER_SANITIZE_STRING);
$height = $_POST['height'];
$height = filter_var($height, FILTER_SANITIZE_STRING);
$length = $_POST['length'];
$length = filter_var($length, FILTER_SANITIZE_STRING);
$width = $_POST['width'];
$width = filter_var($width, FILTER_SANITIZE_STRING);

$statement_products = $pdo->prepare("SELECT * FROM skandi WHERE sku = :sku");
$statement_products->bindParam(':sku', $sku);
$statement_products->execute();

if($statement_products->rowCount() > 0)
{
  $message[] = 'product name already exists!';
}
else 
{
  $insert_statement = $pdo->prepare("INSERT INTO skandi (sku, name, price, productType, size, weight, height, length, width) VALUES(:sku, :name, :price, :productType, :size, :weight, :height, :length, :width) ");

$insert_statement->bindParam(':sku', $sku);
$insert_statement->bindParam(':name', $name);
$insert_statement->bindParam(':price', $price);
$insert_statement->bindParam(':productType', $productType);
$insert_statement->bindParam(':size', $size);
$insert_statement->bindParam(':weight', $weight);
$insert_statement->bindParam(':height', $height);
$insert_statement->bindParam(':length', $length);
$insert_statement->bindParam(':width', $width);
$insert_statement->execute();
header('Location: index.php');
}

}



?>