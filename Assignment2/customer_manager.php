<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This class uses to handle customer xml
 */

 /**
  * This method uses to convert custumer xml to array
  * @return  array  The list customer from xml
  */
function convertCustomerToArray() {
  $customers = array();
  if (file_exists('../../data/customer.xml')) {
    $xml_object = simplexml_load_file('../../data/customer.xml');
    if ($xml_object != null) {
      foreach ($xml_object as $key => $value) {
        $customer = array('customer_id' => intval($value->customer_id),
                          'first_name' => (string)$value->first_name,
                          'surname' => (string)$value->surname,
                          'email' => (string)$value->email,
                          'password' => (string)$value->password
                        );
        array_push($customers,$customer);
      }
    }
  }
  return $customers;
}

/**
 * This method uses to export to xml from array
 * @return  xml xml file
 */
function toCustomerXML($customerArray)
{
    $doc = new DomDocument('1.0');
    $customers = $doc->createElement('customers');
    $customers = $doc->appendChild($customers);
    for ($i=0 ; $i < count($customerArray); $i++) {
      $customer = $doc->createElement('customer');
      $customer = $customers->appendChild($customer);

      $customerIdTag = $doc->createElement('customer_id');
      $customerIdTag = $customer->appendChild($customerIdTag);
      $customerIdValue = $doc->createTextNode($customerArray[$i]['customer_id']);
      $customerIdValue = $customerIdTag->appendChild($customerIdValue);

      $firstNameTag = $doc->createElement('first_name');
      $firstNameTag = $customer->appendChild($firstNameTag);
      $firstNameValue = $doc->createTextNode($customerArray[$i]['first_name']);
      $firstNameValue = $firstNameTag->appendChild($firstNameValue);

      $surnameTag = $doc->createElement('surname');
      $surnameTag = $customer->appendChild($surnameTag);
      $surnameValue = $doc->createTextNode($customerArray[$i]['surname']);
      $surnameValue = $surnameTag->appendChild($surnameValue);

      $emailTag = $doc->createElement('email');
      $emailTag = $customer->appendChild($emailTag);
      $emailValue = $doc->createTextNode($customerArray[$i]['email']);
      $emailValue = $emailTag->appendChild($emailValue);

      $passwordTag = $doc->createElement('password');
      $passwordTag = $customer->appendChild($passwordTag);
      $passwordValue = $doc->createTextNode($customerArray[$i]['password']);
      $passwordValue = $passwordTag->appendChild($passwordValue);
    }
    $doc->formatOutput = true;
    $strXml = $doc->saveXML();
    $doc->save('../../data/customer.xml');
    return $strXml;
}

/**
 * This method uses to get generate id
 * @return  int customer id
 */
function getCustomerId($customerArray) {
  if (count($customerArray) == 0) {
    return 1;
  } else {
    return count($customerArray)+1;
  }
}
?>
