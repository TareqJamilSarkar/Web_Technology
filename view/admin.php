<?php
session_start();
$message = $_SESSION['message'] ?? '';
$messageType = $_SESSION['message_type'] ?? '';
unset($_SESSION['message'], $_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <div class="container login-box">
        <h1>Login</h1>
        <?php if ($message): ?>
            <div class="alert <?= $messageType === 'success' ? 'success' : 'error' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="../control/login_control.php" method="POST" autocomplete="off">
            <div class="form-group">
                <label for="login-email">Email:</label>
                <input type="email" name="email" id="login-email" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" name="password" id="login-password" required>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="Registration_Form.php">Register here</a></p>
    </div>
</body>
</html>