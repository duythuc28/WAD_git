<?php
session_start();
?>
<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses to login to system
 */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $isValid = true;

      // Check if password is valid
      if ($password == '') {
        $errorMessage = "* Please input an password";
        $isValid = false;
      }
      // Check if email is valid
      else if (!isValidEmail($email)) {
        $errorMessage = "* Please input an email in correct format";
        $isValid = false;

      }

      if ($isValid) {
        $customer = checkLogin($email,$password);

        if ($customer!=null) {
          $_SESSION['customer_id'] = $customer['customer_id'];
        } else {
           echo "* Email or password is not correct";
           header('HTTP/1.1 400 Bad Request', true, 400);
        }
      } else {
      header('HTTP/1.1 400 Bad Request', true, 400);
      echo $errorMessage;
    }
  }
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

    function checkLogin($email, $password) {
      require_once 'customer_manager.php';
      $customers = convertCustomerToArray();
      if (count($customers) > 0 ) {
        for ($i=0; $i < count($customers); $i++) {
            if ($email === $customers[$i]['email'] && $password === $customers[$i]['password']) {
                return $customers[$i];
            }
          }
      }
      return null;
    }
?>
