/*
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a login request and handle login fucntions
 */
var xHRObject = false;
if (window.XMLHttpRequest) {
  xHRObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}
/**
 * This method uses to request login with server
 * @param  {[String]} email    [email]
 * @param  {[String]} password [password]
 */
function loginRequest(email, password) {
  xHRObject.open("POST", "login.php", true);
  xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xHRObject.onreadystatechange = handleServerResponse;
  xHRObject.send("email=" + email + "&password=" + password);
}


function handleServerResponse() {
  if (xHRObject.readyState == 4) {
    if (xHRObject.status == 200) {
      alert("Login successfully");
      window.open("listing.html","_self");
    } else {
      var xml = xHRObject.responseText;
      document.getElementById("error_result").innerHTML = xml;
      xHRObject.abort();
    }
  }
}

/**
 * This method uses to reset field
 */
function clearField() {
  document.getElementById("email_field").value = '';
  document.getElementById("password_field").value = '';
}
