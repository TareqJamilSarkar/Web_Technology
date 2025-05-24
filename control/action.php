<?php
include "../model/db.php";

$fnameError = $surnameError = $phoneError = $dobError = $addressError = $emailError = $passwordError = $eventError = $myfileError = "";
$hasError = 0;
$myfile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    // Validation
    if (empty($_POST["firstname"]) || strlen(trim($_POST["firstname"])) < 3) {
        $fnameError = "Please enter a valid first name (min 3 characters)";
        $hasError = 1;
    }

    if (empty($_POST["surname"])) {
        $surnameError = "Invalid surname";
        $hasError = 1;
    }

    if (empty($_POST["phone"])) {
        $phoneError = "Invalid phone number";
        $hasError = 1;
    }

    if (empty($_POST["dob"])) {
        $dobError = "Invalid date of birth";
        $hasError = 1;
    }

    if (empty($_POST["address"])) {
        $addressError = "Invalid address";
        $hasError = 1;
    }

    if (empty($_POST["email"])) {
        $emailError = "Invalid email";
        $hasError = 1;
    }

    if (empty($_POST["password"])) {
        $passwordError = "Invalid password";
        $hasError = 1;
    }

    if (empty($_POST["event"])) {
        $eventError = "Please select an event";
        $hasError = 1;
    }

    $message = !empty($_POST["message"]) ? $_POST["message"] : "";

    if (!isset($_FILES["file"]) || $_FILES["file"]["error"] != 0) {
        $myfileError = "Invalid File";
        $hasError = 1;
    } else {
        $myfile = basename($_FILES["file"]["name"]);
    }

    if ($hasError == 0) {
        $conn = createConObject();
        $inserted = insertData(
            $conn,
            $_POST["firstname"],
            $_POST["surname"],
            $_POST["phone"],
            $_POST["dob"],
            $_POST["address"],
            $_POST["email"],
            $_POST["password"],
            $_POST["event"],
            $myfile
        );
        if ($inserted) {
            $uploadDir = dirname(__DIR__) . "/uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $targetFile = $uploadDir . $myfile;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {

                session_start();
                $_SESSION['message'] = "Registration successful! Please log in.";
                $_SESSION['message_type'] = "success";
                header("Location: ../view/admin.php");
                exit();
            } else {
                $myfileError = "Failed to upload file.";
            }
        } else {
            $emailError = "Registration failed. Email might already exist, or database error.";
        }
        closeCon($conn);
    }
}
?>