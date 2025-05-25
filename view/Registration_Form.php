<?php
include '../control/action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration Form</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        table.reg-table { background: #fff; border-radius: 10px; padding: 20px; width: 100%; max-width: 600px; margin: 30px auto; border-collapse: separate; border-spacing: 0 10px;}
        table.reg-table td { padding: 8px 4px; }
        table.reg-table label { font-weight: bold; }
        .error { color: red; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <h1 class="center">Customer Registration</h1>
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this.id)" id="regForm">
        <table class="reg-table">
            <tr>
                <td><label for="firstname">First Name:</label></td>
                <td>
                    <input type="text" id="first-name" name="firstname" value="<?php echo htmlspecialchars($_POST['firstname'] ?? ''); ?>">
                    <span class="error" id="name-error"><?php echo $fnameError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="surname">Surname:</label></td>
                <td>
                    <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($_POST['surname'] ?? ''); ?>">
                    <span class="error"><?php echo $surnameError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                    <span class="error" id="phone-error"><?php echo $phoneError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td>
                    <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($_POST['dob'] ?? ''); ?>">
                    <span class="error" id="dob-error"><?php echo $dobError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="address">Address:</label></td>
                <td>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>">
                    <span class="error"><?php echo $addressError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                    <span class="error" id="email-error"><?php echo $emailError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td>
                    <input type="password" id="password" name="password">
                    <span class="error" id="password-error"><?php echo $passwordError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Event Type:</label></td>
                <td>
                    <input type="radio" id="marriage" name="event" value="Marriage Event" <?php if (!empty($_POST['event']) && $_POST['event'] == 'Marriage Event') echo 'checked'; ?>>
                    <label for="marriage">Marriage Event</label><br>
                    <input type="radio" id="birthday" name="event" value="Birthday Party" <?php if (!empty($_POST['event']) && $_POST['event'] == 'Birthday Party') echo 'checked'; ?>>
                    <label for="birthday">Birthday Party</label><br>
                    <input type="radio" id="music" name="event" value="Music Concerts & Live Shows" <?php if (!empty($_POST['event']) && $_POST['event'] == 'Music Concerts & Live Shows') echo 'checked'; ?>>
                    <label for="music">Music Concerts & Live Shows</label><br>
                    <input type="radio" id="anniversary" name="event" value="Anniversary Event" <?php if (!empty($_POST['event']) && $_POST['event'] == 'Anniversary Event') echo 'checked'; ?>>
                    <label for="anniversary">Anniversary Event</label><br>
                    <input type="radio" id="reunion" name="event" value="Reunion Party" <?php if (!empty($_POST['event']) && $_POST['event'] == 'Reunion Party') echo 'checked'; ?>>
                    <label for="reunion">Reunion Party</label>
                    <span class="error"><?php echo $eventError; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="message">Message to Admin:</label></td>
                <td>
                    <textarea id="message" name="message" rows="4" cols="40"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="file">Upload File:</label></td>
                <td>
                    <input type="file" id="file" name="file"><br>
                    <span class="error"><?php echo $myfileError; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="center">
                    <button type="submit" name="submit">Submit</button>
                    <button type="reset" name="reset">Clear all Information</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>