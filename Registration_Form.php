<?php
require "action.php";  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration Form</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    
</head>
<body>

    <h1>Customer Registration</h1>

    <form action="" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">

        <fieldset>
            <legend>Personal Information</legend>

            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname">
            <span  id="error"><?php echo $fnameError; ?> </span><br> 

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname">
            <span  id="error"><?php echo $surnameError; ?> </span><br> 

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone">
            <span  id="error"><?php echo $phoneError; ?> </span><br> 

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <span  id="error" ><?php echo $dobError; ?> </span><br> 

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
            <span  id="error" ><?php echo $addressError; ?> </span><br> 

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <span  id="error"><?php echo $emailError; ?> </span><br> 

             <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span  id="error"><?php echo $passwordError; ?> </span><br> 

        </fieldset>

        <fieldset>
            <legend>Event Management</legend>
            <label>Select an Event Type:</label><br>

            <input type="radio" id="marriage" name="event" value="Marriage Event">
            <label for="marriage">Marriage Event</label><br>

            <input type="radio" id="birthday" name="event" value="Birthday Party">
            <label for="birthday">Birthday Party</label><br>

            <input type="radio" id="music" name="event" value="Music Concerts & Live Shows">
            <label for="music">Music Concerts & Live Shows</label><br>

            <input type="radio" id="anniversary" name="event" value="Anniversary Event">
            <label for="anniversary">Anniversary Event</label><br>

            <input type="radio" id="reunion" name="event" value="Reunion Party">
            <label for="reunion">Reunion Party</label>
            <span  id="error"><?php echo $eventError; ?> </span><br>
            
        </fieldset>

        <fieldset>
            <legend>Message to Admin</legend>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>
        </fieldset>

        <label for="file">Upload File</label><br>
        <input type="file" id="file" name="file"><br>
        <span  id="error"><?php echo $myfileError; ?> </span><br>
       
        <button type="submit" name="submit">Submit</button>
        <button type="reset" name="reset">Clear all Information</button>

    </form>
   

</body>
</html>