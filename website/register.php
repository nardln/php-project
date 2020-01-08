<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  if (!empty($_POST)) {
    $errors = array();

    $customer_card_expire = $_POST['customer_card_expire'];
    $customer_card_no = $_POST['customer_card_no'];
    $customer_card_type = $_POST['customer_card_type'];
    $customer_city = $_POST['customer_city'];
    $customer_country = $_POST['customer_country'];
    $customer_email = $_POST['customer_email'];
    $customer_name = $_POST['customer_name'];
    $customer_password = $_POST['customer_password'];
    $customer_postal_code = $_POST['customer_postal_code'];
    $customer_street = $_POST['customer_street'];
    $customer_username = $_POST['customer_username'];
    $customer_subscribe = 0; // default as no subscribe
    if (isset($_POST['customer_subscribe'])) {
      if ($_POST['customer_subscribe'] == 'on') {
        $customer_subscribe = 1;
      } else {
        $customer_subscribe = 0;
      }
    }

    $sql_add = "INSERT INTO customers (customer_card_expire,"
                                    . "customer_card_no,"
                                    . "customer_card_type,"
                                    . "customer_city,"
                                    . "customer_country,"
                                    . "customer_email,"
                                    . "customer_name,"
                                    . "customer_password,"
                                    . "customer_postal_code,"
                                    . "customer_street,"
                                    . "customer_username,"
                                    . "customer_subscribe)"
                . "VALUES (\"" . $customer_card_expire .  "\","
                        . "\"" . $customer_card_no . "\","
                        . "\"" . $customer_card_type . "\","
                        . "\"" . $customer_city . "\","
                        . "\"" . $customer_country . "\","
                        . "\"" . $customer_email . "\","
                        . "\"" . $customer_name . "\","
                        . "\"" . $customer_password . "\","
                        . "\"" . $customer_postal_code . "\","
                        . "\"" . $customer_street . "\","
                        . "\"" . $customer_username . "\","
                               . $customer_subscribe . ")";

    $query = $mysqli -> query($sql_add);

    header("Location:login.php");

    // Close database connection
    $mysqli -> close();
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href='register.css' rel='stylesheet'>
  </head>
  <body>
      <div class="header">
        <div class="register-box">
          <img src="../icons/avatar.png" class="avatar" alt="avatar">
        <h1>Register</h1>
        <p id="paragraf">Please fill in this form to create an account<p>
        <form action="register.php" method="post">
          <p>Nume</p>
            <input type="text" name="customer_name" id="customer_name" required>
          <p>Username</p>
              <input type="text" name="customer_username" id="customer-username" required>
          <p>Adresa de email</p>
              <input type="text" name="customer_email" id="customer_email" required>
          <p>Parola</p>
              <input type="password" name="customer_password" id="customer_password" required>
          <p>Strada</p>
              <input type="text" name="customer_street" id="customer_street" required>
          <p>Oras</p>
              <input type="text" name="customer_city" id="customer_city" required>
          <p>Tara</p>
              <input type="text" name="customer_country" id="customer_country" required>
          <p>Cod postal</p>
              <input type="text" name="customer_postal_code" id="customer_postal_code" required>
          <p>Numarul cardului</p>
              <input type="text" name="customer_card_no" id="customer_card_no" required>
          <p>Data expirarii cardului</p>
              <input type="text" name="customer_card_expire" id="customer_card_expire" required>
          <p>Tipul cardului</p>
              <input type="text" name="customer_card_type" id="customer_card_type" required>
          <!--<p>Subscribed to newsletter</p
             <input type="checkbox" name="customer_subscribe" id="customer_subscribe">-->
         <p>Subscribed to newsletter</p>
              <input type="checkbox"  name="customer_subscribe" id="customer_subscribe"><br>

      <input type="submit" name="submit" value="Register" id="register">
      <a href="login.php"input type="submit" name="submit" value="Login" id="login">Login</a>
   </form>
   </div>
  </div>
  </body>
</html>
