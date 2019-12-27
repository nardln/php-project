<?php  
  include ("connect.php");
  session_start();
  
  if(isset($_POST['submit']))
  {
    //
   $username = htmlentities($_POST['username'],ENT_QUOTES);
   $email = htmlentities($_POST['email'],ENT_QUOTES); 
   $password = htmlentities($_POST['password'],ENT_QUOTES); 
   //we check if they are completed
  if ($username == '' || $email == ''||$password=='') 
  {   
    //if they are empty, a message is displayed
    $error = 'ERROR: Campuri goale!';
   }else 
    // insert
   if($stmt = $mysqli->prepare("INSERT into users (username,email,password) VALUES(?,?,?)"))
   {
    $stmt->bind_param("sss",$username,$email,$password);
    $stmt->execute();
    $stmt->close();
   }
   // errror inserting
   else{
    echo"ERROR:Nu se poate executa insert.";
   }
  }

  //close conection mysqli
  $mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register page</title>
  <link href='register.css' rel='stylesheet'>
</head>
<body>
  <div class="header">
    <h1>Register</h1>
    <p>Please fill in this form to create an account<p>
  </div>
  <form action="register.php" method="post">
    <p>
      <label>Username</label>
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label>Email Address</label>
      <input type="text" name="email" id="email">
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" id="password">
    </p>
    <input type="submit" name="submit" value="Registration">
  </form>   
</body>
</html>
