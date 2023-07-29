<?php
// Make sure to have the database connection code before this
include 'connect.php';
// Process the filter parameters (adjust this based on your actual filter options)
$brand = $_POST["brand"];
$processor = $_POST["processor"];
// Add more filter parameters as needed

// Build the SQL query based on the filters
$sql = "SELECT `laptop_name`, `price_range`, `image_url` FROM `laptops` WHERE 1";
if (!empty($brand)) {
    $sql .= " AND `brand` = '$brand'";
}
if (!empty($processor)) {
    $sql .= " AND `processor` = '$processor'";
}
// Add more filters here

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $laptops = array();
    while ($row = $result->fetch_assoc()) {
        $laptops[] = $row;
    }
    echo json_encode($laptops);
} else {
    echo json_encode(array());
}

$conn->close();
?>
