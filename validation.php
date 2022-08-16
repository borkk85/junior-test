<?


/** @var $pdo \PDO */

include 'database.php';

$errors = [];

$sku = '';
$name = '';
$price = '';
$size = '';
$weight = '';
$dimension = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $size = $_POST['size'];
  $weight = $_POST['weight'];
  $dimension = $_POST['dimension'];
    
    if(!$sku) {
      $errors[] = 'Please, submit required data';
    }
    if(!$name) {
      $errors[] = 'Please, submit required data';
    }
    if(!$price) {
      $errors[] = 'Please, submit required data';
    }
    if(!$size) {
      $errors[] = 'Product size is required';
    }
    if(!$weight) {
      $errors[] = 'Product weight is required';
    }
    if(!$dimension) {
      $errors[] = 'Product dimension is required';
    }
    
    if(empty($errors)){

        $statement = $pdo->prepare("INSERT INTO skandi (sku, name, price, size, weight, dimension)
        VALUES(:sku, :name, :price, :size, :weight, :dimension) ");
       
       $statement->bindValue(':sku', $sku);
       $statement->bindValue(':name', $name);
       $statement->bindValue(':price', $price);
       $statement->bindValue(':size', $size);
       $statement->bindValue(':weight', $weight);
       $statement->bindValue(':dimension', $dimension);
       $statement->execute();

     }
    }

    ?>

