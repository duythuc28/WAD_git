<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to handle all queries of the project 
-->
<?php
/**
 * This method uses to insert new customer to database
 * @param  string $name        Customer name
 * @param  string $password    Customer password
 * @param  string $email       Customer email
 * @param  string $phone       Customer phone
 * @return int    $customerNumber
 */
function insert_customer($name, $password, $email, $phone) {
  require 'db.php';
  $sql = "INSERT INTO customer (customer_name ,customer_email ,customer_password, customer_phone)"
          ."Values ('$name','$email','$password', '$phone')";
  if ($mysqli->query($sql) !== TRUE) {
    throw new Exception("Could not insert data to customer table ");
  }
  $last_id = $mysqli->insert_id;
  $mysqli->close();
  return $last_id;
}

/**
 * Check customer email already existed in database
 * @param  string $email input email
 * @return array         list of customer with input email
 */
function check_customer_email_existed($email) {
  require 'db.php';
  $sql = "SELECT customer_email FROM customer WHERE customer_email='$email'";
  $result = $mysqli->query($sql);
  $mysqli->close();
  return $result->num_rows > 0;
}

/**
 * Login with customer email & password
 * @param  int $customerNumber Customer number
 * @return array               list of customer
 */
function login($customerNumber) {
  require 'db.php';
  $sql = "SELECT * FROM customer WHERE customer_number='$customerNumber'";
  $result = $mysqli->query($sql);
  $mysqli->close();
  return $result;
}
/**
 * This method uses to create new request based on customer number
 * @param  int $customerNumber  customer Number
 * @param  Date $requestDate     request Date
 * @param  string $itemDesc       item description
 * @param  int $weight          weight
 * @param  string $pickupAddress   pickup address
 * @param  string $pickupSuburb    pickup suburb
 * @param  DateTime $pickupDateTime  pickup datetime
 * @param  string $receiverName    receiver name
 * @param  string $receiverAddress receiver address
 * @param  string $receiverSuburb  receiver suburb
 * @param  string $receiverState   receiver state
 * @return int    $requestNumber
 */
function create_request($customerNumber,$requestDate,$itemDesc, $weight, $pickupAddress,
 $pickupSuburb, $pickupDateTime,$receiverName, $receiverAddress, $receiverSuburb, $receiverState) {
  require 'db.php';
  $pickUpDateTimeFormat = $pickupDateTime->format('Y-m-d H:i:s');
  $sql = "INSERT INTO request (customer_number ,request_date ,item_description, weight, pickup_address,pickup_suburb,
  pickup_date_time,receiver_name,receiver_address,receiver_suburb,receiver_state)"
  ."Values ('$customerNumber', '$requestDate', '$itemDesc', '$weight',
  '$pickupAddress', '$pickupSuburb', '$pickUpDateTimeFormat', '$receiverName', '$receiverAddress', '$receiverSuburb', '$receiverState')";
  if ($mysqli->query($sql) !== TRUE) {
    throw new Exception("Could not insert data to request table ");
  }
  $last_id = $mysqli->insert_id;
  $mysqli->close();
  return $last_id;
}
/**
 * This method uses to query list of request based on request date
 * @param  DateTime $requestDate    The selected request date
 * @return array               list of request
 */
function get_requests_by_request_date($requestDate) {
  require 'db.php';
  $sql = "SELECT b.customer_number, b.request_number, b.item_description, b.weight, b.pickup_suburb, DATE(b.pickup_date_time), b.receiver_suburb, b.receiver_state
  FROM request b
  WHERE DATE(b.request_date)='{$requestDate->format('Y-m-d')}';";
  $result = $mysqli->query($sql);
  $mysqli->close();
  return $result;
}
/**
 * This method uses to query list of request based on pickup date
 * @param  DateTime $pickupDate      The selected pickup date
 * @return array               list of request
 */
function get_requests_by_pickup_date($pickupDate){
  require 'db.php';
  $sql = "SELECT a.customer_number, a.customer_name, a.customer_phone,  b.request_number, b.item_description, b.weight, b.pickup_address, b.pickup_suburb, TIME(b.pickup_date_time), b.receiver_suburb, b.receiver_state
  FROM customer a, request b
  WHERE a.customer_number = b.customer_number AND DATE(b.pickup_date_time)='{$pickupDate->format('Y-m-d')}'
  ORDER BY  b.pickup_suburb, b.receiver_state, b.receiver_suburb;";
  $result = $mysqli->query($sql);
  $mysqli->close();
  return $result;
}

?>
