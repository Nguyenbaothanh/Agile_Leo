<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/product_detail.css">
</head>
<body>
<div class="container">

<?php
// product_details.php
include 'connect.php';

// Function to sanitize input (to prevent SQL injection)
function sanitize_input($input) {
    return intval($input);
}

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $laptop_id = sanitize_input($_GET['id']);

    // Perform the SQL query to fetch laptop details with the given id
    $sql = "SELECT `id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `id` = $laptop_id";

    // Execute the query and fetch the laptop details
    $result = $conn->query($sql);

    // Check if a laptop with the given id exists in the database
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "<h1>" . $row['laptop_name'] . "</h1>";
        echo "<p>Brand: " . $row['brand'] . "</p>";
        echo "<p>Processor: " . $row['processor'] . "</p>";
        echo "<p>Screen Size: " . $row['screen_size'] . "</p>";
        echo "<p>Graphics Card: " . $row['graphics_card'] . "</p>";
        echo "<p>RAM: " . $row['ram'] . "</p>";
        echo "<p>Storage Capacity: " . $row['storage_capacity'] . "</p>";
        echo "<p>Operating System: " . $row['operating_system'] . "</p>";
        echo "<p>Weight: " . $row['weight'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
        echo "<p>Price Range: " . $row['price_range'] . " VND</p>";
        echo "<img src='/action/" . $row['image_url'] . "' alt='" . $row['laptop_name'] . " Image'>";

        // Add a button to add the product to the shopping cart
        echo "<form action='add_to_cart.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Add to Cart'>";
        echo "</form>";

    } else {
        // If no laptop with the given id is found, display an error message or redirect to a 404 page.
        echo "<p>Laptop not found.</p>";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the 'id' parameter is not provided, display an error message or redirect to a 404 page.
    echo "<p>Invalid request. Laptop ID not provided.</p>";
}
?>
    </div>

</body>
</html>
