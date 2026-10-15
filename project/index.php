<?php
session_start();
include("connect.php");

if (isset($_SESSION['user_name'])) {
    header("Location: home.php");
    exit;
}

$msg = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($con, "SELECT name FROM user WHERE name=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_name'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $msg = "Username or password is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Online Registration System</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <nav class="simple-nav"><a href="index.php">Online Registration System</a></nav>
    <main class="container">
        <section class="hero-section login-box">
            <h1>Login</h1>
            <p class="muted">Sign in to view and manage registered details.</p>
            <?php if (isset($_GET['registered'])): ?><p class="message">Registration successful. Please log in.</p><?php endif; ?>
            <?php if ($msg != ""): ?><p class="error"><?php echo htmlspecialchars($msg); ?></p><?php endif; ?>
            <p class="db-message"><?php echo htmlspecialchars($dbMessage); ?></p>
            <form method="post" action="index.php" class="simple-form">
                <label>Username<input type="text" name="username" required></label>
                <label>Password<input type="password" name="password" required></label>
                <button type="submit" name="submit" class="main-button">Sign In</button>
            </form>
            <p class="below-form">New user? <a href="register.html">Register here</a></p>
        </section>
    </main>
    <footer>Online Registration System</footer>
</body>
</html>
