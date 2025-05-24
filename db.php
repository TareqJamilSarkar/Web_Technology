<?php

function createConObject() {

    $conn = new mysqli("localhost", "root", "", "Event_Management");
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function insertData($conn, $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile) {
   
    $sql = "INSERT INTO Users (firstname, surname, phone, dob, address, email, password, event, myfile)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return false;
    $stmt->bind_param("sssssssss", $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function checkLogin($conn, $email, $password) {
    
    $sql = "SELECT * FROM Users WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return false;
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

function getAllUsers($conn) {
    $sql = "SELECT * FROM Users";
    return $conn->query($sql);
}

function getUserById($conn, $id) {
    $sql = "SELECT * FROM Users WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return null;
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->fetch_assoc();
}

function searchUsersByName($conn, $name) {
    $sql = "SELECT * FROM Users WHERE firstname LIKE ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return [];
    $searchTerm = "%$name%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $stmt->close();
    return $users;
}

function deleteUser($conn, $id) {
    $sql = "DELETE FROM Users WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return false;
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function updateUser($conn, $id, $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile) {
    $sql = "UPDATE Users SET firstname=?, surname=?, phone=?, dob=?, address=?, email=?, password=?, event=?, myfile=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return false;
    $stmt->bind_param("sssssssssi", $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function closeCon($conn) {
    $conn->close();
}

?>