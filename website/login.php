<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  // Check database connection
  if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (!empty($_POST)) { // If fields are filled in...
    $errors = array();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true || empty($password) === true ) {
      $errors[] = 'Both the username and password are required!';
    } else {

      // Send the authentication information
      $sql = "SELECT * FROM `customers` WHERE `customer_username` = '$username' AND `customer_password` = '$password'";
      $query = $mysqli -> query($sql);


      if ($query -> num_rows == 1) {

        header("Location: pet-shop.php");

     }else
     {
       header("location:login.php?error=1");
      /*$errors = "Incorrect username or password.";
      echo "Incorrect username or password.";*/
    }
    /*if(($usernmame["username"] == $login["username"]) && ($username["password"] == $login["password"]))
     { echo "You are logged in"; } else echo "Incorrect username or password.";*/
    }
  }

  $mysqli -> close(); // Close database connection
?>

<html>
<head>
  <title>Login</title>
  <link href='login.css' rel='stylesheet'>
</head>
<body>

  <div class="header">

    <div class="login-box">
      <img src="../icons/avatar.png" class="avatar" alt="avatar">
      <?php   If(isset($_GET['error']) && $_GET['error'] == 1){ ?>
       <h3 class="login-error">Invalid username or password</h3>
 <?php } ?>
        <h1>Login</h1>
        <form action="login.php" method="post">

          <p>Username</p>
            <input type="text" name="username" id="username">
          <p>Password</p>
              <input type="password" name="password" id="password">

          <input type="submit" name="submit" value="Login" id="login">

        </form>

    </div>
  </div>

  </div>
    <!--<h1>Login</h1>

  </div>
  <form action="login.php" method="post">
    <p>
      <label>Username</label>
      <img src="">
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" id="password">
    </p>
    <input type="submit" name="submit" value="Login">
  </form>
-->
</body>
</html>
