<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * Get Auction XML
 */
header("Content-type: text/xml; charset=utf-8");
$doc = new DOMDocument();
$doc->load('../../data/auction.xml');
echo $doc->saveXML();
?>
