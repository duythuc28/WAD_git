/*
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a listing request to server
 */
var xHRObject = false;
if (window.XMLHttpRequest) {
  xHRObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

/**
 * This method uses to request listing item to server
 */
function submitListing() {
  xHRObject.open("POST", "listing.php", true);
  xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xHRObject.onreadystatechange = handleServerResponse;
  var itemName = document.getElementById('item_name_field').value;

  var categoryField = document.getElementById("category_field");
  var category = "";
  if (categoryField.style.display == "block") {
    category = categoryField.value;
  } else {
    category = document.getElementById('category').value;
  }
  var description = document.getElementById("description_field").value;

  var startingPrice = document.getElementById("start_price_money").value;
  var startingPriceCent = document.getElementById("start_price_cent").value;

  var reservePrice = document.getElementById("reserve_price_money").value;
  var reservePriceCent = document.getElementById("reserve_price_cent").value;

  var buyItNowPrice = document.getElementById("buy_now_price_money").value;
  var buyItNowPriceCent = document.getElementById("buy_now_price_cent").value;

  var day = document.getElementById('day').value;
  var hour = document.getElementById('hour').value;
  var min = document.getElementById('min').value;


  var error = document.getElementById('error_result');
  document.getElementById('results').innerHTML = '';

  if (isEmpty(itemName)) {
    error.innerHTML = "* Please enter item name";

    return;
  }

  if (isEmpty(category)) {
    error.innerHTML = "* Please select category";
    return;
  }

  if (isEmpty(description)) {
    error.innerHTML = "* Please enter description";
    return;
  }

  if (isEmpty(startingPrice) || isNaN(startingPrice)) {
    error.innerHTML = "* Starting price is invalid";
    return;
  }

  if (isEmpty(reservePrice) || isNaN(reservePrice)) {
    error.innerHTML = "* Reserve price is invalid";
    return;
  }

  if (isEmpty(buyItNowPrice) || isNaN(buyItNowPrice)) {
    error.innerHTML = "* Buy it now price is invalid";
    return;
  }

  if (isEmpty(day) || isNaN(day)) {
    error.innerHTML = "* Please select day";
    return;
  }

  if (isEmpty(hour) || isNaN(hour)) {
    error.innerHTML = "* Please select hour";
    return;
  }

  if (isEmpty(min) || isNaN(min)) {
    error.innerHTML = "* Please select hour";
    return;
  }

  if (day == 0 && hour < 1) {
    error.innerHTML = "* Bid item must have at least 1 hour ";
    return;
  }

  var startingPriceValue = parseInt(startingPrice) + (startingPriceCent/100);
  var reservePriceValue = parseInt(reservePrice) + (reservePriceCent/100);
  var buyItNowPriceValue = parseInt(buyItNowPrice) + (buyItNowPriceCent/100);

  if (startingPriceValue <= 0) {
    error.innerHTML = "* Starting price must higher than 0";
    return;
  }

  if (startingPriceValue >= reservePriceValue) {
    error.innerHTML = "* Starting price must be lower than reserve price";
    return;
  }

  if (reservePriceValue >= buyItNowPriceValue) {
    error.innerHTML = "* Reserve price must be lower than buy it now price";
    return;
  }
  error.innerHTML = "";
  xHRObject.send("itemName=" + itemName + "&category=" + category + "&description=" + description + "&startingPrice=" + startingPriceValue +  "&reservePrice=" + reservePriceValue +  "&buyItNowPrice=" + buyItNowPriceValue +  "&day=" + day + "&hour=" + hour + "&min=" + min );
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

function handleServerResponse() {
  if (xHRObject.readyState == 4) {
    if (xHRObject.status == 200) {
      var results = document.getElementById('results');
      results.innerHTML = xHRObject.responseText;
      document.getElementById('error_result').innerHTML = '';
      showCategory();
      clearField();
    } else {
      var results = document.getElementById('error_result');
      document.getElementById('results').innerHTML = '';
      results.innerHTML = xHRObject.responseText;
      xHRObject.abort();
    }
  }
}

/**
 * This method uses to handle when the user selects category
 */
function selectCategory() {
    var category = document.getElementById("category");
    var categoryField = document.getElementById("category_field");
    if (category.value == 'other') {
      categoryField.style.display = "block";
    } else {
      categoryField.style.display = "none";
    }
}

/**
 * This method uses to reset field
 */
function clearField() {
  document.getElementById("item_name_field").value = "";
  document.getElementById("description_field").value = "";
  document.getElementById("start_price_money").value = "";
  document.getElementById("start_price_cent").value = "";
  document.getElementById("reserve_price_money").value = "";
  document.getElementById("reserve_price_cent").value = "";
  document.getElementById("buy_now_price_money").value = "";
  document.getElementById("buy_now_price_cent").value = "";
  document.getElementById("day").selectedIndex = 0;
  document.getElementById("hour").selectedIndex = 0;
  document.getElementById("min").selectedIndex = 0;
  document.getElementById("category").selectedIndex = 0;
  document.getElementById("category_field").value = "";
}

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
 * This method uses to load and show category
 */
function showCategory() {
  xml = getAuctionItem();
  xsl = loadXMLDoc('xsl/display_listing.xsl');
  if (window.ActiveXObject || xhttp.responseType == "msxml-document") {
    if (xml != null && xml.getElementsByTagName('items').length > 0) {
      var transform = xml.transformNode(xsl);
      var categoryField = document.getElementById("category_field");
      var category = document.getElementById("category");
      category.style.display = "block";
      category.options.length = 0;
      document.getElementById('category').innerHTML = transform;
      if (category.value == 'other') {
        categoryField.style.display = "block";
      } else {
        categoryField.style.display = "none";
      }

    } else {
      var categoryField = document.getElementById("category_field");
      var category = document.getElementById("category");
      categoryField.style.display = "block";
      category.style.display = "none";
      category.options.length = 0;
    }
  } else if (document.implementation && document.implementation.createDocument) {
    if (xml != null && xml.getElementsByTagName('items').length > 0) {
      xsltProcessor = new XSLTProcessor();
      xsltProcessor.importStylesheet(xsl);
      var categoryField = document.getElementById("category_field");
      var category = document.getElementById("category");
      category.style.display = "block";
      category.options.length = 0;

      resultDocument = xsltProcessor.transformToFragment(xml, document);
      category.appendChild(resultDocument);

      if (category.value === 'other') {
        categoryField.style.display = "block";
      } else {
        categoryField.style.display = "none";
      }
    }
    else {
      var categoryField = document.getElementById("category_field");
      var category = document.getElementById("category");
      categoryField.style.display = "block";
      category.style.display = "none";
      category.options.length = 0;
    }
  }
}
