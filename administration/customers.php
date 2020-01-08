<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  // Create sql query
  $sql = "SELECT customer_id, customer_username, customer_email, customer_country, customer_city, customer_street, customer_postal_code, customer_card_type, customer_card_no, customer_card_expire, customer_subscribe FROM customers";

  if(isset($_GET['delete']) ? $_GET['delete'] : '') {
    $customer_id = intval($_GET['delete']);
    $sql_delete = "DELETE FROM customers WHERE customer_id=" . $customer_id;
    $result_delete = $mysqli -> query($sql_delete);

    header("Location: customers.php");
  }

  // Execute sql query
  $result = $mysqli -> query($sql);

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
        if ($result -> num_rows > 0) { // If table not empty...

          // Create table header
          echo "<table>
                  <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>Postal code</th>
                    <th>Card type</th>
                    <th>Card number</th>
                    <th>Card expire date</th>
                    <th>Subscribed to newsletter</th>
                    <th></th>
                    <th></th>
                  </tr>";
          // Output data of each row
          while($row = $result -> fetch_assoc()) {
            echo "<tr><td>" . $row["customer_username"]. "</td><td>"
            . $row["customer_email"]. "</td><td>"
            . $row["customer_country"]. "</td><td>"
            . $row["customer_city"]. "</td><td>"
            . $row["customer_street"]. "</td><td>"
            . $row["customer_postal_code"]. "</td><td>"
            . $row["customer_card_type"]. "</td><td>"
            . $row["customer_card_no"]. "</td><td>"
            . $row["customer_card_expire"]. "</td><td>"
            . $row["customer_subscribe"]. "</td><td>"
            . "<td><a href=\"edit-customer.php?customer_id=" . $row["customer_id"] . "\"><img src=\"../icons/edit.svg\"></a>"
            . "</td><td><a href=\"customers.php?delete=" . $row["customer_id"] . "\"><img src=\"../icons/delete.svg\"></a>"
            . "</td></tr>";
          }

          // Close table tag
          echo "</table>";
        } else { // If table empty...
            echo "0 results";
        }
      ?>
      <a href="add-customer.php?add=new">Add new customer</a>
    </div>
  </body>
</html>
