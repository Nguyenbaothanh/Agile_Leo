<?php 
$laptop_id = sanitize_input($_GET['id']);

// Perform the SQL query to fetch laptop details with the given id
$sql = "SELECT `id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `id` = $laptop_id";

// Execute the query and fetch the laptop details
$result = $conn->query($sql);
?>