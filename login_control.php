<?php
include ("db.php");

if (isset($_REQUEST["submit"])) {
    
    $conn = createConObject();
    $result = checkLogin($conn, $email, $password);
    
    if (mysqli_num_rows ( $result ) > 0) {
        header("Location: admin.php");
    } else {
        echo mysqli_error($conn);
    }
    

}
?>