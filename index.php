<?php


/** @var $pdo \PDO */

require_once 'database.php';

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
      <button class="add-btn" id="addBtn">ADD</a> </button>
      <button type="submit" id="deleteBtn" form="delete_form" name="delete" value="delete">Delete</button>
    </nav>
  </header>
  <section class="product-list-wrapper">
    <?php foreach ($products as $product) : ?>
      <?php if ($counter % 2 != 0) : ?>
        <div class="div-box">
          <form method="POST" action="delete.php" id="delete_form">
            <input type="checkbox" name="id" value="<?php echo $product['id'] ?>">
            <table>
              <tbody>
                <tr class="content">
                  <th style="visibility: hidden"><?php echo $product['id'] ?></th>
                  <td><?php echo $product['SKU'] ?></td>
                  <td><?php echo $product['Name'] ?></td>
                  <td><?php echo $product['Price'] ?></td>
                  <td><?php echo $product['Size'] ?></td>
                  <td><?php echo $product['Weight'] ?></td>
                  <td><?php echo $product['Dimension'] ?></td>
                </tr>
              </tbody>
            </table>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </section>
  <footer class="footer-wrap">
    <div class="footer">
      <h2>Scandiweb Test Assignement</h2>
    </div>
  </footer>
  <script src="js/main.js"></script>
</body>

</html>