<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Thiết lập phông chữ chung cho toàn trang */
        body {
            font-family: Arial, sans-serif;
        }
        .rating-review {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Style for the form heading */
        .rating-review h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Style for the form elements */
        .rating-review .star-total,
        .rating-review .break-down {
            text-align: center;
            margin: 20px auto;
        }
        /* Căn giữa nội dung chính trên trang */
        .star-total, .break-down {
            text-align: center;
            margin: 20px auto;
        }

        /* Tô màu cho số sao trong phần tổng */
        .star-total h1 {
            font-size: 48px;
            color: #ffd700; /* Màu vàng cho số sao tổng */
            margin-bottom: 10px;
        }

        /* Tô màu cho số sao trong phần đánh giá từng sao */
        .break-down h1 {
            font-size: 24px;
            color: #ffd700; /* Màu vàng cho số sao trong phần đánh giá từng sao */
            margin-top: 0;
        }

        /* Tô đậm các sao đã chọn */
        .checked {
            font-weight: bold;
        }
        .star-total-total {
            display: inline-block;
        }

        .name-total, .number-rating-total {
            display: inline-block;
            margin-right: 10px; 
        }

        /* Thiết lập khoảng cách giữa các sao */
        .star-rating {
            margin: 5px 0;
            display: flex; /* Add flex display to align stars and number horizontally */
            align-items: center; /* Align items (stars and number) vertically */
            justify-content: flex-start; /* Align items (stars and number) horizontally to the left */
        }

        /* Tô màu cho số sao */
        .star-rating span {
            color: #777; /* Màu xám cho số sao */
        }

        /* Tô màu cho số sao đã chọn */
        .star-rating .checked {
            color: #ffd700; /* Màu vàng cho số sao đã chọn */
        }

        /* Reset margin for h1 elements inside .star-rating */
        .star-rating h1 {
            margin: 0;
        }

        /* Margin between star icons and number */
        .star-rating .number-rating {
            margin-left: 10px;
            display: inline-block; /* Change to inline-block to make the number appear in line */
            vertical-align: middle; /* Align the number rating vertically with stars */
        }

        /* Vertically align stars within the star-rating container */
        .star-rating .fa-star {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <form class="rating-review">
        <div class="star-total-total">
            <h1 class="name-total">Tổng số lượt đánh giá</h1>
            <h1 class="number-rating-total" >0</h1>
        </div>
        <div class="break-down">
            <div class="star-rating">
                <span>5 sao : </span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <h1 class="number-rating">0</h1>
            </div>
            <div class="star-rating">
                <span>4 sao : </span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <h1 class="number-rating">0</h1>
            </div>
            <div class="star-rating">
                <span>3 sao : </span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <h1 class="number-rating">0</h1>
            </div>
            <div class="star-rating">
                <span>2 sao : </span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <h1 class="number-rating">0</h1>
            </div>
            <div class="star-rating">
                <span>1 sao : </span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <h1 class="number-rating">0</h1>
            </div>
        </div>
    </form>
</body>
</html>
