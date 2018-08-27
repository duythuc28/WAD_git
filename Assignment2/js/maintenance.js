/*
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to genearte a report and process auction item
 */
var xHRObject = false;
if (window.XMLHttpRequest) {
  xHRObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

/**
 * This method uses to process auction list
 */
function processAuction() {
  xHRObject.open("GET", "processAuction.php", true);
  xHRObject.onreadystatechange = handleServerResponse;
  xHRObject.send("");
}

function handleServerResponse() {
  if (xHRObject.readyState == 4) {
    if (xHRObject.status == 200) {
      alert(xHRObject.responseText);
    } else {
      xHRObject.abort();
    }
  }
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
 * This method uses to generate a report
 */
function generateReport() {
  xml = getAuctionItem();
  xsl = loadXMLDoc('xsl/generateReport.xsl');
  if (window.ActiveXObject || xhttp.responseType == "msxml-document") {
    var transform = xml.transformNode(xsl);
    if (xml != null) {
      document.getElementById("result").innerHTML = '';
      resultDocument = xsltProcessor.transformToFragment(xml, document);
      document.getElementById("result").innerHTML = transform;
    } else {
      document.getElementById("result").innerHTML = 'There is no item in the list';
    }

  } else if (document.implementation && document.implementation.createDocument) {
    xsltProcessor = new XSLTProcessor();
    xsltProcessor.importStylesheet(xsl);
    if (xml != null) {
      document.getElementById("result").innerHTML = '';
      resultDocument = xsltProcessor.transformToFragment(xml, document);
      document.getElementById("result").appendChild(resultDocument);
    } else {
      document.getElementById("result").innerHTML = 'There is no item in the list';
    }
    updateList();
  }
}

/**
 * This method uses to update a list after generate report
 */
function updateList() {
  xHRObject.open("GET", "maintenance.php", true);
  xHRObject.onreadystatechange = handleServerResponse;
  xHRObject.send("");
}
