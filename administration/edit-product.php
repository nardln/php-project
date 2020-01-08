<!DOCTYPE html>
<?php
  include ("../utils/connect.php");

  $product_id = '';
  $uploaded_image_name = '';

  if(isset($_GET['product_id']) ? $_GET['product_id'] : '') {
    $product_id = $_GET['product_id'];
  }

  $sql = "SELECT * FROM products WHERE product_id=" . $product_id;
  $result = $mysqli -> query($sql);

  if ($result -> num_rows == 0) { // If no products found with a specific id
    header("Location: edit-error.php");
  } else {
    $row = $result -> fetch_assoc();
  }

  if (!empty($_POST["edit"])) {
    $errors = array();

    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $short_description = $_POST['short-description'];
    $full_description = $_POST['full-description'];
    $product_availability = $_POST['product_availability'];
    $product_price_discount = $_POST['product_price_discount'];

    $sql_edit = "UPDATE products SET product_name=\"" . $product_name . "\",product_price="
                .$product_price . ",product_image=\"" . $product_image . "\"" . ",product_category=\""
                . $product_category . "\",product_short_descr=\""
                .$short_description . "\",product_full_descr=\"" . $full_description . "\",product_availability="
                .$product_availability . ",product_price_discount=" . $product_price_discount
                . " WHERE product_id=" . $product_id;

    $query = $mysqli -> query($sql_edit);

    header("Location: products.php?modified=" . $product_id);

    // Close database connection
    $mysqli -> close();
  }

  $uploadOk = 1;
  if(isset($_POST["upload"])) {
    // File upload code
    $target_dir = "./../produc_imgs/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";

    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $uploaded_image_name = $_FILES["fileToUpload"]["name"];
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administrare</title>
    <link href='commons.css' rel='stylesheet'>
    <link href='edit-product.css' rel='stylesheet'>
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
      <form action="#" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="upload" name="upload">
      </form>
      <form action="#" id= "edit-form" name="edit-form" method="post">
        <table>
          <tr>
            <td class="left-side"><label>Nume produs</label></td>
            <td><input type="text" name="product_name" id="product_name" value="<?php echo $row["product_name"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Nume imagine</label></td>
            <td><input type="text" name="product_image" id="product_image" value="<?php
              if ($uploaded_image_name != '') {
                echo $uploaded_image_name;
              } else {
                echo $row["product_image"];
              }
             ?>"></td>
            <img id="product_image_img" src="<?php
              if ($_FILES != null) {
                echo './../produc_imgs/' . $_FILES["fileToUpload"]["name"];
              } else {
                echo './../produc_imgs/' . $row['product_image'];
              }
            ?>">
          </tr>
          <tr>
            <td class="left-side"><label>Pret</label></td>
            <td><input type="text" name="product_price" id="product_price" value="<?php echo $row["product_price"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Categorie produs</label></td>
            <td><input type="text" name="product_category" id="product_category" value="<?php echo $row["product_category"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Scurta descriere</label></td>
            <td><textarea id="short-description" class="text" cols="86" rows ="20" name="short-description" form="edit-form"><?php echo $row["product_short_descr"]?></textarea></td>
          </tr>
          <tr>
            <td class="left-side"><label>Descriere completa</label></td>
            <td><textarea id="full-description" class="text" cols="86" rows ="20" name="full-description" form="edit-form"><?php echo $row["product_full_descr"]?></textarea></td>
          </tr>
          <tr>
            <td class="left-side"><label>Numar produse pe stoc</label></td>
            <td><input type="text" name="product_availability" id="product_availability" value="<?php echo $row["product_availability"]?>"></td>
          </tr>
          <tr>
            <td class="left-side"><label>Reducere din pret</label></td>
            <td><input type="text" name="product_price_discount" id="product_price_discount" value="<?php echo $row["product_price_discount"]?>"></td>
          </tr>
        </table>
        <input id="edit" type="submit" name="edit" value="edit">
      </form>
      <button id="cancel-edit">Cancel</button>
    </div>
  </body>
</html>
