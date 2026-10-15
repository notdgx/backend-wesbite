<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit;
}
include("connect.php");
$id = (int)($_GET['id'] ?? 0);

$stmt = mysqli_prepare($con, "SELECT photo FROM user WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$r = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

$delete = mysqli_prepare($con, "DELETE FROM user WHERE id=?");
mysqli_stmt_bind_param($delete, "i", $id);
if (mysqli_stmt_execute($delete)) {
    if ($r && $r['photo'] != "" && file_exists("uploads/" . $r['photo'])) {
        unlink("uploads/" . $r['photo']);
    }
    header("Location: home.php");
    exit;
}
echo "Delete failed. <a href='home.php'>Back to users</a>";
?>
