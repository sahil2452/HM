<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style/feedback.css">
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

    <div class="container">
        <h1>Feedback Form</h1>

        <form action="feedback.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>

            <label for="message">Your Feedback:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button name="submit" type="submit">Submit Feedback</button>
        </form>
    </div>
</body>

</html>
<?php
// Database connection settings
$host = "localhost";         // or your host
$username = "root";
$password = "";
$database = "hm";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset(($_POST['submit']))) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO feedback (`name`, `email`, `rating`, `message`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $message);

    // Execute
    if ($stmt->execute()) {
        echo "Thank you for your feedback!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>