<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $conn = createConObject();
    $result = checkLogin($conn, $email, $password);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["admin_id"] = $user["id"];
        $_SESSION["admin_name"] = $user["firstname"];
        $_SESSION["admin_email"] = $user["email"];
        $_SESSION["message"] = "Welcome, " . htmlspecialchars($user["firstname"]) . "!";
        $_SESSION["message_type"] = "success";
        header("Location: Admin_Home.php");
        exit();
    } else {
        $_SESSION["message"] = "Invalid email or password.";
        $_SESSION["message_type"] = "error";
        header("Location: admin.php");
        exit();
    }

    closeCon($conn);
}
?>