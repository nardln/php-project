<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  $customer_id = '';

  if(isset($_GET['customer_id']) ? $_GET['customer_id'] : '') {
    $customer_id = $_GET['customer_id'];
  }

  $sql = "SELECT * FROM customers WHERE customer_id=" . $customer_id;
  $result = $mysqli -> query($sql);

  if ($result -> num_rows == 0) { // If no customers were found with a specific id
    header("Location: edit-error.php");
  } else {
    $row = $result -> fetch_assoc();
  }

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

    $sql_edit = "UPDATE customers SET customer_username=\"" . $customer_username . "\",customer_city=\""
                .$customer_city . "\",customer_street=\"" . $customer_street . "\",customer_postal_code=\""
                .$customer_postal_code . "\",customer_card_type=\"" . $customer_card_type . "\",customer_card_no=\""
                .$customer_card_no . "\",customer_card_expire=\"" . $customer_card_expire . "\",customer_subscribe="
                .$customer_subscribe. " WHERE customer_id=" . $customer_id;

    // Execute command
    $query = $mysqli -> query($sql_edit);

    header("Location: customers.php?modified=" . $customer_id);
    echo "This was the command that was run:" . $sql_edit;
    // Close database connection
    $mysqli -> close();
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administrare</title>
    <link href='commons.css' rel='stylesheet'>
    <link href='edit-customer.css' rel='stylesheet'>
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
      <form action="#" id= "edit-form" name="edit-form" method="post">
        <table>
          <tr>
            <td class="left-side"><label>Username</label></td>
            <td><input type="text" name="customer_username" id="customer_username" value="<?php echo $row["customer_username"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Email</label></td>
            <td><input type="text" name="customer_email" id="customer_email" value="<?php echo $row["customer_email"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Country</label></td>
            <td><input type="text" name="customer_country" id="customer_country" value="<?php echo $row["customer_country"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>City</label></td>
            <td><input type="text" name="customer_city" id="customer_city" value="<?php echo $row["customer_city"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Street</label></td>
            <td><input type="text" name="customer_street" id="customer_street" value="<?php echo $row["customer_street"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Postal code</label></td>
            <td><input type="text" name="customer_postal_code" id="customer_postal_code" value="<?php echo $row["customer_postal_code"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Card type</label></td>
            <td><input type="text" name="customer_card_type" id="customer_card_type" value="<?php echo $row["customer_card_type"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Card number</label></td>
            <td><input type="text" name="customer_card_no" id="customer_card_no" value="<?php echo $row["customer_card_no"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Card expire</label></td>
            <td><input type="text" name="customer_card_expire" id="customer_card_expire" value="<?php echo $row["customer_card_expire"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Subscribed to newsletter</label></td>
            <td><input type="text" name="customer_subscribe" id="customer_subscribe" value="<?php echo $row["customer_subscribe"]?>"></td>
          </tr>
        </table>
        <input id="edit" type="submit" name="submit" value="Edit">
      </form>
      <button id="cancel-edit">Cancel</button>
    </div>
  </body>
</html>
