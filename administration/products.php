<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  $sql = "SELECT product_id, product_name, product_price, product_category, product_availability, product_price_discount FROM products";
  $result = $mysqli -> query($sql);

  if(isset($_GET['delete']) ? $_GET['delete'] : '') {
    $product_id = intval($_GET['delete']);
    $sql_delete = "DELETE FROM products WHERE product_id=" . $product_id;
    $result_delete = $mysqli -> query($sql_delete);

    header("Location: products.php");
  }

  if(isset($_GET['edit']) ? $_GET['edit'] : '') {

  }

  if(isset($_GET['add']) ? $_GET['add'] : '') {
    header("Location: add-product.php");
  }

  // Close database connection
  $mysqli -> close();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administrare</title>
    <link href='commons.css' rel='stylesheet'>
  </head>
  <body>
    <div id="header">
      <div id="header-links">
        <a href="products.php">Produse</a>
        <a href="comenzi.php">Comenzi</a>
        <a href="customers.php">Clienti</a>
      </div>
    </div>
    <div id="content">
      <?php
        if(isset($_GET['modified']) ? $_GET['modified'] : '') {
          $modified_product_id = $_GET['modified'];

          echo "Modified " . $modified_product_id;
        }
        if ($result -> num_rows > 0) { // If table not empty...

          // Create table header
          echo "<table>
                  <tr>
                    <th>Nume</th>
                    <th>Pret</th>
                    <th>Categorie</th>
                    <th>Disponibilitate</th>
                    <th>Reducere</th>
                    <th></th>
                    <th></th>
                  </tr>";
          // Output data of each row
          while($row = $result -> fetch_assoc()) {
            echo "<tr><td>" . $row["product_name"]. "</td><td>"
            . $row["product_price"]. "</td><td>"
            . $row["product_category"]. "</td><td>"
            . $row["product_availability"]. "</td><td>"
            . $row["product_price_discount"]. "</td><td><a href=\"edit-product.php?product_id=" . $row["product_id"] . "\"><img src=\"../icons/edit.svg\"></a>"
            . "</td><td><a href=\"products.php?delete=" . $row["product_id"] . "\"><img src=\"../icons/delete.svg\"></a>"
            . "</td></tr>";
          }

          // Close table tag
          echo "</table>";
        } else { // If table empty...
            echo "0 results";
        }
      ?>
      <a href="products.php?add=new">Add new product</a>
    </div>
  </body>
</html>
