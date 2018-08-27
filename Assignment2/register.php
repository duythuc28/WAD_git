<?php
session_start();
?>
<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses to create a customer and add to xml file
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"]) && isset($_POST["firstName"]) && isset($_POST["surname"])) {
    require 'customer_manager.php';
    $customers = convertCustomerToArray();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstName = $_POST["firstName"];
    $surname = $_POST["surname"];
    $confirmPassword = $_POST["confirmPassword"];

    $isValid = true;
    if ($firstName === '') {
      $errorMessage = "* Please enter first name";
      $isValid = false;
      // echo $errorMessage;
    } else if ($surname === '') {
      $errorMessage = "* Please enter surname ";
      $isValid = false;
    }
    // Check if email is valid
    else if (!isValidEmail($email)) {
      $errorMessage = "* Please input an email in correct format";
      $isValid = false;
      // echo $errorMessage;
    } else if (!isUniqueEmail($email, $customers)) {
      $errorMessage = "* This email is already existed";
      $isValid = false;
    }
     else if ($password === '') {
      $errorMessage = "* Please enter password";
      $isValid = false;
    } else if ($confirmPassword === '') {
      $errorMessage = "* Please enter confirm password ";
      $isValid = false;
    } else if (!isValidPassword($password, $confirmPassword)) {
      $errorMessage = "* Password does not match ";
      $isValid = false;
    }

    if ($isValid) {
      // save data to xml
      $customerId = getCustomerId($customers);
      $newCustomer = createNewCustomer($customerId,$email,$password, $firstName, $surname);
      array_push($customers,$newCustomer);
      toCustomerXML($customers);
      sendEmail($email, $firstName, $customerId, $password);
      echo "Dear {$firstName}, welcome to use ShopOnline! Your customer id is {$customerId} and the password is {$password}";
      $_SESSION['customer_id'] = $customerId;
    } else {
      header('HTTP/1.1 400 Bad Request', true, 400);
      echo $errorMessage;
    }
  }
}
?>

<?php
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
 * This method uses to check the validation of an email
 * @param  string  $email the customer email
 * @return boolean        true if the email is valid
 */
  function isValidEmail($email){
    if (strlen($email) > 253) {
      return false;
    }

    $emailPart = explode("@",$email);
    if (count($emailPart)!=2) {
      return false;
    }
    $localPart = $emailPart[0];
    $domainPart = $emailPart[1];

    // validate local part
    if (!preg_match("/[-0-9a-zA-Z!#$%&'*+\/=?^_`{|}~.]/", $localPart)) {
      return false;
    }
    // validate domain part
    if (!preg_match("/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/", $domainPart)) {
      return false;
    }
    return true;
  }

  /**
   * Check if email is valid
   * @param  string  $email the customer email
   * @param  customer  $customers the customer email
   * @return boolean        true if the email is valid
   */
  function isUniqueEmail($email, $customers) {
    if (count($customers) == 0) {
      return true;
    }
    for ($i=0 ; $i < count($customers); $i++) {
      if ($customers[$i]['email'] === $email) {
        return false;
      }
    }
    return true;
  }

  function createNewCustomer($customerId,$email,$password, $firstName, $surname) {
    $customer = array('customer_id' => intval($customerId),
                      'first_name' => (string)$firstName,
                      'surname' => (string)$surname,
                      'email'=> (string)$email,
                      'password'=> (string)$password,
                    );
    return $customer;
  }

  /**
   * This method uses to send an email to customers
   * @param  string $email               Customer email
   * @param  string $firstName          Customer name
   * @param  int $customerId            Customer ID
   * @param  int $password             Password
   */
function sendEmail($email, $firstName, $customerId, $password) {
  $subject = "Welcome to ShopOnline!";
  $headers = 'From: registration@shoponline.com.au';
  $message = "Dear {$firstName}, welcome to use ShopOnline! Your customer id is {$customerId} and the password is {$password}";
  mail($email, $subject, $message, $headers);
}
?>
