<?php
session_start();
include "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');
    $hasError = 0;

    // Validation
    if (empty($email)) {
        $_SESSION['message'] = "Email is required.";
        $_SESSION['message_type'] = "error";
        $hasError = 1;
    }
    if (empty($password)) {
        $_SESSION['message'] = "Password is required.";
        $_SESSION['message_type'] = "error";
        $hasError = 1;
    }

    if ($hasError == 0) {
        $conn = createConObject();
        $result = checkLogin($conn, $email, $password);
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION["admin_id"] = $row["id"];
            $_SESSION["admin_name"] = $row["firstname"];
            $_SESSION['message'] = "Login successful!";
            $_SESSION['message_type'] = "success";
            closeCon($conn);
            header("Location: ../view/Home.php");
            exit();
        } else {
            $_SESSION['message'] = "Invalid email or password.";
            $_SESSION['message_type'] = "error";
            closeCon($conn);
            header("Location: ../view/admin.php");
            exit();
        }
    } else {
        header("Location: ../view/admin.php");
        exit();
    }
} else {
    header("Location: ../view/admin.php");
    exit();
}
?>