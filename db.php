<?php

function createConObject(){
    return new mysqli("localhost", "root", "", "Event_Management");
}


function insertData($conn, $firstname, $surname, $phone, $dob, $address, $email, $event, $myfile) {
    $sql = "INSERT INTO Users (firstname, surname, phone, dob, address, email, event, myfile)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssisssss", $firstname, $surname, $phone, $dob, $address, $email, $event, $myfile);
    if ($stmt->execute()) {
        echo "Data inserted successfully.<br>";
    } else {
        die("Insert error: " . $stmt->error);
    }
    $stmt->close();
}

function closeCon($conn) {
    $conn->close();
}

?>