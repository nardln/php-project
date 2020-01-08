<!DOCTYPE html>
<body>
  <html lang="en" dir="ltr">
<?php
  include ("../utils/connect.php");

  $product_id;

  $sql = "SELECT product_name, product_price, product_image, product_category,product_short_descr, product_full_descr,product_price_discount FROM products";
  $result = $mysqli -> query($sql);

            echo "<table>
                  <tr>
                    <th>Nume produs</th>
                    <th>Pret</th>
                    <th>Imagine</th>
                    <th>Categorie</th>
                    <th>Scurta descriere</th>
                    <th>Descriere completa</th>
                    <th>Reducere</th>
                  </tr>";
          // Output data of each row
          while($row = $result -> fetch_assoc()) {
            echo "<tr><td>" . $row["product_name"]. "</td><td>"
            . $row["product_price"]. "</td><td>"
            . $row["product_image"]. "</td><td>"
            . $row["product_category"]. "</td><td>"
            . $row["product_short_descr"]. "</td><td>"
            . $row["product_full_descr"]. "</td><td>"
            . $row["product_price_discount"]. "</td><td>"
            . "</td></tr>";
          }
            echo "</table>";
        $mysqli -> close();
  ?>
  </body>
</html>
