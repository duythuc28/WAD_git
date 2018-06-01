var xhr = false;
if (window.XMLHTTPRequest) {
	xhr = new XMLHTTPRequest();
} else if (window.ActiveXObject) {
	xhr = new ActiveXObject("Microsoft.XMLHTTPRequest");
}