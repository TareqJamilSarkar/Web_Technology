<?php

$fnameError = "";
$surnameError = "";
$phoneError = "";
$dobError = "";
$addressError = "";
$emailError = "";
$eventError = "";


if (isset($_REQUEST["submit"])) {

   
    if (empty($_REQUEST["firstname"])) {
        $fnameError = "Invalid first name";
    } else {
        echo $_REQUEST["firstname"] . "<br>";
    }

  
    if (empty($_REQUEST["surname"])) {
        $surnameError = "Invalid surname";
    } else {
        echo $_REQUEST["surname"] . "<br>";
    }

   
    if (empty($_REQUEST["phone"])) {
        $phoneError = "Invalid phone number";
    } else {
        echo $_REQUEST["phone"] . "<br>";
    }

    if (empty($_REQUEST["dob"])) {
        $dobError = "Invalid date of birth";
    } else {
        echo $_REQUEST["dob"] . "<br>";
    }

   
    if (empty($_REQUEST["address"])) {
        $addressError = "Invalid address";
    } else {
        echo $_REQUEST["address"] . "<br>";
    }


    if (empty($_REQUEST["email"])) {
        $emailError = "Invalid email";
    } else {
        echo $_REQUEST["email"] . "<br>";
    }

    if (empty($_REQUEST["event"])) {
        $eventError = "Please select an event";
    } else {
        echo $_REQUEST["event"] . "<br>";
    }

   
    if (!empty($_REQUEST["message"])) {
        echo "Message: " . $_REQUEST["message"] . "<br>";
    }
}
?>
