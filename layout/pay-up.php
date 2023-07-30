

<?php
        include 'connect.php';
        // Check if the user is logged in and get the user_id from the session
        if (isset($_SESSION['user_id'])) {
            $user_id = sanitize_input($_SESSION['user_id']);

            // Fetch user name based on user_id
            $user_query = "SELECT username FROM users WHERE user_id = $user_id";
            $user_result = $conn->query($user_query);
            $user_name = "";
            if ($user_result && $user_result->num_rows > 0) {
                $user_row = $user_result->fetch_assoc();
                $user_name = $user_row['username'];
            }

            // Fetch items from the shopping cart table for the current user
            $cart_query = "SELECT shopping_cart.user_id, shopping_cart.laptop_id, shopping_cart.quantity, laptops.laptop_name, laptops.price_range 
                            FROM shopping_cart
                            JOIN laptops ON shopping_cart.laptop_id = laptops.id
                            WHERE shopping_cart.user_id = $user_id";
            $cart_result = $conn->query($cart_query);

            if ($cart_result && $cart_result->num_rows > 0) {
                echo "<form class='pay-up'>";
                echo "<table class='pay-up-table'>";
                echo "<button class='close-button' onclick='closemodalpay(\'cart\')'>X</button>";
                echo "<tr><th>Tên Laptop</th><th>Giá tiền</th><th>Số lượng</th></tr>";
                while ($cart_row = $cart_result->fetch_assoc()) {
                    $laptop_name = $cart_row['laptop_name'];
                    $price_range = $cart_row['price_range'];
                    $quantity = $cart_row['quantity'];

                    echo "<tr>";
                    echo "<td>$laptop_name</td>";
                    echo "<td>$price_range</td>";
                    echo "<td>$quantity</td>";
                    echo "</tr>";
                }
                echo "</table>";

                // Calculate and display the total amount

                echo "<label for='user_name'>Lời nhắn</label>";

                // Text area for messages
                echo "<textarea placeholder='Lời nhắn'></textarea>";
                echo "<label for='user_name'>Mã khuyến mãi</label>";

                // Promotional code input
                echo "<input type='text' placeholder='Mã khuyến mãi'>";

                // User address
                // Assuming the user's address is stored in the 'users' table, adjust the column name accordingly
                $address_query = "SELECT address FROM users WHERE user_id = $user_id";
                $address_result = $conn->query($address_query);
                $address = "";
                if ($address_result && $address_result->num_rows > 0) {
                    $address_row = $address_result->fetch_assoc();
                    $address = $address_row['address'];
                }
                echo "<label for='user_name'>Địa chỉ</label>";

                echo "<input type='text' placeholder='Địa chỉ' value='$address' id='user_address'>";

                // User name (already fetched earlier)
                echo "<label for='user_name'>Tên người dùng</label>";
                echo "<input type='text' id='user_name' value='$user_name' style='width: 100%;'>";

                // Payment methods dropdown
                echo "<label for='payment_method'>Phương thức thanh toán</label>";
                echo "<select id='payment_method' name='payment_method'>";
                echo "<option value='credit_card'>Thẻ tín dụng</option>";
                echo "<option value='paypal'>PayPal</option>";
                echo "<option value='cash_on_delivery'>Tiền mặt khi nhận hàng</option>";
                echo "</select>";
                $totalAmount = 0;
                $cart_result->data_seek(0); // Reset the result pointer to the beginning
                while ($cart_row = $cart_result->fetch_assoc()) {
                    $price_range = $cart_row['price_range'];
                    $quantity = $cart_row['quantity'];

                    $totalAmount += $price_range * $quantity;
                }

                // Display the total amount
                echo "<p>Tổng tiền: $totalAmount</p>";
                echo "<button type='submit' class='pay-button'>Thanh toán</button>";
                echo "</form>";
            } else {
                echo "<p>Your shopping cart is empty.</p>";
            }
        } else {
            echo "<p>User not logged in. Please log in to view the shopping cart.</p>";
        }
        ?>