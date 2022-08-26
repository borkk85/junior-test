<?php


/** @var $pdo \PDO */

require 'database.php';
$statement = $pdo->prepare("SELECT * FROM skandi");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
$counter = 1;


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

</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
      <button class="add-btn" id="addBtn">ADD</button>
      <button class="mass-btn" type="submit"  id="delete-product-btn" form="delete_form" name="delete" value="delete">MASS DELETE</button>
    </nav>
  </header>
  <section class="product-list-wrapper">
    <form method="POST" action="delete.php" id="delete_form">
      <?php foreach ($products as $product) : ?>
        <?php if ($counter % 2 != 0) : ?>
          <table>
            <tbody>
              <tr class="content">
                <th> <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="<?php echo $product['id'] ?>"> </th>
                <td style="visibility: hidden"><?php echo $product['id'] ?></td>
                <td><?php echo $product['SKU'] ?></td>
                <td><?php echo $product['Name'] ?></td>
                <td><?php echo $product['Price'] ?>$</td>
                <?php if ($product["productType"] == "dvd") : ?>
                  <td> Size: <?= $product['Size'] ?> MB </td>
                <?php elseif ($product["productType"] == "book") : ?>
                  <td> Weight: <?= $product['Weight'] ?> KG </td>
                <?php elseif ($product["productType"] == "furniture") : ?>
                  <td> Dimensions: <?= $product['Height'] ?> x <?= $product['Length'] ?> x <?= $product['Width'] ?> CM </td>
                <?php endif; ?>
              </tr>
            </tbody>
          </table>
        <?php endif; ?>
      <?php endforeach; ?>
    </form>
  </section>
  <footer class="footer-wrap">
    <div class="footer">
      <h2>Scandiweb Test Assignement</h2>
    </div>
  </footer>
  <script src="js/main.js"></script>
</body>

</html>