<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>  Welcome to the Admin panel </h1>

<form action="Home.php" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">
        <legend>Admin Logout</legend>
<button type="submit" name="submit">Logout</button>
</form>


<form action="Registration_Form.php" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">
   <button type="submit" name="submit">Sign Up for new users</button>
</form>


</body>
</html>