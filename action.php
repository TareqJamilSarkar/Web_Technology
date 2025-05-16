<?php

include "db.php";

$fnameError = $surnameError = $phoneError = $dobError = $addressError = $emailError = $eventError = $myfileError = "";
$haserror = 0;

$firstname = $surname = $phone = $dob = $address = $email = $event = $message = $myfile = "";

if (isset($_POST["submit"])) {

    if (empty($_POST["firstname"])) {
        $fnameError = "Invalid first name";
        $haserror = 1;
    } else {
        $firstname = $_POST["firstname"];
    }

    if (empty($_POST["surname"])) {
        $surnameError = "Invalid surname";
        $haserror = 1;
    } else {
        $surname = $_POST["surname"];
    }

    if (empty($_POST["phone"])) {
        $phoneError = "Invalid phone number";
        $haserror = 1;
    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["dob"])) {
        $dobError = "Invalid date of birth";
        $haserror = 1;
    } else {
        $dob = $_POST["dob"];
    }

    if (empty($_POST["address"])) {
        $addressError = "Invalid address";
        $haserror = 1;
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $emailError = "Invalid email";
        $haserror = 1;
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["event"])) {
        $eventError = "Please select an event";
        $haserror = 1;
    } else {
        $event = $_POST["event"];
    }

    if (!empty($_POST["message"])) {
        $message = $_POST["message"];
    }


    if (!isset($_FILES["file"]) || $_FILES["file"]["error"] != 0) {
        $myfileError = "Invalid File";
        $haserror = 1;
    } else {
      
        $uploadDir = "uploads/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $myfile = basename($_FILES["file"]["name"]);
        $targetFile = $uploadDir . $myfile;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        
        } else {
            $myfileError = "File upload failed";
            $haserror = 1;
        }
    }

    if ($haserror == 0) {
        $conn = createConObject();
        insertData($conn, $firstname, $surname, $phone, $dob, $address, $email, $event, $myfile);
        closeCon($conn);
    }
}
?>