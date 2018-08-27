<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create Administration page including the view requests based on pickup date
   or request date.
-->
<?php
session_start();
?>
<?php
  require_once 'utils.php';
  $errorMessage = "";
  $requests = NULL;
  $selectMode = "";

  date_default_timezone_set("Australia/Melbourne");
  if (isset($_GET["day"]) && isset($_GET["month"]) && isset($_GET["year"]) && isset($_GET["select_date_item"])) {
    require 'query.php';
    $day = $_GET["day"];
    $month = $_GET["month"];
    $year = $_GET["year"];
    $selectMode = $_GET["select_date_item"];
    $isValid = true;
    if (!(Utils::isValidDate($day,$month,$year))) {
      $errorMessage = "* Your selected date is inappropriate, please try another date";
      $isValid = false;
    }
    $date = new DateTime("{$year}-{$month}-{$day}");
  }
?>
<?php
/**
 * This method uses to draw table with type pickup
 * @param  array $requests The list response from database
 */
function draw_pickup_table($requests) {
  if ($requests->num_rows > 0) {
    $count = 0;
    $totalWeight = 0;
    echo "<h2>Request list</h2>";
    echo '<table style="width:100%" border="1px">';
    echo "<tr><th>Customer Number</th>
    <th>Customer name</th>
    <th>Customer phone</th>
    <th>Request Number</th>
    <th>Item description</th>
    <th>Weight</th>
    <th>Pickup address</th>
    <th>Pickup suburb</th>
    <th>Pickup time</th>
    <th>Delivery suburb</th>
     <th>Delivery state</th>
    </tr>";
    while ($item = $requests->fetch_assoc()) {
      echo "<tr><td align='center'>".$item["customer_number"]
      ."</td><td align='center'>".$item["customer_name"]
      ."</td><td align='center'>".$item["customer_phone"]
      ."</td><td align='center'>".$item["request_number"]
      ."</td><td align='center'>".$item["item_description"]
      ."</td><td align='center'>".$item["weight"]
      ."</td><td align='center'>".$item["pickup_address"]
      ."</td><td align='center'>".$item["pickup_suburb"]
      ."</td><td align='center'>".$item["TIME(b.pickup_date_time)"]
      ."</td><td align='center'>".$item["receiver_suburb"]
      ."</td><td align='center'>".$item["receiver_state"]
      ."</td></tr>";
      $count += 1;
      $totalWeight = $totalWeight + $item["weight"];
    }
    echo "</table>";
    echo "<br /> Total request: " .$count;
    echo "<br /> Total weight: " .$totalWeight;
  }
}

/**
 * This method uses to draw table with type is request date
 * @param  array $requests The list response from database
 */
function draw_request_table($requests) {

  if ($requests->num_rows > 0) {
    $count = 0;
    $totalCost = 0;
    echo "<h2>Request list</h2>";
    echo '<table style="width:100%" border="1px">';
    echo "<tr><th>Customer Number</th>
    <th>Request number</th>
    <th>Item description</th>
    <th>Weight</th>
    <th>Pick-up suburb</th>
    <th>Pick-up date</th>
    <th>Delivery suburb</th>
    <th>Delivery state</th>
    </tr>";
    while ($item = $requests->fetch_assoc()) {
      echo "<tr><td align='center'>".$item["customer_number"]
      ."</td><td align='center'>".$item["request_number"]
      ."</td><td align='center'>".$item["item_description"]
      ."</td><td align='center'>".$item["weight"]
      ."</td><td align='center'>". $item["pickup_suburb"]
      ."</td><td align='center'>". $item["DATE(b.pickup_date_time)"]
      ."</td><td align='center'>". $item["receiver_suburb"]
      ."</td><td align='center'>". $item["receiver_state"] 
      ."</td></tr>";
      $count += 1;
      $totalCost =  $totalCost + Utils::getCost($item["weight"]);
    }
    echo "</table>";
    echo "<br /> Total request: " .$count;
    echo "<br /> Total revenue: $" .$totalCost;
  }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<header>
  <title>ShipOnline Administration System</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/form.css">
</header>
<body>
<h1>ShipOnline System Administration Page</h1>
<div class="form">
  <form method="get">
    Day for Retrieve
    <select id="day"
            name="day" required/>
      <option value="" selected disabled hidden>Day</option>
      <?php
      for ($i = 1; $i < 32 ; $i++) {
          echo "<option value='$i'>$i</option>";
      }
      ?>
    </select>
  <select id="month"
          name="month" required/>
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

  <select id="year"
         name="year" required/>
    <option value="" selected disabled hidden>Year</option>
    <?php
    for ($i = 2018; $i < 2021 ; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
  </select>

  <br> <br /> Select Date Item for Retrieve
  <input type="radio" name="select_date_item" value="request" checked> Request Date
  <input type="radio" name="select_date_item" value="pickup"> Pick-up Date
  <br /> <br /> <input type="submit" value="Show" />
  </form>
</div>
</body>
<br /> <br />
<a href="shiponline.php">Home</a>
<span class="error"> <br /> <br /> <?php echo $errorMessage; ?> </span>
<div class="request_table">
  <?php
    switch ($selectMode) {
      case 'request':
        $requests = get_requests_by_request_date($date);
        draw_request_table($requests);
        break;
      case 'pickup':
        $requests = get_requests_by_pickup_date($date);
        draw_pickup_table($requests);
        break;
      default:
        break;
    }
   ?>
</div>
</html>
