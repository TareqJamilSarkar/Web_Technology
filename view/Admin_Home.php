<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin.php");
    exit();
}
include "../model/db.php";
$conn = createConObject();
$searchName = $_GET['search'] ?? '';
$users = [];
if ($searchName !== "") {
    $users = searchUsersByName($conn, $searchName);
} else {
    $result = getAllUsers($conn);
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - User Management</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        img.profile-img { width: 70px; height: 70px; object-fit: cover; border-radius: 50%; border: 2px solid #007bff; }
        .admin-actions a { margin: 0 5px; }
        .search-box { margin-bottom: 20px; }
        .profile-link { color: #007bff; text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Panel</h1>
    <p><strong>Logged in as:</strong> <?php echo htmlspecialchars($_SESSION["admin_name"]); ?> | <a href="../control/logout.php">Logout</a></p>

    <div class="search-box">
        <form method="get" action="">
            <input type="text" name="search" placeholder="Search by name..." value="<?php echo htmlspecialchars($searchName); ?>">
            <button type="submit">Search</button>
            <a href="Admin_Home.php"><button type="button">Reset</button></a>
        </form>
    </div>

    <h2>Registered Users</h2>
    <table border="1" cellpadding="10" style="width:100%;background:#fff;">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Event</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td>
                        <?php if (!empty($user['myfile']) && file_exists(dirname(__DIR__) . "/uploads/" . $user['myfile'])): ?>
                            <img class="profile-img" src="../uploads/<?php echo htmlspecialchars($user['myfile']); ?>" alt="Profile Image">
                        <?php else: ?>
                            <span style="color:gray;">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="profile-link" href="profile.php?id=<?php echo $user['id']; ?>">
                            <?php echo htmlspecialchars($user['firstname']); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($user['surname']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['event']); ?></td>
                    <td class="admin-actions">
                        <a href="../control/edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                        <a href="../control/delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No users found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php closeCon($conn); ?>