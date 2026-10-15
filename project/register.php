<?php
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: register.html");
    exit;
}

$name = trim($_POST['name']);
$mobile = trim($_POST['mobile']);
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = trim($_POST['address']);
$role = $_POST['role'];
$gender = $_POST['gender'];
$class = $_POST['class'];
$photo = "";

if ($password != $cpassword) {
    die("Passwords do not match. <a href='register.html'>Go back</a>");
}

// The image is optional.
if (!empty($_FILES['photo']['name'])) {
    $photo = time() . "_" . basename($_FILES['photo']['name']);
    if (!move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo)) {
        die("Could not upload the image. <a href='register.html'>Try again</a>");
    }
}

$stmt = mysqli_prepare($con, "INSERT INTO user (name, mobile, address, gender, password, photo, role, status, votes, `class`) VALUES (?, ?, ?, ?, ?, ?, ?, 0, 0, ?)");
mysqli_stmt_bind_param($stmt, "ssssssss", $name, $mobile, $address, $gender, $password, $photo, $role, $class);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?registered=1");
    exit;
} else {
    if ($photo != "" && file_exists("uploads/" . $photo)) unlink("uploads/" . $photo);
    die("Registration failed. Please check your details. <a href='register.html'>Go back</a>");
}
?>
