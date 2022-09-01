<?php

/** @var $pdo \PDO */

require 'database.php';

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.3.0/lodash.js"></script>
    
    <script>
  document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM ready!");
  });

</script>


  <script>


    $(document).ready(function() {
      $("#product_form").validate({

        rules: {
          sku: 'required',
          name: 'required',
          price: 'required',
          productType: 'required',
          size: 'required',
          weight: 'required',
          height: 'required',
          length: 'required',
          width: 'required', 
          agree: 'required'
        },

        messages: {
          sku: {
            required: "Please, enter valid SKU"
          },
          name: {
            required: "Please, enter product name"
          },
          price: {
            required: "Please, enter price"
          },
          productType: {
            required: "Please select one of the options"
          },
          size: {
            required: "Please, provide the size of the DVD"
          },
          weight: {
            required: "Please, provide the weight"
          },
          height: {
            required: "Please, provide the required dimension"
          },
          length: {
            required: "Please, provide the required dimension"
          },
          width: {
            required: "Please, provide the required dimension"
          }
        },

        submitHandler: function (form) {
                form.save();
            }
      });
    });

    </script>
</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
      <button class="save-btn"  id="save" type="submit" name="save" value='Save' form="product_form">Save</button>
      <button class="cancel-btn" id="cancelBtn" action="action" type="button" value="Cancel" onclick="location.href='index.php'"> CANCEL</button>
    </nav>
  </header>

  <section class="product-form">
    <form action='save.php' method="post" id="product_form" name="product_form">
      <div class="input-data">
        <label id="sku-label" for="sku">SKU</label>
        <input type="text" name="sku" id="sku" class="form-control" placeholder="#sku"  />
      </div>
      <div class="input-data">
        <label id="name-label" for="name">Name </label>
        <input type="text" name="name" id="name" class="form-control" placeholder="#name"  />
      </div>
      <div class="input-data">
        <label id="price-label" for="price">Price ($)</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="#price"  />
      </div>

      <div class="input-switcher">
        <label for="productType">Type Switcher</label>
        <select id="productType" name="productType" onchange="selectChanged()">
          <option value="" style="visibility: hidden;">Please select</option>
          <option value="dvd">DVD</option>
          <option value="book">Book</option>
          <option value="furniture">Furniture</option>
        </select>
      </div>
      <div id="dvd">
        <div class="data-input product">
          <label for="size">Size (MB):</label>
          <input type="number" id="size" name="size" class="form-control " >
          <p class="describe">Please provide size in (MB)</p>
        </div>
      </div>

      <div id="book">
        <div class="data-input product">
          <label for="weight">Weight (KG):</label>
          <input type="number" id="weight" name="weight" class="form-control " >
          <p class="describe">Please provide weight in KG</p>
        </div>

      </div>

      <div id="furniture">
        <div class="data-input product">
          <label for="height">Height (CM):</label>
          <input type="number" id="height" name="height" class="form-control " >
          <p class="describe">Please provide measurements in (CM)</p>
        </div>
        <div class="data-input product">
          <label for="length">Length (CM):</label>
          <input type="number" id="length" name="length" class="form-control" >
          <p class="describe">Please provide measurements in (CM)</p>
        </div>
        <div class="data-input product">
          <label for="width">Width (CM):</label>
          <input type="number" id="width" name="width" class="form-control " >
          <p class="describe">Please provide measurements in (CM)</p>
        </div>

      </div>

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
