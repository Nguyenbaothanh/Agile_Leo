<!DOCTYPE html>
<html>
<head>
    <title>Display Order</title>
    <link rel="stylesheet" type="text/css" href="/css/display_order.css">
</head>
<body>
    <nav class="vertical navigation">
        <h2 style="color:#fff;">Menu</h2>
        <ul>
            <li><a href="/index.php">Trang chủ</a></li>
            <li><a href="display_users.php">Quản lí người dùng</a></li>
            <li><a href="display_laptop.php">Quản lí sản phẩm</a></li>
            <li><a href="display_order.php">Quản lí đơn hàng</a></li>
            <li><a href="display_khuyen_mai.php">Quản lí mã khuyến mãi</a></li>
            <li><a href="display_promotions.php">Quản lí chương trình khuyến mãi</a></li>
        </ul>
    </nav>
    <h1>Order Details</h1>
    <table>
        <tr>
            <th class="order_id">Order ID</th>
            <th class="user_id">User ID</th>
            <th>Order Date</th>
            <th>Promotion Code ID</th>
            <th>User Name</th>
            <th>User Address</th>
            <th>Payment Method</th>
            <th>Message</th>
            <th>Total Amount</th>
            <th>Order Status</th>
            <th>Action</th>
        </tr>
        <?php 
        // Display orders in the table
        if ($orders->num_rows > 0) {
            while ($row = $orders->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["order_id"] . "</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["order_date"] . "</td>";
                echo "<td>" . $row["promotion_code_id"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["user_address"] . "</td>";
                echo "<td>" . $row["payment_method"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td>" . $row["total_amount"] . "</td>";
                echo "<td>" . $row["order_status"] . "</td>";
                echo "<td>";
                echo "<button onclick=\"changeOrderStatus('confirm', " . $row["order_id"] . ")\">Confirm</button>";
                echo "<button onclick=\"changeOrderStatus('ship', " . $row["order_id"] . ")\">Ship</button>";
                echo "<button onclick=\"changeOrderStatus('complete', " . $row["order_id"] . ")\">Complete</button>";
                echo "<button onclick=\"changeOrderStatus('cancel', " . $row["order_id"] . ")\">Cancel</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No orders found.</td></tr>";
        }
        ?>
    </table>
    <script>
        function changeOrderStatus(action, orderId) {
            var url = "display_order.php"; // Corrected URL
            var data = "action=" + action + "&order_id=" + orderId;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    location.reload();
                }
            };
            xhr.send(data);
        }
    </script>
</body>
</html>
