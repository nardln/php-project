<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  // Check database connection
  if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (!empty($_POST)) { // If fields are not filled in...
    $errors = array();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true || empty($password) === true ) {
      $errors[] = 'Both the username and password are required!';
    } else {

      // Send the authentication information
      $sql = "SELECT * FROM `administrators` WHERE `username` = '$username' AND `password` = '$password'";
      $query = $mysqli -> query($sql);

      if ($query -> num_rows == 1) {
        echo "Logged in!";
        header("Location: portal.php");
      } else {
        $errors[] = "Wrong username or password!";
        echo "Wrong username or password!";
      }
    }
  }

  $mysqli -> close(); // Close database connection
?>

<html>
<head>
  <title>Login</title>
</head>
<body>
  <div class="header">
    <h1>Login</h1>
  </div>
  <form action="login.php" method="post">
    <p>
      <label>Username</label>
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" id="password">
    </p>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
