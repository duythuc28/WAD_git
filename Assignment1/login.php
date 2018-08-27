<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a Login page and its function
-->
<?php
session_start();
$errorMessage = "";
if (isset($_SESSION['errorMessage'])) {
  $errorMessage = $_SESSION['errorMessage'];
}
?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
      if (isset($_POST["customerNumber"]) && isset($_POST["customerPassword"])) {
        require 'query.php';
        $customerNumber = $_POST["customerNumber"];
        $password = $_POST["customerPassword"];

        if (is_numeric($customerNumber) && $customerNumber !== "") {
          // Login to server
          $checkCustomer = login($customerNumber, $password);
          if ($checkCustomer->num_rows > 0) {
            $customer = $checkCustomer->fetch_assoc();
            // Check if the password is correct
            if ($customer["customer_password"] === $password) {
              $_SESSION['customerEmail'] = $customer["customer_email"];
              $_SESSION['customerNumber'] = $customerNumber;
              $_SESSION['customerName'] = $customer["customer_name"];
              header('Location: request.php');
            } else {
              $errorMessage = "Incorrect password, please try again";
            }
          } else {
            $errorMessage = "This user doen't exist";
          }
        } else {
            $errorMessage = "Invalid customer number, it must be number";
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en-US">
<header>
  <title>ShipOnline Login System</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/form.css" />
</header>
<body>
  <h1>ShipOnline System Login Page</h1>
  <div class="form">
    <form method="post">
      Customer Number: <input type="text" name="customerNumber" required/>
      <br /> <br />Password: <input type="password" name="customerPassword" required/>
      <br /> <br /> <input type="submit" name="login" value="Log in" />
      <span class="error">
        <?php
          echo  "<br /> <br />" .$errorMessage;
          unset($_SESSION['errorMessage'])
        ?>
      </span>
    </form>
  </div>
  <br /> <br />
  <a href="shiponline.php">Home</a>
</body>
</html>
