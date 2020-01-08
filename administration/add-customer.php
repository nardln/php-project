<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  if (!empty($_POST)) {
    $errors = array();

    $customer_username = $_POST['customer_username'];
    $customer_email = $_POST['customer_email'];
    $customer_country = $_POST['customer_country'];
    $customer_city = $_POST['customer_city'];
    $customer_street = $_POST['customer_street'];
    $customer_postal_code = $_POST['customer_postal_code'];
    $customer_card_type = $_POST['customer_card_type'];
    $customer_card_no = $_POST['customer_card_no'];
    $customer_card_expire = $_POST['customer_card_expire'];
    $customer_subscribe = $_POST['customer_subscribe'];

    $sql_add = "INSERT INTO customers (customer_username,"
                                    . "customer_email,"
                                    . "customer_country,"
                                    . "customer_city,"
                                    . "customer_street,"
                                    . "customer_postal_code,"
                                    . "customer_card_type,"
                                    . "customer_card_no,"
                                    . "customer_card_expire,"
                                    . "customer_subscribe"
                                    . ")"
                . "VALUES (\"" . $customer_username . "\","
                        . "\"" . $customer_email . "\","
                        . "\"" . $customer_country . "\","
                        . "\"" . $customer_city . "\","
                        . "\"" . $customer_street . "\","
                        . "\"" . $customer_postal_code . "\","
                        . "\"" . $customer_card_type . "\","
                        . "\"" . $customer_card_no . "\","
                        . "\"" . $customer_card_expire . "\","
                        . "\"" . $customer_subscribe . "\""
                               . ")";

    // echo $sql_add;
    $query = $mysqli -> query($sql_add);
    // echo $sql_add;

    header("Location: customers.php?added=");

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
            <td class="left-side"><label>Username</label></td>
            <td><input type="text" name="customer_username" id="customer_username" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Email</label></td>
            <td><input type="text" name="customer_email" id="customer_email" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Country</label></td>
            <td><input type="text" name="customer_country" id="customer_country" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>City</label></td>
            <td><input type="text" name="customer_city" id="customer_city" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Street</label></td>
            <td><input type="text" name="customer_street" id="customer_street" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Postal code</label></td>
            <td><input type="text" name="customer_postal_code" id="customer_postal_code" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Card type</label></td>
            <td><input type="text" name="customer_card_type" id="customer_card_type" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Card number</label></td>
            <td><input type="text" name="customer_card_no" id="customer_card_no" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Card expire</label></td>
            <td><input type="text" name="customer_card_expire" id="customer_card_expire" ></td>
          </tr>
          <tr>
            <td class="left-side"><label>Subscribed to newsletter</label></td>
            <td><input type="checkbox" name="customer_subscribe" id="customer_subscribe" ></td>
          </tr>
        </table>
        <input id="add-product" type="submit" name="submit" >
      </form>
      <button id="cancel-add">Cancel</button>
    </div>
  </body>
</html>
