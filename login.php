<?php
  include ("connect.php");
  session_start();

  // Check connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (!empty($_POST)){
    $errors = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) === true || empty($password) === true ) {
      $errors[] = '*Username/ Password field is required';
    } else {

      // if email exists
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $query = $connect->query($sql);

      if ($query->num_rows > 0) {

        // check email and password
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $query = $connect -> query($sql);
        $result = $query -> fetch_array();

        $connect -> close();

        if($query -> num_rows == 1){
          echo "OK";
        } else {
          $errors[] = '*Email/Password combination is incorrect';
        }
      } else {
        $errors[] = '*Email doesn\'t exists';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <link href='login.css' rel='stylesheet'>
</head>
<body>
  <div class="header">
    <h1>Login</h1>
  </div>
  <form action="login.php" method="post">
    <p>
      <label>Email Address</label>
      <input type="text" name="email" id="email" placeholder="Enter your email">
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" id="password" placeholder="Enter your password">
    </p>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
