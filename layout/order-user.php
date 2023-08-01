

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách đơn hàng</title>
    <style>
        /* CSS styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header><?php include 'header.php'; ?></header>
    <main><h1>Danh sách đơn hàng của bạn</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Order Date</th>
            <th>Total Amount</th>
            <th>Promotion Code ID</th>
            <th>User Name</th>
            <th>User Address</th>
            <th>Payment Method</th>
            <th>Message</th>
            <th>Order Status</th>
        </tr>
        <?php
        // Start the session if not already started
        include 'connect.php';
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT `order_id`, `user_id`, `order_date`, `total_amount`, `promotion_code_id`, `user_name`, `user_address`, `payment_method`, `message`, `order_status` FROM `orders` WHERE `user_id` = $user_id";
            $result = $conn->query($sql);
        }
        ?>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                // Format the date if needed (e.g., $formattedDate = date('Y-m-d', strtotime($row['order_date']);)
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td>" . $row['total_amount'] . "</td>";
                echo "<td>" . $row['promotion_code_id'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "<td>" . $row['user_address'] . "</td>";
                echo "<td>" . $row['payment_method'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td>" . $row['order_status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Không có đơn hàng nào.</td></tr>";
        }
        ?>
    </table></main>
    <footer><?php include 'footer.php'; ?></footer>
</body>
</html>

<?php
$conn->close();
?>
