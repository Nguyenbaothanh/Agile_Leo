<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/css/cart.css">
</head>
<body>
    <header><?php include "header.php"; ?></header>
    <main>
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

        // Fetch distinct items from the shopping cart table for the current user
        $sql = "SELECT DISTINCT shopping_cart.laptop_id, shopping_cart.quantity, laptops.laptop_name, laptops.price_range 
                FROM shopping_cart
                JOIN laptops ON shopping_cart.laptop_id = laptops.id
                WHERE shopping_cart.user_id = $user_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Initialize a variable to keep track of the total price
            $totalPrice = 0;

            echo "<h2>Giỏ Hàng</h2>";
            echo "<table>";
            echo "<tr><th>Tên Laptop</th><th>Giá tiền</th><th>Số lượng</th><th>Xóa</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $laptop_id = $row['laptop_id'];
                $laptop_name = $row['laptop_name'];
                $price_range = $row['price_range'];
                $quantity = $row['quantity'];

                // Tính tổng giá tiền cho sản phẩm hiện tại
                $totalPriceForItem = $price_range * $quantity;
                // Cập nhật giá tiền tổng cộng
                $totalPrice += $totalPriceForItem;

                echo "<tr>";
                echo "<td>$laptop_name</td>";
                echo "<td>$price_range</td>";
                echo "<td>";

                // New div wrapper for quantity-value
                echo "<div class='quantity-wrapper'>";
                echo "<span class='quantity-action-btn-increase' data-laptop-id='$laptop_id' data-action='increase'>+</span> ";
                echo "<span class='quantity-value' data-laptop-id='$laptop_id'>$quantity</span> ";
                echo "<span class='quantity-action-btn-decrease' data-laptop-id='$laptop_id' data-action='decrease'>-</span>";
                echo "</div>";

                echo "</td>";
                echo "<td class='remove-product'><a href='/action/remove_product_cart.php?delete_laptop_id=$laptop_id'><img src='/img/remove_product.jpg' alt='Remove'></a></td>";
                echo "</tr>";
                
            }
            echo "</table>";

            // Hiển thị tổng giá tiền
            echo "<p id='totalPriceDisplay'>Total Price: $totalPrice</p>";
        } else {
            echo "<p>Your shopping cart is empty.</p>";
        }
    } else {
        echo "<p>User not logged in. Please log in to view the shopping cart.</p>";
    }
    ?>
    <button id="paymentButton" onclick="proceedToPayment()">Proceed to Payment</button>
    </main>
    <footer><?php include "footer.php"; ?></footer>


    <script>
    // JavaScript code for quantity update
    function updateQuantity(laptopId, action) {
        const quantityElement = document.querySelector(`.quantity-value[data-laptop-id='${laptopId}']`);
        let currentQuantity = parseInt(quantityElement.textContent);

        if (action === 'increase') {
            currentQuantity++;
        } else if (action === 'decrease') {
            currentQuantity = Math.max(1, currentQuantity - 1);
        }

        // Send an AJAX request to update the quantity in the database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/action/update_quantity.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Update the quantity displayed on the page
                quantityElement.textContent = currentQuantity;

                // Update the total price
                updateTotalPrice();
            }
        };

        // Prepare the data to be sent in the POST request
        const data = `laptop_id=${encodeURIComponent(laptopId)}&quantity=${encodeURIComponent(currentQuantity)}`;

        // Send the POST request
        xhr.send(data);
    }

    // Function to update the total price
    function updateTotalPrice() {
        const quantityElements = document.querySelectorAll('.quantity-value');
        let totalPrice = 0;

        quantityElements.forEach(quantityElement => {
            const laptopId = quantityElement.getAttribute('data-laptop-id');
            const priceElement = quantityElement.closest('tr').querySelector('td:nth-child(2)'); // Find the corresponding price element in the row
            const priceRange = parseFloat(priceElement.textContent); // Parse the price as a float

            if (!isNaN(priceRange)) {
                const quantity = parseInt(quantityElement.textContent);
                totalPrice += priceRange * quantity;
            }
        });

        // Update the total price displayed on the page
        const totalPriceDisplay = document.getElementById('totalPriceDisplay');
        totalPriceDisplay.textContent = isNaN(totalPrice) ? "Total Price: NaN" : `Total Price: ${totalPrice.toFixed(0)}`;
    }

    // Event listener to handle the quantity button clicks
    const quantityButtons = document.querySelectorAll('.quantity-action-btn-increase, .quantity-action-btn-decrease');
    quantityButtons.forEach(button => {
        button.addEventListener('click', function () {
            const laptopId = this.getAttribute('data-laptop-id');
            const action = this.getAttribute('data-action');
            updateQuantity(laptopId, action);
        });
    });

    // Calculate and display the initial total price
    updateTotalPrice();
</script>

</body>
</html>
