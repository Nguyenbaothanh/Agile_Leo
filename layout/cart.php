<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        /* Add custom CSS for the "Edit Quantity" button */
        .edit-quantity-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header><?php include "header.php"; ?></header>
    <?php
    // cart.php
    // Initialize the session (assuming you want to use sessions)

    include 'connect.php';

    // Function to sanitize input (to prevent SQL injection)
    function sanitize_input($input) {
        return intval($input);
    }

    // Check if the user is logged in and get the user_id from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = sanitize_input($_SESSION['user_id']);

        // Fetch all items from the shopping cart table for the current user
        $sql = "SELECT shopping_cart.quantity, laptops.id, laptops.laptop_name, laptops.price_range 
                FROM shopping_cart
                JOIN laptops ON shopping_cart.laptop_id = laptops.id
                WHERE shopping_cart.user_id = $user_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<h2>Shopping Cart</h2>";
            echo "<table>";
            echo "<tr><th>Laptop Name</th><th>Price Range</th><th>Quantity</th><th>Actions</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $laptop_id = $row['id'];
                $laptop_name = $row['laptop_name'];
                $price_range = $row['price_range'];
                $quantity = $row['quantity'];

                echo "<tr>";
                echo "<td>$laptop_name</td>";
                echo "<td>$price_range</td>";
                echo "<td><span class='quantity-value' data-laptop-id='$laptop_id'>$quantity</span> <span class='edit-quantity-btn' onclick='editQuantity($laptop_id)'>Edit</span></td>";
                echo "<td><a href='/action/remove_product_cart.php?delete_laptop_id=$laptop_id'><img src='/img/remove_product.jpg' alt='Remove'></a></td>";
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

    <!-- JavaScript to handle quantity editing -->
    <script>
        function editQuantity(laptop_id) {
            let currentQuantity = parseInt(document.querySelector(`[data-laptop-id="${laptop_id}"]`).innerText);

            let newQuantity = prompt("Enter the new quantity:", currentQuantity);
            newQuantity = parseInt(newQuantity);

            // Check if the new quantity is a valid number and at least 1
            if (!isNaN(newQuantity) && newQuantity >= 1) {
                // Update the quantity in the HTML
                document.querySelector(`[data-laptop-id="${laptop_id}"]`).innerText = newQuantity;

                // Update the quantity in the database using AJAX
                // Here, you would make an AJAX call to a PHP script that updates the database
                // with the new quantity for the specific laptop_id. Since this requires server-side
                // scripting and AJAX, it is beyond the scope of this static code example.
            } else {
                alert("Invalid quantity. Quantity must be a number and at least 1.");
            }
        }
    </script>
</body>
</html>
