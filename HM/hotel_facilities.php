<?php
$hotelFacilities = [
    "Conferences room",
    "Yoga"
];

// Add new facilities
$newFacilities = ["Swimming Pool", "Fitness Sport"];

foreach ($newFacilities as $facility) {
    if (!in_array($facility, $hotelFacilities)) {
        $hotelFacilities[] = $facility;
    }
}

// Facility images
$facilityImages = [
    "Conferences room" => "confer.jpg",
    "Yoga" => "yoga.jpg",
    "Swimming Pool" => "pool.jpg",
    "Fitness Sport" => "gym.jpg"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Facilities</title>
    <link rel="stylesheet" href="style/facilities.css">
</head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="hotel_facilities.php">Vitality</a></li>
                <li>
                    <div class="logo"><img src="style/WhatsApp Image 2025-04-17 at 13.57.55_167de71c.jpg" alt="Logo">
                    </div>
                </li>
                <li><a href="customer_ui.php">Customers</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </div>
    </nav>

    <h2>Hotel Facilities</h2>
    <div class="facility-container">
        <?php foreach ($hotelFacilities as $facility):
            $imgSrc = isset($facilityImages[$facility]) ? "images/" . $facilityImages[$facility] : "images/default.png";
            ?>
            <div class="facility-card">
                <img src="<?php echo $imgSrc; ?>" alt="<?php echo $facility; ?>" class="facility-img">
                <div class="facility-name"><?php echo $facility; ?></div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>