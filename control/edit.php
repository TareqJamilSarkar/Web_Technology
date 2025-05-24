<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: ../view/admin.php");
    exit();
}
include "../model/db.php";
$conn = createConObject();

$userId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = getUserById($conn, $userId);

if (!$user) {
    echo "<h2>User not found.</h2>";
    closeCon($conn);
    exit();
}

$fnameError = $surnameError = $phoneError = $dobError = $addressError = $emailError = $passwordError = $eventError = $myfileError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    
    $firstname = trim($_POST["firstname"]);
    $surname = trim($_POST["surname"]);
    $phone = trim($_POST["phone"]);
    $dob = trim($_POST["dob"]);
    $address = trim($_POST["address"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $event = $_POST["event"] ?? "";
    $hasError = 0;

    if (empty($firstname) || strlen($firstname) < 3) {
        $fnameError = "Please enter a valid first name (min 3 characters)";
        $hasError = 1;
    }
    if (empty($surname)) {
        $surnameError = "Invalid surname";
        $hasError = 1;
    }
    if (empty($phone)) {
        $phoneError = "Invalid phone number";
        $hasError = 1;
    }
    if (empty($dob)) {
        $dobError = "Invalid date of birth";
        $hasError = 1;
    }
    if (empty($address)) {
        $addressError = "Invalid address";
        $hasError = 1;
    }
    if (empty($email)) {
        $emailError = "Invalid email";
        $hasError = 1;
    }
    if (empty($password)) {
        $passwordError = "Invalid password";
        $hasError = 1;
    }
    if (empty($event)) {
        $eventError = "Please select an event";
        $hasError = 1;
    }

    $myfile = $user['myfile'];
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $myfile = basename($_FILES["file"]["name"]);
        $uploadDir = dirname(__DIR__) . "/uploads/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $targetFile = $uploadDir . $myfile;
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
    }

    if ($hasError == 0) {
        $updated = updateUser(
            $conn, $userId, $firstname, $surname, $phone, $dob, $address, $email,
            $password, $event, $myfile
        );
        if ($updated) {
            $_SESSION["message"] = "User updated successfully!";
            $_SESSION["message_type"] = "success";
            header("Location: ../view/Admin_Home.php");
            closeCon($conn);
            exit();
        } else {
            $emailError = "Update failed. Email might already exist or database error.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User - <?php echo htmlspecialchars($user['firstname']); ?></title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .edit-box { max-width: 600px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 10px; }
        .profile-img { width: 80px; height: 80px; object-fit: cover; border-radius: 50%; border: 2px solid #007bff; }
    </style>
</head>
<body>
<div class="edit-box">
    <h2>Edit User</h2>
    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?php echo htmlspecialchars($_POST['firstname'] ?? $user['firstname']); ?>">
        <span class="error" style="color:red;"><?php echo $fnameError; ?></span><br>

        <label>Surname:</label>
        <input type="text" name="surname" value="<?php echo htmlspecialchars($_POST['surname'] ?? $user['surname']); ?>">
        <span class="error" style="color:red;"><?php echo $surnameError; ?></span><br>

        <label>Phone Number:</label>
        <input type="tel" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? $user['phone']); ?>">
        <span class="error" style="color:red;"><?php echo $phoneError; ?></span><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo htmlspecialchars($_POST['dob'] ?? $user['dob']); ?>">
        <span class="error" style="color:red;"><?php echo $dobError; ?></span><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($_POST['address'] ?? $user['address']); ?>">
        <span class="error" style="color:red;"><?php echo $addressError; ?></span><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? $user['email']); ?>">
        <span class="error" style="color:red;"><?php echo $emailError; ?></span><br>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? $user['password']); ?>">
        <span class="error" style="color:red;"><?php echo $passwordError; ?></span><br>

        <label>Event:</label><br>
        <?php
        $eventTypes = [
            "Marriage Event",
            "Birthday Party",
            "Music Concerts & Live Shows",
            "Anniversary Event",
            "Reunion Party"
        ];
        foreach ($eventTypes as $evt) {
            $checked = (($_POST['event'] ?? $user['event']) == $evt) ? 'checked' : '';
            echo "<input type='radio' name='event' value='$evt' $checked> $evt<br>";
        }
        ?>
        <span class="error" style="color:red;"><?php echo $eventError; ?></span><br>

        <label>Current Image:</label><br>
        <?php if (!empty($user['myfile']) && file_exists(dirname(__DIR__) . "/uploads/" . $user['myfile'])): ?>
            <img class="profile-img" src="../uploads/<?php echo htmlspecialchars($user['myfile']); ?>" alt="Profile Image"><br>
        <?php else: ?>
            <span style="color:gray;">No Image</span><br>
        <?php endif; ?>
        <label>Change Image:</label>
        <input type="file" name="file"><br>
        <span class="error" style="color:red;"><?php echo $myfileError; ?></span><br>

        <button type="submit" name="update">Update</button>
        <a href="../view/Admin_Home.php"><button type="button">Cancel</button></a>
    </form>
</div>
</body>
</html>
<?php closeCon($conn); ?>