/*
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to load bidding list and buy items.
 */

/**
 * Load XML file
 * @param  {[String]} filename [name of file]
 * @return {[XML]}          [xml]
 */
 function loadXMLDoc(filename) {
  if (window.ActiveXObject) {
    xhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } else {
    xhttp = new XMLHttpRequest();
  }
  xhttp.open("GET", filename, false);
  try {
    xhttp.responseType = "msxml-document";
  } catch (err) {} // Helping IE11
  xhttp.send("");
  return xhttp.responseXML;
}
/**
 * Load Auction Items from XML
 * @return {[XML]} xml file
 */
function getAuctionItem() {
  if (window.ActiveXObject) {
    var xhttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
  } else {
    var xhttpRequest = new XMLHttpRequest();
  }
  xhttpRequest.open("GET", 'getAuctionItem.php', false);
  xhttpRequest.send("");
  return xhttpRequest.responseXML;
}

/**
 * Calculate time diff
 * @param  {[String]} datetime [String format datetime]
 * @return {[String]}          [Message]
 */
function getTimeDiff(datetime) {
  var datetime = typeof datetime !== 'undefined' ? datetime : "2014-01-01 01:02:03.123456";

  var datetime = new Date(datetime).getTime();
  var now = new Date().getTime();

  if (isNaN(datetime)) {
    return "";
  }
  var milisec_diff = datetime - now;

  if (milisec_diff < 0) {
    return "Item expired";
  }

  var days = Math.floor(milisec_diff / 1000 / 60 / (60 * 24));

  var date_diff = new Date(milisec_diff);

  return days + " days " + date_diff.getHours() + " hours " + date_diff.getMinutes() + " minutes " + date_diff.getSeconds() + " seconds remaining";
}

/**
 * Request Data on loading bidding page
 */
function requestData() {
  xml = getAuctionItem();
  xsl = loadXMLDoc('xsl/display_bidding.xsl');
  if (window.ActiveXObject || xhttp.responseType == "msxml-document") {
    if (xml != null) {
      var transform = xml.transformNode(xsl);
      var item = document.getElementById('itemRequest');
      item.innerHTML = "";
      item.innerHTML = transform;
      var timeLeftItems = document.getElementsByClassName("timeLeft");
      for (var i = 0; i < timeLeftItems.length; i++) {
        var duration = timeLeftItems[i].textContent;
        timeLeftItems[i].innerHTML = getTimeDiff(String(duration));
      }
      addBuyItNowEvent();
      addBidItemEvent();
    }
  } else if (document.implementation && document.implementation.createDocument) {
    if (xml != null) {
      xsltProcessor = new XSLTProcessor();
      xsltProcessor.importStylesheet(xsl);
      var resultDocument = xsltProcessor.transformToFragment(xml, document);
      var item = document.getElementById('itemRequest');
      item.innerHTML = "";
      item.appendChild(resultDocument);
      var timeLeftItems = document.getElementsByClassName("timeLeft");
      for (var i = 0; i < timeLeftItems.length; i++) {
        var duration = timeLeftItems[i].textContent;
        timeLeftItems[i].innerHTML = getTimeDiff(String(duration));
      }
      addBuyItNowEvent();
      addBidItemEvent();
    }

  }
}

/**
 * Add bid item
 */
function addBidItemEvent() {
  var placeBidButton = document.getElementsByClassName('placeBidButton');
  // alert('aas');
  for (var i = 0; i < placeBidButton.length; i++) {
    var button = placeBidButton[i];
    button.addEventListener('click', function(e) {
      e = e || window.event;
      var target = e.target || e.srcElement,
        itemId = target.id;
      var modal = document.getElementById('myModal');
      modal.style.display = "block";

      var inputBidPrice = document.getElementById('bid_field');
      inputBidPrice.value = target.name;

      var bidRequestButton = document.getElementById('bidRequestButton');
      bidRequestButton.onclick = function() {
        if (!isNaN(inputBidPrice.value) && currentBidPrice < inputBidPrice.value) {
          addBidPrice(itemId, inputBidPrice.value);
          modal.style.display = "none";
        } else {
          modal.style.display = "none";
          alert("Sorry, your bid is not valid.");
        }

      }

      var span = document.getElementsByClassName("close")[0];
      span.onclick = function() {
        modal.style.display = "none";
      }
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }

    }, false);
  }
}
/**
 * Add buy it now event item
 */
function addBuyItNowEvent() {
  var buyItNowButton = document.getElementsByClassName('buyItNowButton');
  for (var i = 0; i < buyItNowButton.length; i++) {
    var button = buyItNowButton[i];
    button.addEventListener('click', function(e) {
      e = e || window.event;
      var target = e.target || e.srcElement,
        itemId = target.id;
      buyItNowRequest(itemId);
    }, false);
  }
}

function loadData() {
  requestData();
  setInterval(requestData, 5000);
}

var xHRObject = false;
if (window.XMLHttpRequest) {
  xHRObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

/**
 * Request when user select buy item
 * @param  {[int]} itemId [item id]
 */
function buyItNowRequest(itemId) {
  xHRObject.open("POST", "bidding.php", true);
  xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xHRObject.onreadystatechange = handleServerResponse;
  xHRObject.send("item_id=" + itemId + "&isBuyItNow=" + true);
}

/**
 * Create request when user select add bid price
 * @param {[int]} itemID   [description]
 * @param {[int]} bidPrice [bid price]
 */
function addBidPrice(itemID, bidPrice) {
  xHRObject.open("POST", "bidding.php", true);
  xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xHRObject.onreadystatechange = handleServerResponse;
  xHRObject.send("item_id=" + itemID + "&isBuyItNow=" + false + "&bidPrice=" + bidPrice);
}


function isEmpty(str) {
  return (!str || 0 === str.length);
}

function handleServerResponse() {
  if (xHRObject.readyState == 4) {
    if (xHRObject.status == 200) {
      alert(xHRObject.responseText);
      requestData();
    } else {
      alert(xHRObject.responseText);
      xHRObject.abort();
    }
  }
}
