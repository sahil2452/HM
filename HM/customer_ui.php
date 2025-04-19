<?php 
include 'db_config.php';
$email_id = $_GET['e'];
if($email_id) {
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE email = ?");
    $stmt->bind_param("s", $email_id);
    $stmt->execute();
    $result = $stmt->get_result();

} else {
    echo "Invalid credentials";
    header("Location: customer_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Bookings</title>
    <link rel="stylesheet" href="style/customer_ui.css">
</head>
<body>
<header>
<nav class="navbar">
        <div class="nav-container">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="process_booking.php">Booking</a></li>
                <li>
                    <div class="logo"><img src="style/WhatsApp Image 2025-04-17 at 13.57.55_167de71c.jpg" alt="Logo">
                    </div>
                </li>
                <li><a href="customer_ui.php">Customers</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </div>
    </nav>
</header>

<section class="customer">
    <h1>Your Bookings</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Number of Guests</th>
            <th>Special Request</th>
            <th>Room Type</th>
            <th>Room Number</th>
            <th>Payment Method</th>
            <th>Total Price</th>
        </tr>
        <?php
            if ($result) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["checkin"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["checkout"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["guests"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["special_requests"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["room_type"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["room_number"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["payment_method"]) . "</td>";
                    echo "<td>". htmlspecialchars($row["total_price"]) . "</td>";
                    echo "</tr>";
                }
            }
            else{
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }
        ?>
    </table>
</section>
</body>
</html>
