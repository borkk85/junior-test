<?php

/** @var $pdo \PDO */

require_once 'database.php';



if(isset($_POST['submit'])) {

$sku = $_POST['sku'];
$sku = filter_var($sku, FILTER_SANITIZE_STRING);
$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);
$price = $_POST['price'];
$price = filter_var($price, FILTER_SANITIZE_STRING);
$size = $_POST['size'];
$size = filter_var($size, FILTER_SANITIZE_STRING);
$weight = $_POST['weight'];
$weight = filter_var($weight, FILTER_SANITIZE_STRING);
$dimension = $_POST['dimension'];
$dimension = filter_var($dimension, FILTER_SANITIZE_STRING);

$statement_products = $pdo->prepare("SELECT * FROM skandi WHERE sku = ?");
$statement_products->execute([$sku]);

if($statement_products->rowCount() > 0)
{
  $message[] = 'product name already exists!';
}
else 
{
  $insert_statement = $pdo->prepare("INSERT INTO skandi (sku, name, price, size, weight, dimension)
VALUES(?, ?, ?, ?, ?, ?) ");
$insert_statement->execute([$sku, $name, $price, $size, $weight, $dimension]);
}
header('Location: index.php');


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style/normalize.css" />
  <link rel="stylesheet" href="style/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        // user have to use id for form and call validate method
        $(document).ready(function() {
$("#product_form").validate({
  messages : {
sku: {
  required: "Please, enter valid SKU"
},
name: {
required: "Please, enter product name",
},
price: {
required: "Please, enter price"
},
size: {
required: "Please, provide size",
number: "Please enter your weight as a numerical value"
}
}
});
});
    </script>
</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
    <button type="submit" name="submit" value='save' form="product_form"> SAVE</button>
     <button id="cancelBtn" action="action" type="button" value="Cancel" onclick="history.back();" > CANCEL</button>
    </nav>
  </header>

  <section class="product-form">
    <form action='' method="post" id="product_form">
      <div class="input-data">
        <label id="sku-label" for="sku">SKU</label>
        <input type="text" name="sku" id="sku" class="form-control" placeholder="#sku" required/>
      </div>
      <div class="input-data">
        <label id="name-label" for="name">Name </label>
        <input type="text" name="name" id="name" class="form-control" placeholder="#name" required />
      </div>
      <div class="input-data">
        <label id="price-label" for="price">Price ($)</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="#price" required />
      </div>

      <div class="input-switcher">
        <label for="lang">Type Switcher</label>
        <select id="productType" name="TypeSwitcher" onchange="selectChanged()">
          <option value="typeswitcher">Please select</option>
          <option value="dvd">DVD</option>
          <option value="book">Book</option>
          <option value="furniture">Furniture</option>
        </select>
      </div>
      <div id="dvd">
        <div class="data-input product">
          <label for="size">Size (MB):</label>
          <input type="number" id="size" name="size"  class="form-control " required>
          <p class="describe">Please provide size in (MB)</p>
        </div>
      </div>

      <div id="book">
        <div class="data-input product">
          <label for="weight">Weight (KG):</label>
          <input type="number" id="weight" name="weight" class="form-control " required>
          <p class="describe">Please provide weight in KG</p>
        </div>

      </div>

      <div id="furniture">
        <div class="data-input product">
          <label for="height">Height (CM):</label>
          <input type="number" id="height" name="dimension" class="form-control " required>
          <p class="describe">Please provide measurements in (CM)</p>
        </div>
        <div class="data-input product">
          <label for="length">Length (CM):</label>
          <input type="number" id="length" name="dimension" class="form-control" required>
          <p class="describe">Please provide measurements in (CM)</p>
        </div>
        <div class="data-input product">
          <label for="width">Width (CM):</label>
          <input type="number" id="width" name="dimension" class="form-control " required>
          <p class="describe">Please provide measurements in (CM)</p>
        </div>

      </div>
     
    </form>

  </section>

  <footer>
    <h2>Scandiweb Test Assignement</h2>
  </footer>

  <script src="js/main.js"></script>

</body>

</html>