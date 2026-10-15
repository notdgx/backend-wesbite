<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: home.php");
    exit;
}
include("connect.php");
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit;
}

$id = (int)($_POST['id'] ?? 0);
$name = trim($_POST['name']);
$mobile = trim($_POST['mobile']);
$password = $_POST['password'];
$address = trim($_POST['address']);
$role = $_POST['role'];
$gender = $_POST['gender'];
$class = $_POST['class'];

// Keep the existing password and photo unless new ones are provided.
$stmt = mysqli_prepare($con, "SELECT password, photo FROM user WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$old = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$old) die("User not found. <a href='home.php'>Back</a>");
if ($password == "") $password = $old['password'];
$photo = $old['photo'];

if (!empty($_FILES['photo']['name'])) {
    $newPhoto = time() . "_" . basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $newPhoto)) {
        if ($photo != "" && file_exists("uploads/" . $photo)) unlink("uploads/" . $photo);
        $photo = $newPhoto;
    }
}

$update = mysqli_prepare($con, "UPDATE user SET name=?, mobile=?, password=?, address=?, photo=?, role=?, gender=?, `class`=? WHERE id=?");
mysqli_stmt_bind_param($update, "ssssssssi", $name, $mobile, $password, $address, $photo, $role, $gender, $class, $id);
if (mysqli_stmt_execute($update)) {
    header("Location: home.php");
    exit;
} else {
    echo "Update failed. <a href='home.php'>Back to users</a>";
}
?>
