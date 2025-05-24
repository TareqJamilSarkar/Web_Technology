<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../view/admin.php");
    exit();
}

include "../model/db.php";
$conn = createConObject();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);
    $user = getUserById($conn, $userId);

    if ($user) {
        // Delete user's image file if exists
        if (!empty($user['myfile'])) {
            $filePath = dirname(__DIR__) . "/uploads/" . $user['myfile'];
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $deleted = deleteUser($conn, $userId);

        if ($deleted) {
            $_SESSION['message'] = "User deleted successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Failed to delete user.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "User not found.";
        $_SESSION['message_type'] = "error";
    }
    closeCon($conn);
    header("Location: ../view/Admin_Home.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid request.";
    $_SESSION['message_type'] = "error";
    closeCon($conn);
    header("Location: ../view/Admin_Home.php");
    exit();
}
?>