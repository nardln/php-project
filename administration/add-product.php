<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  if (!empty($_POST)) {
    $errors = array();

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $short_description = $_POST['short-description'];
    $full_description = $_POST['full-description'];
    $product_availability = $_POST['product_availability'];
    $product_price_discount = $_POST['product_price_discount'];

    $sql_add = "INSERT INTO products (product_name,"
                                    . "product_price,"
                                    . "product_image,"
                                    . "product_category,"
                                    . "product_short_descr,"
                                    . "product_full_descr,"
                                    . "product_availability,"
                                    . "product_price_discount)"
                . "VALUES (\"" . $product_name . "\","
                        . "\"" . $product_price . "\","
                        . "\"" . "abc" . "\","
                        . "\"" . $product_category . "\","
                        . "\"" . $short_description . "\","
                        . "\"" . $full_description . "\","
                               . $product_availability . ","
                               . $product_price_discount . ")";

    // echo $sql_add;
    $query = $mysqli -> query($sql_add);

    header("Location: products.php?added=");

    // Close database connection
    $mysqli -> close();
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administrare</title>
    <link href='commons.css' rel='stylesheet'>
    <link href='add-product.css' rel='stylesheet'>
  </head>
  <body>
    <div id="header">
      <div id="header-links">
        <a href="products.php">Produse</a>
        <a href="orders.php">Comenzi</a>
        <a href="customers.php">Clienti</a>
      </div>
    </div>
    <div id="content">
      <form action="#" id= "add-form" name="add-form" method="post">
        <table>
          <tr>
            <td class="left-side"><label>Nume produs</label></td>
            <td><input type="text" name="product_name" id="product_name" required></td>
          </tr>
          <tr>
            <td class="left-side"><label>Pret</label></td>
            <td><input type="text" name="product_price" id="product_price" required></td>
          </tr>
          <tr>
            <td class="left-side"><label>Categorie produs</label></td>
            <td><input type="text" name="product_category" id="product_category" required></td>
          </tr>
          <tr>
            <td class="left-side"><label>Scurta descriere</label></td>
            <td><textarea id="short-description" class="text" cols="86" rows ="20" name="short-description" form="add-form"></textarea></td>
          </tr>
          <tr>
            <td class="left-side"><label>Descriere completa</label></td>
            <td><textarea id="full-description" class="text" cols="86" rows ="20" name="full-description" form="add-form"></textarea></td>
          </tr>
          <tr>
            <td class="left-side"><label>Numar produse pe stoc</label></td>
            <td><input type="text" name="product_availability" id="product_availability" required></td>
          </tr>
          <tr>
            <td class="left-side"><label>Reducere din pret</label></td>
            <td><input type="text" name="product_price_discount" id="product_price_discount" required></td>
          </tr>
        </table>
        <input id="add-product" type="submit" name="submit" value="Add">
      </form>
      <button id="cancel-add">Cancel</button>
    </div>
  </body>
</html>
