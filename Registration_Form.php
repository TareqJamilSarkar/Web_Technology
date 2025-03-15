<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Form</title>
</head>

<body>
    <h2> Customer  Registration</h2>
    
    <fieldset>
        <legend>Personal Information</legend>
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="first-name"><br><br>
        
        <label for="sure-name">Sure Name:</label>
        <input type="text" id="sure-name" name="sure-name"><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone"><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob"><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>

        <label for="Email">Email:</label>
        <input type="text" id="Email" name="Email"><br><br>

    </fieldset>

    <fieldset>
    <h2>Message </h2>
    <p>This is a simple message box for event management. You can customize the content as needed.</p>
    <button onclick="alert('Button clicked!')">OK</button>
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
        <label for="reunion">Reunion Party</label><br><br>
    </fieldset>
   
    

<form action="Home.php">
        <button type="submit">Submit</button>
</form>

</body>

</html>
