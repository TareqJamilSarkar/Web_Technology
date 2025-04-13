<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration Form</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    
</head>
<body>

    <h2>Customer Registration</h2>

    <form action="Home.php" method="POST">

        <fieldset>
            <legend>Personal Information</legend>

            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name"><br>
            <span class="error" id="name-error"></span><br>


            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname"><br>
            <span class="error" id="surname-error"></span><br>


            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone"><br>
            <span class="error" id="phone-error"></span><br>


            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob"><br>
            <span class="error" id="dob-error"></span><br>


            <label for="address">Address:</label>
            <input type="text" id="address" name="address"><br>
            <span class="error" id="address-error"></span><br>

        

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
            <span class="error" id="email-error"></span><br>


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
            <label for="reunion">Reunion Party</label><br>
            <span class="error" id="event-error"></span><br>
            
        </fieldset>

        <fieldset>
            <legend>Message to Admin</legend>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>
        </fieldset>
       
        <button type="submit">Submit</button>

    </form>
    <script src="myjs.js"></script>
</body>
</html>
