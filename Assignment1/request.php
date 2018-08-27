<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a Request page in which the user can create a new delivery request
-->
<?php
session_start();
if (!isset($_SESSION['customerNumber'])) {
  $_SESSION['errorMessage'] = 'You must login first';
  header('location: login.php');
}
?>
<?php
  require 'utils.php';
  $errorMessage = "";
  $responseMessage = "";
  $customerNumber = $_SESSION['customerNumber'];
  $email = $_SESSION['customerEmail'];
  $name = $_SESSION['customerName'];
  date_default_timezone_set("Australia/Melbourne");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["request"])) {
      if (isset($_POST["description"]) && isset($_POST["weight"]) && isset($_POST["pickupAddress"]) && isset($_POST["pickupSuburb"]) &&
      isset($_POST["preferedDay"])&& isset($_POST["preferedMonth"]) && isset($_POST['preferedYear']) &&
    isset($_POST["receiverName"]) && isset($_POST["receiverAddress"]) && isset($_POST["receiverSuburb"]) &&
   isset($_POST["receiverState"])) {
        require 'query.php';
        $isValid = true;
        $description = $_POST["description"];
        $weight = $_POST["weight"];
        $pickupAddress = $_POST["pickupAddress"];
        $pickupSuburb = $_POST["pickupSuburb"];
        $day = $_POST['preferedDay'];
        $month = $_POST['preferedMonth'];
        $year = $_POST['preferedYear'];
        $hour = $_POST["preferedHour"];
        $minutes = $_POST["preferedMin"];
        if ($minutes == "" || !is_numeric($minutes) || $minutes < 0 || $minutes > 59) {
          $minutes = 0;
        }
        $curentDateTime = date_create('now');
        $pickupDateTime = Utils::makeDateTime($day,$month,$year,$hour,$minutes);
        $date24HoursAfter = date_create('now')->modify('+24 hour');
        if (!Utils::isValidDate($day,$month, $year)) {
            $errorMessage = "* Your selected date is inappropriate, please try another date";
            $isValid = false;
        } else if (!Utils::isValidPreferedTime($hour, $minutes)) {
            $errorMessage = "* Your selected time is inappropriate, please select time between 7:30 and 20:30";
            $isValid = false;
        } else if ($date24HoursAfter > $pickupDateTime) {
          $errorMessage = "* The preferred pick-up date and time are at least 24 hours after the current time";
          $isValid = false;
        }

        if ($isValid) {
          $requestDate = $curentDateTime->format("Y-m-d H:i:s");
          $receiverName = $_POST["receiverName"];
          $receiverAddress = $_POST["receiverAddress"];
          $receiverSuburb = $_POST["receiverSuburb"];
          $receiverState = $_POST["receiverState"];
          $cost = Utils::getCost($weight);
          try {
              $requestNumber = create_request($customerNumber,$requestDate,$description, $weight, $pickupAddress,
               $pickupSuburb, $pickupDateTime,$receiverName, $receiverAddress, $receiverSuburb, $receiverState);
               $pickupDate = $pickupDateTime->format('d/m/Y');
               $pickupTime = $pickupDateTime->format('H:i:s');
               $responseMessage = "Thank you! Your request number is {$requestNumber}. The cost is $" .$cost ." We will pick-up the item at {$pickupTime} on {$pickupDate}.";
               sendEmail($email, $name, $requestNumber, $cost, $pickupTime, $pickupDate);
          } catch (Exception $ex) {
            echo $ex->getMessage();
          }
        }
      }
    }
  }
?>

<?php
/**
 * This method uses to send an email to customers
 * @param  string $email         Customer email
 * @param  string $name          Customer name
 * @param  int $requestNumber    Request number
 * @param  int $cost             the cost based on request weight
 * @param  Time $pickupTime      Pickup time
 * @param  Date $pickupDate      Pickup Date`
 */
function sendEmail($email, $name, $requestNumber, $cost, $pickupTime, $pickupDate) {
  $subject = "shipping request with ShipOnline";
  $headers = 'From: s101767225@mercury.swin.edu.au';
  $message = "Dear {$name}, Thank you for using ShipOnline! Your request
number is {$requestNumber}. The cost is $" .$cost. " We will pick-up the item at {$pickupTime} on {$pickupDate}";
  mail($email, $subject, $message, $headers, "-r 101767225@student.swin.edu.au");
}

?>
<!DOCTYPE html>
<html lang="en-US">
<header>
  <title>ShipOnline Request System</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/form.css" />
</header>

<h1>ShipOnline System Request Page</h1>
<div class="form">
  <form method="post">
    Item Information:
    <div class="form">
      Description: <input type="text" id="description" name="description" required/> <br/> <br/>
      Weight:
      <select id="weight"
              name="weight"/>
        <option value="" selected disabled hidden>Select Weight</option>
        <option value="2">0-2 kg</option>
        <?php
        for ($i = 3; $i < 21 ; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    </div>
    <br /> <br />
    Pick-up Information:
    <div class="form">
      Address: <input type="text" id="address" name="pickupAddress" required/>
      <br /> <br />Suburb: <input type="text" name="pickupSuburb" required/>
      <br /> <br />Prefered date: <select id="preferedDay"
              name="preferedDay" required/>
        <option value="" selected disabled hidden>Day</option>
        <?php
        for ($i = 1; $i < 32 ; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    <select id="preferedMonth"
            name="preferedMonth" required/>
      <option value="" selected disabled hidden>Month</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>

    <select id="preferedYear"
           name="preferedYear" required/>
      <option value="" selected disabled hidden>Year</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
    </select>

      <br /> <br />Prefered time:
      <select name="preferedHour" required/>
        <option value="" selected disabled hidden>Hour</option>
        <?php
        for ($i = 7; $i < 21; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
      Minute: <input type="text" id="minute_text" name="preferedMin">
      <br /> <br /> <label id="pick_up_hint"> If you don't input minute property, we'll assume to pick the item up at the exact hour </label>
    </div>
    <br /> <br />
    Delivery Information:
    <div class="form">
      Receiver Name: <input type="text" name="receiverName" required/>
      <br /> <br />Address: <input type="text" id="address" name="receiverAddress" required/>
      <br /> <br />Suburb: <input type="text" name="receiverSuburb" required/>
      <br /> <br />State:
      <select id="state"
              name="receiverState" required/>
        <option value="" selected disabled hidden>Select State</option>
        <option value="ACT">Australian Capital Territory</option>
        <option value="NSW">New South Wales</option>
        <option value="NT">Northern Territory</option>
        <option value="QLD">Queensland</option>
        <option value="SA">South Australia</option>
        <option value="TAS">Tasmania</option>
        <option value="VIC">Victoria</option>
      </select>
    </div>
    <br /> <br /> <input type="submit" name="request" value="Request" />
    <span class="error"> <?php echo  "<br />" .$errorMessage; ?></span>
    <span class="sucess"> <?php echo "<br />" .$responseMessage; ?></span>
  </form>
</div>
<br /> <br />
<a href="shiponline.php">Home</a>
</html>
