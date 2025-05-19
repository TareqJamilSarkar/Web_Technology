<?php

include "db.php";

$fnameError = $surnameError = $phoneError = $dobError = $addressError = $emailError = $passwordError = $eventError = $myfileError = "";
$hasError = 0;
$myfile = "";

if (isset($_REQUEST["submit"])) {

    if (empty($_REQUEST["firstname"])) {
        $fnameError = "Invalid first name";
        $hasError = 1;
    }

    if (empty($_REQUEST["surname"])) {
        $surnameError = "Invalid surname";
        $hasError = 1;
    }

    if (empty($_REQUEST["phone"])) {
        $phoneError = "Invalid phone number";
        $hasError = 1;
    }

    if (empty($_REQUEST["dob"])) {
        $dobError = "Invalid date of birth";
        $hasError = 1;
    }

    if (empty($_REQUEST["address"])) {
        $addressError = "Invalid address";
        $hasError = 1;
    }

    if (empty($_REQUEST["email"])) {
        $emailError = "Invalid email";
        $hasError = 1;
    }

    if (empty($_REQUEST["password"])) {
        $passwordError = "Invalid password";
        $hasError = 1;
    }

    if (empty($_REQUEST["event"])) {
        $eventError = "Please select an event";
        $hasError = 1;
    }

    $message = !empty($_REQUEST["message"]) ? $_REQUEST["message"] : "";

    if (!isset($_FILES["file"]) || $_FILES["file"]["error"] != 0) {
        $myfileError = "Invalid File";
        $hasError = 1;
    } else {
        $myfile = basename($_FILES["file"]["name"]);
    }

    if ($hasError == 0) {
        $conn = createConObject();
        if (insertData(
            $conn,
            $_REQUEST["firstname"],
            $_REQUEST["surname"],
            $_REQUEST["phone"],
            $_REQUEST["dob"],
            $_REQUEST["address"],
            $_REQUEST["email"],
            $_REQUEST["password"],
            $_REQUEST["event"],
            $myfile,
        )) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $targetFile = $uploadDir . $myfile;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                header("Location: admin.php");
                exit();
            }

        } else {
            $messages = mysqli_error($conn);
        }
        closeCon($conn);
    }
}
?>