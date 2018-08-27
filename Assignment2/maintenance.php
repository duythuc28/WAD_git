<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses update a list
 */
require 'auction_manager.php';
$items = convertAuctionXMLToArray();
$newItems = $items;
for ($i = 0; $i < count($items); $i++) {
  if ($items[$i]['status'] === "sold" || $items[$i]['status'] === "failed") {
    unset($newItems[$i]);
  }
}
$newItems = array_values($newItems);
toAuctionXML($newItems);
echo "Update list successfully";
 ?>
