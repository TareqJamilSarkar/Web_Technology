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
    
</head>
<body>
    <h1>Customer Registration</h1>
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this.id)" id="regForm">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="firstname">First Name:</label>
            <input type="text" id="first-name" name="firstname" value="<?php echo htmlspecialchars($_POST['firstname'] ?? ''); ?>">
            <span class="error" id="name-error" style="color:red;"><?php echo $fnameError; ?></span><br>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($_POST['surname'] ?? ''); ?>">
            <span class="error" style="color:red;"><?php echo $surnameError; ?></span><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
            <span class="error" id="phone-error" style="color:red;"><?php echo $phoneError; ?></span><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($_POST['dob'] ?? ''); ?>">
            <span class="error" id="dob-error" style="color:red;"><?php echo $dobError; ?></span><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>">
            <span class="error" style="color:red;"><?php echo $addressError; ?></span><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            <span class="error" id="email-error" style="color:red;"><?php echo $emailError; ?></span><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span class="error" id="password-error" style="color:red;"><?php echo $passwordError; ?></span><br>
        </fieldset>

        <fieldset>
            <legend>Event Management</legend>
            <label>Select an Event Type:</label><br>
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
            <span class="error" style="color:red;"><?php echo $eventError; ?></span><br>
        </fieldset>

        <fieldset>
            <legend>Message to Admin</legend>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" cols="50"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
        </fieldset>

        <label for="file">Upload File</label><br>
        <input type="file" id="file" name="file"><br>
        <span class="error" style="color:red;"><?php echo $myfileError; ?></span><br>
       
        <button type="submit" name="submit">Submit</button>
        <button type="reset" name="reset">Clear all Information</button>
    </form>
</body>
</html>