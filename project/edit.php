<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit;
}
include("connect.php");
$id = (int)($_GET['id'] ?? 0);
$stmt = mysqli_prepare($con, "SELECT * FROM user WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$r = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$r) die("User not found. <a href='home.php'>Back</a>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit user</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <nav class="simple-nav"><a href="home.php">Online Registration System</a></nav>
    <main class="container">
        <section class="hero-section">
            <h1>Edit user</h1>
            <form action="update.php" method="POST" enctype="multipart/form-data" class="simple-form form-grid">
                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                <label>Name<input type="text" name="name" value="<?php echo htmlspecialchars($r['name']); ?>" required></label>
                <label>Mobile<input type="tel" name="mobile" value="<?php echo htmlspecialchars($r['mobile']); ?>" required></label>
                <label>New password <span class="hint">Leave blank to keep current password</span><input type="password" name="password"></label>
                <label>Address<input type="text" name="address" value="<?php echo htmlspecialchars($r['address']); ?>" required></label>
                <label>Replace image<input type="file" name="photo" accept="image/*"></label>
                <label>Role<select name="role"><option value="1" <?php if ($r['role'] == 1) echo 'selected'; ?>>Admin</option><option value="2" <?php if ($r['role'] == 2) echo 'selected'; ?>>User</option></select></label>
                <fieldset><legend>Gender</legend>
                    <?php foreach (['Female', 'Male', 'Other'] as $g) { ?><label class="inline"><input type="radio" name="gender" value="<?php echo $g; ?>" <?php if ($r['gender'] == $g) echo 'checked'; ?> required> <?php echo $g; ?></label><?php } ?>
                </fieldset>
                <fieldset><legend>Class</legend>
                    <?php foreach (['BCA', 'BBA', 'MCA'] as $c) { ?><label class="inline"><input type="radio" name="class" value="<?php echo $c; ?>" <?php if ($r['class'] == $c) echo 'checked'; ?> required> <?php echo $c; ?></label><?php } ?>
                </fieldset>
                <button type="submit" name="update" class="main-button full-row">Update details</button>
            </form>
            <p class="below-form"><a href="home.php">Back to users</a></p>
        </section>
    </main>
    <footer>Online Registration System</footer>
</body>
</html>
