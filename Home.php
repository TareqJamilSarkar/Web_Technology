<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1> This the Main Home page..</h1>




    
<h2>If you are new, please Register here</h2>
     <form action="Registration_Form.php" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">
   <button type="submit" name="submit">Sign Up for new users</button>
</form>


<h2>If you are an Admin, please Login here</h2>
<form action="admin.php" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">
    <button type="submit" name="submit">Login</button>



</form>
</body>
</html>