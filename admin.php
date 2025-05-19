<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<form action="Admin_Home.php" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">
     
        <legend>Admin Login</legend>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <span  id="error"><?php echo $emailError; ?> </span><br>


        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span  id="error"><?php echo $passwordError; ?> </span><br>


<button type="submit" name="submit">Submit</button>
</form>

</body>
</html>