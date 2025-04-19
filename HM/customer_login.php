<?php

if (isset($_SESSION["email_id"])) {
    header("Location: customer_ui.php");
    exit();
}

if (isset($_POST['login'])) {
    $email_id = $_POST['email'];
    $password = $_POST['password'];

    include "db_config.php";
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email_id);

    $stmt->execute();
    $result = $stmt->get_result();
    $r = $result->num_rows;
    if ($r == 1) {
        $_SESSION["loggedin"] = true;
        $_SESSION["email_id"] = $email_id;
        header("Location: customer_ui.php?e=$email_id");
        exit();
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li>
                    <div class="logo"><img src="style/WhatsApp Image 2025-04-17 at 13.57.55_167de71c.jpg" alt="Logo">
                    </div>
                </li>
                <li><a href="customer_ui.php">Customers</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </div>
    </nav>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>

</html>