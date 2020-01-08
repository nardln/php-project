<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="#" id= "add-form" name="add-form" method="post">
      <div class="header">
        <h1>Register</h1>
        <p>Please fill in this form to create an account<p>
      </div>
      <table>
        <tr>
          <td class="left-side"><label>Nume: </label></td>
          <td><input type="text" name="customer_name" id="customer_name" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Username:</label></td>
          <td><input type="text" name="customer_username" id="customer_username" required></td>
        </tr><tr>
          <td class="left-side"><label>Adresa de email:</label></td>
          <td><input type="text" name="customer_email" id="customer_email" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Parola:</label></td>
          <td><input type="password" name="customer_password" id="customer_password" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Strada:</label></td>
          <td><input type="text" name="customer_street" id="customer_street" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Oraș:</label></td>
          <td><input type="text" name="customer_city" id="customer_city" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Țară:</label></td>
          <td><input type="text" name="customer_country" id="customer_country" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Cod poștal:</label></td>
          <td><input type="text" name="customer_postal_code" id="customer_postal_code" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Numarul cardului de credit:</label></td>
          <td><input type="text" name="customer_card_no" id="customer_card_no" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Data expirarii cardului:</label></td>
          <td><input type="text" name="customer_card_expire" id="customer_card_expire" required></td>
        </tr>
        <tr>
          <td class="left-side"><label>Tipul cardului:</label></td>
          <td><input type="text" name="customer_card_type" id="customer_card_type" required></td>
        </tr>
      </table>
      <button id="register" type="submit" name="submit" value="register">Register</button>
      <button id="login" type="submit" name="submit" value="login">Login</button>
    </form>
  </body>
</html>
