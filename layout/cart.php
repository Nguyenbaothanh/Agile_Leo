<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <header><?php include "header.php"; ?></header>
<?php
// cart.php
include 'connect.php';

// Function to sanitize input (to prevent SQL injection)
function sanitize_input($input) {
    return intval($input);
}

// Check if the user is logged in and get the user_id from the session
if (isset($_SESSION['user_id'])) {
    $user_id = sanitize_input($_SESSION['user_id']);

    // Fetch all items from the shopping cart table for the current user
    $sql = "SELECT * FROM `shopping_cart` WHERE `user_id` = $user_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<h2>Shopping Cart</h2>";
        echo "<table>";
        echo "<tr><th>Laptop Name</th><th>Quantity</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            $laptop_id = $row['laptop_id'];
            $quantity = $row['quantity'];

            // Retrieve the laptop details from the laptops table using the laptop_id
            $laptop_query = "SELECT `laptop_name` FROM `laptops` WHERE `id` = $laptop_id";
            $laptop_result = $conn->query($laptop_query);
            $laptop_name = $laptop_result->fetch_assoc()['laptop_name'];

            echo "<tr>";
            echo "<td>$laptop_name</td>";
            echo "<td>$quantity</td>";
            echo "<td><a href='remove_from_cart.php?id=$laptop_id'>Remove</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Your shopping cart is empty.</p>";
    }
} else {
    echo "<p>User not logged in. Please log in to view the shopping cart.</p>";
}

$conn->close();
?>
<footer><?php include "footer.php"; ?></footer>
</body>
</html>
