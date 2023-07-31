<?php
if (isset($_POST["action"]) && isset($_POST["order_id"])) {
    $action = $_POST["action"];
    $orderId = $_POST["order_id"];

    // Include connect.php to establish a database connection
    include 'connect.php';

    // Perform the update based on the action received
    $sql = "";
    switch ($action) {
        case "confirm":
            $sql = "UPDATE `orders` SET `order_status` = 'Confirmed' WHERE `order_id` = $orderId";
            break;
        case "ship":
            $sql = "UPDATE `orders` SET `order_status` = 'Shipped' WHERE `order_id` = $orderId";
            break;
        case "complete":
            $sql = "UPDATE `orders` SET `order_status` = 'Completed' WHERE `order_id` = $orderId";
            break;
        case "cancel":
            $sql = "DELETE FROM `orders` WHERE `order_id` = $orderId";
            break;
    }

    // Execute the update query
    if ($sql !== "") {
        if ($conn->query($sql) === TRUE) {
            echo "Order status updated successfully.";
        } else {
            echo "Error updating order status: " . $conn->error;
        }
    }

    $conn->close();
}
?>
