<?php

function createConObject(){
    return new mysqli("localhost", "root", "", "Event_Management");
}


function insertData($conn, $firstname, $surname, $phone, $dob, $address, $email,$password, $event, $myfile) {
    $sql = "INSERT INTO Users (firstname, surname, phone, dob, address, email,password, event, myfile )
            VALUES ( '$firstname', '$surname', '$phone', '$dob', '$address', '$email','$password', '$event', '$myfile')";
    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}
function checkLogin($conn, $email, $password) {
    $sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
    return  mysqli_query($conn, $sql);
}   

function closeCon($conn) {
    $conn->close();
}

?>