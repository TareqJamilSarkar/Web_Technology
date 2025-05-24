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

if (!$user) {
    echo "<h2>User not found.</h2>";
    closeCon($conn);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile - <?php echo htmlspecialchars($user['firstname']); ?></title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        .profile-container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; border: 1px solid #007bff;}
        .profile-img { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 2px solid #007bff; margin-bottom: 15px; }
        .profile-title { margin-bottom: 20px; }
        .profile-field { margin-bottom: 12px; }
        .profile-label { font-weight: bold; width: 120px; display: inline-block; }
        .back-link { display:inline-block; margin-top:10px; }
    </style>
</head>
<body>
<div class="profile-container">
    <h2 class="profile-title">User Profile</h2>
    <div style="text-align:center;">
        <?php if (!empty($user['myfile']) && file_exists(__DIR__ . "/uploads/" . $user['myfile'])): ?>
            <img class="profile-img" src="uploads/<?php echo htmlspecialchars($user['myfile']); ?>" alt="Profile Image">
        <?php else: ?>
            <span style="color:gray;">No Image</span>
        <?php endif; ?>
    </div>
    <div class="profile-field"><span class="profile-label">First Name:</span> <?php echo htmlspecialchars($user['firstname']); ?></div>
    <div class="profile-field"><span class="profile-label">Surname:</span> <?php echo htmlspecialchars($user['surname']); ?></div>
    <div class="profile-field"><span class="profile-label">Email:</span> <?php echo htmlspecialchars($user['email']); ?></div>
    <div class="profile-field"><span class="profile-label">Phone:</span> <?php echo htmlspecialchars($user['phone']); ?></div>
    <div class="profile-field"><span class="profile-label">Date of Birth:</span> <?php echo htmlspecialchars($user['dob']); ?></div>
    <div class="profile-field"><span class="profile-label">Address:</span> <?php echo htmlspecialchars($user['address']); ?></div>
    <div class="profile-field"><span class="profile-label">Event:</span> <?php echo htmlspecialchars($user['event']); ?></div>
    <div class="profile-field"><span class="profile-label">Message:</span> <?php echo htmlspecialchars($user['message'] ?? ''); ?></div>
    <div class="back-link">
        <a href="Admin_Home.php">Back to Admin Panel</a>
    </div>
</div>
</body>
</html>
<?php closeCon($conn); ?>