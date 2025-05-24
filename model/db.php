<?php
// model/db.php

function createConObject() {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Update your database credentials if needed
    $database = "event_management";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeCon($conn) {
    if ($conn) $conn->close();
}

function insertData($conn, $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile) {
    $stmt = $conn->prepare("INSERT INTO users (firstname, surname, phone, dob, address, email, password, event, myfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function getAllUsers($conn) {
    return $conn->query("SELECT * FROM users");
}

function getUserById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
    $stmt->close();
    return $user;
}

function updateUser($conn, $id, $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile) {
    $stmt = $conn->prepare("UPDATE users SET firstname=?, surname=?, phone=?, dob=?, address=?, email=?, password=?, event=?, myfile=? WHERE id=?");
    $stmt->bind_param("sssssssssi", $firstname, $surname, $phone, $dob, $address, $email, $password, $event, $myfile, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deleteUser($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function checkLogin($conn, $email, $password) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    return $stmt->get_result();
}

function searchUsersByName($conn, $searchName) {
    $search = '%' . $searchName . '%';
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname LIKE ? OR surname LIKE ?");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $res = $stmt->get_result();
    $users = [];
    while ($row = $res->fetch_assoc()) {
        $users[] = $row;
    }
    $stmt->close();
    return $users;
}
?>