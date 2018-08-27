<?php
session_start();
?>
<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses to process auction item in a list
 */
  require 'auction_manager.php';
  date_default_timezone_set("Australia/Melbourne");
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_SESSION['customer_id'])) {
          echo "* You must login to to this function";
          header('HTTP/1.1 400 Bad Request', true, 400);
          return;
        }

        $items = convertAuctionXMLToArray();
        if (count($items) > 0) {
          for ($i = 0; $i < count($items); $i++ ) {
            $endDate = new DateTime($items[$i]['duration']);
            $startDate = new DateTime();
            if ($items[$i]['status'] === "in process" && $startDate > $endDate) {
              if ($items[$i]['bidPrice'] >= $items[$i]['reservePrice']) {
                $items[$i]['status'] = "sold";
              } else {
                $items[$i]['status'] = "failed";
              }
            }
          }
          toAuctionXML($items);
          echo "Process complete";
        } else {
          echo "There is no items to process";
        }
      }
 ?>
