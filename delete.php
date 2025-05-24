<?php

session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin.php");
    exit();
}
include "db.php";
$conn = createConObject();

$userId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = getUserById($conn, $userId);

if ($user) {
    
    if (!empty($user['myfile']) && file_exists(__DIR__ . "/uploads/" . $user['myfile'])) {
        unlink(__DIR__ . "/uploads/" . $user['myfile']);
    }
    deleteUser($conn, $userId);
    $_SESSION["message"] = "User deleted successfully.";
    $_SESSION["message_type"] = "success";
} else {
    $_SESSION["message"] = "User not found or already deleted.";
    $_SESSION["message_type"] = "error";
}
closeCon($conn);
header("Location: Admin_Home.php");
exit();