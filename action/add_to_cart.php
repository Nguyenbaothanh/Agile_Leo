<?php
// add_to_cart.php
session_start();
include 'connect.php';

// Function to sanitize input (to prevent SQL injection)
function sanitize_input($input) {
    return intval($input);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        $laptop_id = sanitize_input($_POST['id']);
        $quantity = sanitize_input($_POST['quantity']);

        // Check if the user is logged in and get the user_id from the session
        if (isset($_SESSION['user_id'])) {
            $user_id = sanitize_input($_SESSION['user_id']);

            // Add the item to the shopping cart table with the user_id
            $timestamp = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `shopping_cart` (`user_id`, `laptop_id`, `quantity`, `timestamp`) VALUES ('$user_id', '$laptop_id', '$quantity', '$timestamp')";
            $result = $conn->query($sql);

            if ($result) {
                echo "Item added to the cart successfully.";
                header("Location: /layout/product_details.php?id=" . $laptop_id);
            } else {
                echo "Error adding item to the cart.";
            }
        } else {
            echo "User not logged in. Please log in to add items to the cart.";
        }
    }
}
$conn->close();
?>
