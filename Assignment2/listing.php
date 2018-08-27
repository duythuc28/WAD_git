<?php
session_start();
?>
<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses to manage add item to auction list
 */
date_default_timezone_set("Australia/Melbourne");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $sellerID = "";
      if (isset($_POST["itemName"]) && isset($_POST["category"]) && isset($_POST["description"])
      && isset($_POST["startingPrice"]) && isset($_POST["reservePrice"]) && isset($_POST["buyItNowPrice"])
      && isset($_POST["day"]) && isset($_POST["hour"]) && isset($_POST["min"]) ) {
        require 'auction_manager.php';
        $itemName = $_POST["itemName"];
        $category = $_POST["category"];
        $description = $_POST["description"];
        $startingPrice = $_POST["startingPrice"];
        $reservePrice = $_POST["reservePrice"];
        $buyItNowPrice = $_POST["buyItNowPrice"];
        $day = $_POST["day"];
        $hour = $_POST["hour"];
        $min = $_POST["min"];
        if (!isset($_SESSION['customer_id'])) {
          echo "* You must login to add item";
          header('HTTP/1.1 400 Bad Request', true, 400);
          return;
        }
        $sellerID = $_SESSION['customer_id'];
        $items = convertAuctionXMLToArray();
        $itemId = getItemId($items);
        $duration = constructDuration($day,$hour,$min);
        $item = createItem($sellerID,$itemId,$itemName, $category, $description, $startingPrice, $reservePrice, $buyItNowPrice, $duration);

        array_push($items,$item);
        toAuctionXML($items);
        echo "Thank you! Your item has been listed in ShopOnline. The item number is {$itemId}, and the bidding starts now: {$item['currentTime']} on  {$item['currentDate']}.";
      }
    }
 ?>
 <?php
 /**
  * This method uses to create duration
  * @param $days day input
  * @param $hours hour input
  * @param $minutes minutes input
  * @return  string duration
  */
function constructDuration($days, $hours, $minutes)
{
 $durationToAdd = "P" . $days . "D" . "T" ."$hours" ."H" . $minutes . "M";
 $result = new DateTime(date('Y-m-d H:i:s'));
 $result->add(new DateInterval($durationToAdd));
 //date->format will return string object
 $result = $result->format('Y-m-d H:i:s');
 return $result;
}

/**
 * This method uses to create duration
 * @param $sellerID seller id
 * @param $itemId item id
 * @param $itemName item name
 * @param $category category
 * @param $description description
 * @param $startingPrices starting Price
 * @param $reservePrice reserve Price
 * @param $buyItNowPrice buy it now price
 * @param $duration minutes input
 * @return  item
 */
 function createItem($sellerID, $itemId,$itemName, $category, $description, $startingPrice, $reservePrice, $buyItNowPrice, $duration) {
   $currentDate = date('Y-m-d');
   $currentTime = date('H:i:s');
   $item = array('customer_id' => intval($sellerID),
                 'item_id' => intval($itemId),
                 'item_name' => (string)$itemName,
                 'category' => (string)$category,
                 'description' => (string)$description,
                 'startingPrice' => doubleval($startingPrice),
                 'reservePrice' => doubleval($reservePrice),
                 'buyItNowPrice' => doubleval($buyItNowPrice),
                 'bidPrice' => doubleval($startingPrice),
                 'duration' => (string)$duration,
                 'status' => (string)"in process",
                 'currentDate' => (string)$currentDate,
                 'currentTime' => (string)$currentTime,
                 'bidderID' => intval(0),
             );
  return $item;
 }
  ?>
