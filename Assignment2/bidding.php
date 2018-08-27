<?php
session_start();
?>
<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This class uses to handle customer xml
 */
require 'auction_manager.php';
date_default_timezone_set("Australia/Melbourne");
$customerId = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!isset($_SESSION['customer_id'])) {
        echo "* You must login to buy this item";
        header('HTTP/1.1 400 Bad Request', true, 400);
        return;
      }
      $customerId = $_SESSION['customer_id'];
      $items = convertAuctionXMLToArray();
      $isBuytItNow = $_POST['isBuyItNow'];
      if ($isBuytItNow === 'true') {
        if (isset($_POST['item_id'])) {
          $itemId = $_POST['item_id'];
          for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['item_id'] == $itemId) {
              $endDate = new DateTime($items[$i]['duration']);
              $startDate = new DateTime();
              if ($items[$i]['status'] !== 'sold' && $endDate > $startDate) {
                $items[$i]['status'] = 'sold';
                $items[$i]['bidPrice'] = $items[$i]['buyItNowPrice'];
                $items[$i]['bidderID'] = $customerId;
                echo "Thank you for purchasing this item.";
                toAuctionXML($items);
                return;
              } else {
                  echo "Sorry this item is expired";
                  header('HTTP/1.1 400 Bad Request', true, 400);
                  return;
              }
            }
          }
        }
      }
      else {

      if (isset($_POST['item_id']) && isset($_POST['bidPrice']))  {
        $itemId = $_POST['item_id'];
        $bidPrice = $_POST['bidPrice'];

        for ($i = 0; $i < count($items); $i++) {
          if ($items[$i]['item_id'] == $itemId) {
            $endDate = new DateTime($items[$i]['duration']);
            $startDate = new DateTime();
            if ($items[$i]['status'] !== 'sold' && $endDate > $startDate) {
              // $items[$i]['status'] = 'sold';
              $items[$i]['bidPrice'] = $bidPrice;
              $items[$i]['bidderID'] = $customerId;
              echo "Thank you! Your bid is recorded in ShopOnline.";
              toAuctionXML($items);
              return;
            } else {
                echo "Sorry this item is expired";
                header('HTTP/1.1 400 Bad Request', true, 400);
                return;
              }
            }
          }
        }
      }
    }
?>
