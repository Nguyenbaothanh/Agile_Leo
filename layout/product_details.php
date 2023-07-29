<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/laptop_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header><?php include "header.php"; ?></header>

    <div class="container">

    <?php
    // product_details.php
    include 'connect.php';

    // Function to sanitize input (to prevent SQL injection)
    function sanitize_input($input) {
        return intval($input);
    }

    // Check if the 'id' parameter exists in the URL
    if (isset($_GET['id'])) {
        // Sanitize the input to prevent SQL injection
        $laptop_id = sanitize_input($_GET['id']);

        // Perform the SQL query to fetch laptop details with the given id
        $sql = "SELECT `id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `id` = $laptop_id";

        // Execute the query and fetch the laptop details
        $result = $conn->query($sql);

        // Check if a laptop with the given id exists in the database
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();?>
            <div class="product-details">
                <div class="product-image">
                    <img src="/action/<?php echo $row['image_url']; ?>" alt="<?php echo $row['laptop_name']; ?> Image">
                </div>
                <div class="laptop_detail">
                    <form class="product-info-form">
                        <h1><?php echo $row['laptop_name']; ?></h1>
                        <p>Hãng: <?php echo $row['brand']; ?></p>
                        <p>Processor: <?php echo $row['processor']; ?></p>
                        <p>Screen Size: <?php echo $row['screen_size']; ?></p>
                        <p>Graphics Card: <?php echo $row['graphics_card']; ?></p>
                        <p>RAM: <?php echo $row['ram']; ?></p>
                        <p>Storage Capacity: <?php echo $row['storage_capacity']; ?></p>
                        <p>Operating System: <?php echo $row['operating_system']; ?></p>
                        <p>Weight: <?php echo $row['weight']; ?></p>
                        <p class="status">Status: <?php echo $row['status']; ?></p>
                        <p>Price Range: <?php echo $row['price_range']; ?> VND</p>
                    </form>
                </div>
            </div>

            <?php if (isset($_SESSION['user_id'])) : ?>
                <div class="add-to-cart-form">
                    <form action="/action/add_to_cart.php" method="post">
                        <!-- Pass the user_id to the form -->
                        <input type="hidden" name="laptop_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="laptop_id" value="<?php echo $row['id']; ?>">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
            <?php endif; ?>

            <?php
            echo "</div>";
        } else {
            // If no laptop with the given id is found, display an error message or redirect to a 404 page.
            echo "<p>Laptop not found.</p>";
        }

        // Close the database connection
        $conn->close();
    } else {
        // If the 'id' parameter is not provided, display an error message or redirect to a 404 page.
        echo "<p>Invalid request. Laptop ID not provided.</p>";
    }
    ?>

    </div>
        <h2>Đánh giá của khách hàng</h2>
        <div class="star-total">
        <h1>0</h1>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        </div>
        <div class="break-down">
        <div class="star-rating">
        <span>5 sao : </span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        </div>
        <div class="star-rating">
        <span>4 sao : </span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        </div>
        <div class="star-rating">
        <span>3 sao : </span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        </div>
        <div class="star-rating">
        <span>2 sao : </span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        </div>
        <div class="star-rating">
        <span>1 sao : </span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        </div>
        </div>
    <footer><?php include "footer.php"; ?></footer>

</body>
</html>
