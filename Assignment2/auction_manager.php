<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses to handle auction item in xml
 */

 /**
  * This method uses to convert auction xml to array
  * @return  array $items The list auction from xml
  */
function convertAuctionXMLToArray() {
  $items = array();
  if (file_exists('../../data/auction.xml')) {
    $xml_object = simplexml_load_file('../../data/auction.xml');
    if ($xml_object != null) {
      foreach ($xml_object as $key => $value) {
        $item = array('customer_id' => intval($value->customer_id),
                      'item_id' => intval($value->item_id),
                      'item_name' => (string)$value->item_name,
                      'category' => (string)$value->category,
                      'description' => (string)$value->description,
                      'startingPrice' => doubleval($value->startingPrice),
                      'reservePrice' => doubleval($value->reservePrice),
                      'buyItNowPrice' => doubleval($value->buyItNowPrice),
                      'bidPrice' => doubleval($value->bidPrice),
                      'duration' => (string)$value->duration,
                      'status' => (string)$value->status,
                      'currentDate' => (string)$value->currentDate,
                      'currentTime' => (string)$value->currentTime,
                      'bidderID' => intval($value->bidderID),
                  );
        array_push($items,$item);
        }
      }
    }
  return $items;
}

/**
 * This method uses to convert array to xml
 * @return  xml xml file
 */
function toAuctionXML($auctionArray)
{
    $doc = new DomDocument('1.0');
    $items = $doc->createElement('items');
    $items = $doc->appendChild($items);
    for ($i=0 ; $i < count($auctionArray); $i++) {
      $item = $doc->createElement('item');
      $item = $items->appendChild($item);

      $customerIdTag = $doc->createElement('customer_id');
      $customerIdTag = $item->appendChild($customerIdTag);
      $customerIdValue = $doc->createTextNode($auctionArray[$i]['customer_id']);
      $customerIdValue = $customerIdTag->appendChild($customerIdValue);

      $itemIdTag = $doc->createElement('item_id');
      $itemIdTag = $item->appendChild($itemIdTag);
      $itemIdValue = $doc->createTextNode($auctionArray[$i]['item_id']);
      $itemIdValue = $itemIdTag->appendChild($itemIdValue);

      $itemNameTag = $doc->createElement('item_name');
      $itemNameTag = $item->appendChild($itemNameTag);
      $itemNameValue = $doc->createTextNode($auctionArray[$i]['item_name']);
      $itemNameValue = $itemNameTag->appendChild($itemNameValue);

      $categoryTag = $doc->createElement('category');
      $categoryTag = $item->appendChild($categoryTag);
      $categoryValue = $doc->createTextNode($auctionArray[$i]['category']);
      $categoryValue = $categoryTag->appendChild($categoryValue);

      $descriptionTag = $doc->createElement('description');
      $descriptionTag = $item->appendChild($descriptionTag);
      $descriptionValue = $doc->createTextNode($auctionArray[$i]['description']);
      $descriptionValue = $descriptionTag->appendChild($descriptionValue);

      $startingPriceTag = $doc->createElement('startingPrice');
      $startingPriceTag = $item->appendChild($startingPriceTag);
      $startingPriceValue = $doc->createTextNode($auctionArray[$i]['startingPrice']);
      $startingPriceValue = $startingPriceTag->appendChild($startingPriceValue);

      $reservePriceTag = $doc->createElement('reservePrice');
      $reservePriceTag = $item->appendChild($reservePriceTag);
      $reservePriceValue = $doc->createTextNode($auctionArray[$i]['reservePrice']);
      $reservePriceValue = $reservePriceTag->appendChild($reservePriceValue);

      $buyItNowPriceTag = $doc->createElement('buyItNowPrice');
      $buyItNowPriceTag = $item->appendChild($buyItNowPriceTag);
      $buyItNowPriceValue = $doc->createTextNode($auctionArray[$i]['buyItNowPrice']);
      $buyItNowPriceValue = $buyItNowPriceTag->appendChild($buyItNowPriceValue);

      $bidPriceTag = $doc->createElement('bidPrice');
      $bidPriceTag = $item->appendChild($bidPriceTag);
      $bidPriceTagValue = $doc->createTextNode($auctionArray[$i]['bidPrice']);
      $bidPriceTagValue = $bidPriceTag->appendChild($bidPriceTagValue);

      $durationTag = $doc->createElement('duration');
      $durationTag = $item->appendChild($durationTag);
      $durationValue = $doc->createTextNode($auctionArray[$i]['duration']);
      $durationValue = $durationTag->appendChild($durationValue);

      $statusTag = $doc->createElement('status');
      $statusTag = $item->appendChild($statusTag);
      $statusValue = $doc->createTextNode($auctionArray[$i]['status']);
      $statusValue = $statusTag->appendChild($statusValue);

      $currentDateTag = $doc->createElement('currentDate');
      $currentDateTag = $item->appendChild($currentDateTag);
      $currentDateValue = $doc->createTextNode($auctionArray[$i]['currentDate']);
      $currentDateValue = $currentDateTag->appendChild($currentDateValue);

      $currentTimeTag = $doc->createElement('currentTime');
      $currentTimeTag = $item->appendChild($currentTimeTag);
      $currentTimeValue = $doc->createTextNode($auctionArray[$i]['currentTime']);
      $currentTimeValue = $currentTimeTag->appendChild($currentTimeValue);

      $bidderIDTag = $doc->createElement('bidderID');
      $bidderIDTag = $item->appendChild($bidderIDTag);
      $bidderIDValue = $doc->createTextNode($auctionArray[$i]['bidderID']);
      $bidderIDValue = $bidderIDTag->appendChild($bidderIDValue);
    }
    $doc->formatOutput = true;
    $strXml = $doc->saveXML();
    $doc->save('../../data/auction.xml');
    return $strXml;
}

/**
 * This method uses to get item in item list
 * @return  item item in list
 */
function getItemById($itemId) {
  $items = convertAuctionXMLToArray();
  for ($i=0 ; $i < count($items); $i++) {
    if ($itemId == $items[$i]['item_id']) {
      return $items[$i];
    }
  }
  return null;
}

/**
 * This method uses to generate auto incremental ID
 * @return  int id generated
 */
function getItemId($auctionArray) {
  if (count($auctionArray) == 0) {
    return 1;
  } else {
    $max = 0;
    for ($i = 0; $i < count($auctionArray); $i++) {
      if ($auctionArray[$i]['item_id'] > $max) {
        $max = $auctionArray[$i]['item_id'];
      }
    }
    return $max+1;
  }
}
 ?>
