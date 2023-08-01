<?php
include 'connect.php';
$brand = $_POST["brand"];
$processor = $_POST["processor"];
$ram = $_POST["ram"];
$sql = "SELECT `id`, `laptop_name`, `price_range`, `image_url` FROM `laptops` WHERE 1";
if (!empty($brand)) {
    $sql .= " AND `brand` = '$brand'";
}
elseif (!empty($processor)) {
    $sql .= " AND `processor` = '$processor'";
}
elseif (!empty($ram)) {
    $sql .= " AND `ram` = '$ram'";
}
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
