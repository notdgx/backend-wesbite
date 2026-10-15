<?php
// Connect to MySQL first (without choosing a database).
$con = mysqli_connect("localhost", "root", "");

if (!$con) {
    die("MySQL is not running. Open XAMPP and start MySQL.");
}

// Check whether the database already exists. Create it only if it is missing.
$check = mysqli_query($con, "SHOW DATABASES LIKE 'college_db'");
if (mysqli_num_rows($check) > 0) {
    $dbMessage = "Database 'college_db' already exists.";
} else {
    if (!mysqli_query($con, "CREATE DATABASE college_db")) {
        die("Could not create database 'college_db'. Check your MySQL settings.");
    }
    $dbMessage = "Database 'voting' was created.";
}

mysqli_select_db($con, "college_db");

// If the database exists but the table doesn't, create the table too.
$tableCreated = mysqli_query($con, "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile VARCHAR(30) NOT NULL,
    address VARCHAR(255) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    status INT DEFAULT 0,
    votes INT DEFAULT 0,
    `class` VARCHAR(30) NOT NULL
)");
if (!$tableCreated) {
    die("Could not create the user table in the college_db database.");
}
?>
