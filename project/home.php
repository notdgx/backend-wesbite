<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit;
}
include("connect.php");
$result = mysqli_query($con, "SELECT * FROM user ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Online Registration System</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <nav class="simple-nav"><a href="home.php">Online Registration System</a></nav>
    <main class="container">
        <section class="hero-section">
            <h1>Registered Users</h1>
            <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></p>
            <p class="db-message"><?php echo htmlspecialchars($dbMessage); ?></p>
            <div class="top-actions"><a class="back-link" href="register.html">Add user</a>
                <form action="logout.php" method="post"><button class="back-link" type="submit">Logout</button></form>
            </div>
            <div class="table-wrap"><table>
                <thead><tr><th>ID</th><th>Name</th><th>Mobile</th><th>Address</th><th>Photo</th><th>Role</th><th>Gender</th><th>Class</th><th>Edit</th><th>Delete</th></tr></thead>
                <tbody>
                <?php while ($r = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $r['id']; ?></td>
                        <td><?php echo htmlspecialchars($r['name']); ?></td>
                        <td><?php echo htmlspecialchars($r['mobile']); ?></td>
                        <td><?php echo htmlspecialchars($r['address']); ?></td>
                        <td><?php if ($r['photo'] != "") { ?><img class="user-photo" src="uploads/<?php echo rawurlencode($r['photo']); ?>" alt="Photo"><?php } else { echo "-"; } ?></td>
                        <td><?php echo $r['role'] == 1 ? "Admin" : "User"; ?></td>
                        <td><?php echo htmlspecialchars($r['gender']); ?></td>
                        <td><?php echo htmlspecialchars($r['class']); ?></td>
                        <td><a href="edit.php?id=<?php echo $r['id']; ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Delete this user?')">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table></div>
        </section>
    </main>
    <footer>Online Registration System</footer>
</body>
</html>
