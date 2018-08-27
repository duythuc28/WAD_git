/*
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a account
 */
var xHRObject = false;
if (window.XMLHttpRequest) {
  xHRObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

/**
 * This method uses to create a request to register a customer
 * @param  {[String]} email           [email]
 * @param  {[String]} password        [password]
 * @param  {[String]} firstName       [firstName]
 * @param  {[String]} surname         [surname]
 * @param  {[String]} confirmPassword [confirmPassword]
 */
function registerCustomer(email, password, firstName, surname, confirmPassword) {
  xHRObject.open("POST", "register.php", true);
  xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xHRObject.onreadystatechange = handleServerResponse;
  xHRObject.send("email=" + email + "&password=" + password + "&confirmPassword=" + confirmPassword + "&firstName=" + firstName+ "&surname=" + surname);
}


function handleServerResponse() {
  if (xHRObject.readyState == 4) {
    if (xHRObject.status == 200) {
      var xml = xHRObject.responseText;
      document.getElementById("results").innerHTML = xml;
      document.getElementById("error_result").innerHTML = '';
    } else {
      var xml = xHRObject.responseText;
      document.getElementById("results").innerHTML = '';
      document.getElementById("error_result").innerHTML = xml;
      xHRObject.abort();
    }
  }
}

function clearField() {
  document.getElementById("email_field").value = '';
  document.getElementById("password_field").value = '';
  document.getElementById("firstname_field").value = '';
  document.getElementById("surname_field").value = '';
  document.getElementById("confirm_password_field").value = '';
}
