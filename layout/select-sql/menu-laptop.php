<?php
// Check if the necessary parameters are provided in the URL
if (isset($_GET['brand']) && isset($_GET['processor'])) {
    // Validate and sanitize the input to prevent SQL injection
    $brand = $_GET['brand'];
    $processor = $_GET['processor'];

    // Prepare and execute the SQL query to fetch laptop information
    $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `brand` = ? AND `processor` = ?");
    $stmt->bind_param("ss", $brand, $processor);
} elseif (isset($_GET['brand']) && isset($_GET['laptop_name'])) {
    // Validate and sanitize the input to prevent SQL injection
    $brand = $_GET['brand'];
    $laptop_name = $_GET['laptop_name'];

    // Prepare and execute the SQL query to fetch laptop information
    // The SQL query will now use 'LIKE' to match laptop_name with any substring
    $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `brand` = ? AND `laptop_name` LIKE ?");
    
    // Append '%' to the laptop_name to match any substring
    $laptop_name = '%' . $laptop_name . '%';

    $stmt->bind_param("ss", $brand, $laptop_name);
} elseif (isset($_GET['brand'])) {
    // Validate and sanitize the input to prevent SQL injection
    $brand = $_GET['brand'];

    // Prepare and execute the SQL query to fetch laptop information
    $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `brand` = ?");
    $stmt->bind_param("s", $brand);
} else {
    echo "Invalid parameters. Please provide 'brand' and 'processor' or 'brand' and 'laptop_name' values in the URL.";
    exit;
}?>
