<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a Registration page and its function
-->
<?php
  require 'utils.php';
  $errorMessage = "";
  $responseMessage = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
      if (isset($_POST["customerName"]) && isset($_POST["customerPassword"]) &&
      isset($_POST["customerConfirmPassword"]) && isset($_POST["customerEmail"]) &&
      isset($_POST["customerPhone"])) {
        require 'query.php';
        $name = $_POST["customerName"];
        $password = $_POST["customerPassword"];
        $confirmPassword = $_POST["customerConfirmPassword"];
        $email = $_POST["customerEmail"];
        $phone = $_POST["customerPhone"];
        $isValid = true;
        // Check if password is valid
        if (!isValidPassword($password, $confirmPassword)) {
          $errorMessage = "* Password does not match";
          $isValid = false;
        }
        // Check if email is valid
        else if (!isValidEmail($email)) {
          $errorMessage = "* Please input an email in correct format";
          $isValid = false;
        }
        // Check if email already exsited in database
        else if (check_customer_email_existed($email)) {
          $errorMessage = "* This email is existed, please select new email address";
          $isValid = false;
        }
        // Check if phone is valid
        else if (!isValidPhone($phone)) {
          $errorMessage = "* Your phone number is not valid. You should enter phone number with at least 6 digits";
          $isValid = false;
        }
        if ($isValid) {
          // Generate random customer number
          try {
            // Insert customer to database
            $customerNumber = insert_customer($name, $password, $email, $phone);
            $responseMessage = "Dear " .$name .", you are successfully registered into ShipOnline, and your customer number is " .$customerNumber .", which will be used to get into the system.";
          } catch (Exception $e) {
            $errorMessage = $e->getMessage();
          }
        }
      }
    }
  }
?>

<?php
/**
 * This method uses to check the validation of an email
 * @param  string  $email the customer email
 * @return boolean        true if the email is valid
 */
  function isValidEmail($email){
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }

/**
 * This method uses to check if the password is matched with a confirm password
 * @param  string  $password        customer Password
 * @param  string  $confirmPassword customer confirmed password
 * @return boolean                  true if the password is valid
 */
  function isValidPassword($password, $confirmPassword) {
    return $password === $confirmPassword;
  }

/**
 * This method uses to check the validation of phone
 * @param  string  $phone customer phone Number
 * @return boolean        true if phone is valid
 */
  function isValidPhone ($phone) {
    return $phone !== "" && is_numeric($phone) && strlen($phone) > 5;
  }
 ?>
<!DOCTYPE html>
<html lang="en-US">
<header>
  <title>ShipOnline Registration System</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/form.css" />
</header>
<body>
<h1>ShipOnline System Registration Page</h1>
<div class="form">
  <form method="post">
    Name: <input type="text" name="customerName" required/>
    <br /> <br />Password: <input type="password" name="customerPassword" required/>
    <br /> <br />Confirm Password: <input type="password" name="customerConfirmPassword" required/>
    <br /> <br />Email: <input type="email" id="email" name="customerEmail" required/>
    <br /> <br />Contact Phone: <input type="text" name="customerPhone" required/>
    <br /> <br /> <input type="submit" name="register" value="Register" />
    <span class="error"> <?php echo  "<br />" .$errorMessage; ?></span>
    <span class="sucess"> <?php echo "<br />" .$responseMessage; ?></span>
  </form>
</div>
<br /> <br />
<a href="shiponline.php">Home</a>
</body>
</html>
