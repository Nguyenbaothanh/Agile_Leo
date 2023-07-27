<!DOCTYPE html>
<html>
<head>
    <title>Slideshow</title>
<link rel="stylesheet" href="/css/slide_image.css">
</head>
<body>
    <div id="mainnav">
        <ul>
            <li class="thefirst"><a href="#">LAPTOP MỚI CHÍNH HÃNG</a>
                <ul class="sub-menu">
                    <li><a href="#">Laptop Asus</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop Asus Core i3</a></li>
                            <li><a href="#">Laptop Asus Core i5</a></li>
                            <li><a href="#">Laptop Asus Core i7</a></li>
                            <li><a href="#">Laptop Asus Core i3</a></li>
                            <li><a href="#">Laptop Asus Core i9</a></li>
                            <li><a href="#">Laptop Asus Vivobook</a></li>
                            <li><a href="#">Laptop Asus ROG</a></li>
                            <li><a href="#">Laptop Asus Zenbook</a></li>
                            <li><a href="#">Laptop Asus TUF</a></li>
                            <li><a href="#">Laptop Asus Expertbook</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop Dell</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop Dell Core i3</a></li>
                            <li><a href="#">Laptop Dell Core i5</a></li>
                            <li><a href="#">Laptop Dell Core i7</a></li>
                            <li><a href="#">Laptop Dell Core i9</a></li>
                            <li><a href="#">Laptop Dell Inspiron</a></li>
                            <li><a href="#">Laptop Dell XPS</a></li>
                            <li><a href="#">Laptop Dell Latitude</a></li>
                            <li><a href="#">Laptop Dell AMD Ryzen 3</a></li>
                            <li><a href="#">Laptop Dell AMD Ryzen 5</a></li>
                            <li><a href="#">Laptop Dell Vostro</a></li>
                            <li><a href="#">Laptop Dell Alienware</a></li>
                            <li><a href="#">Laptop Dell Precision</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop Lenovo</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop Lenovo Core i3</a></li>
                            <li><a href="#">Laptop Lenovo Core i5</a></li>
                            <li><a href="#">Laptop Lenovo Core i7</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop HP</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop HP Core i3</a></li>
                            <li><a href="#">Laptop HP Core i5</a></li>
                            <li><a href="#">Laptop HP Core i7</a></li>
                            <li><a href="#">Laptop HP Pavilion</a></li>
                            <li><a href="#">Laptop HP Envy</a></li>
                            <li><a href="#">Laptop HP Elitebook</a></li>
                            <li><a href="#">Laptop HP Spectre</a></li>
                            <li><a href="#">Laptop HP Victus</a></li>
                            <li><a href="#">Laptop HP Omen</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop MSI</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop MSI Bravo</a></li>
                            <li><a href="#">Laptop MSI Modern</a></li>
                            <li><a href="#">Laptop MSI Katana</a></li>
                            <li><a href="#">MSI Creator</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop Acer</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop Acer Nitro</a></li>
                            <li><a href="#">Laptop Acer Aspire</a></li>
                            <li><a href="#">Laptop Acer Core i3</a></li>
                            <li><a href="#">Laptop Acer Core i5</a></li>
                            <li><a href="#">Laptop Acer Core i7</a></li>
                            <li><a href="#">Laptop Acer Swift</a></li>
                            <li><a href="#">Laptop Acer Predator</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Macbook Mới 100%</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Macbook Air 2020</a></li>
                            <li><a href="#">Macbook Pro 2020</a></li>
                            <li><a href="#">Macbook Air M1</a></li>
                            <li><a href="#">Macbook Pro M1</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop LG</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop LG Gram</a></li>
                            <li><a href="#">Laptop LG Ultra</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop GIGABYTE</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Laptop GIGABYTE Aero</a></li>
                            <li><a href="#">Laptop GIGABYTE Aorus</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop Samsung Galaxy</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Samsung Galaxy Book Flex</a></li>
                            <li><a href="#">Samsung Galaxy Book Ion</a></li>
                            <li><a href="#">Samsung Galaxy Book S</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptop Huawei</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Huawei MateBook X Pro</a></li>
                            <li><a href="#">Huawei MateBook 13</a></li>
                            <li><a href="#">Huawei MateBook D</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
 
        </ul>
    </div>
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="/img/laptop.png" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="/img/laptop1.png" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="/img/laptop2.png" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="/img/laptop3.png" style="width:100%">
        </div>

        <!-- Thêm nút trước và sau -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div></div>
    

    <script>
        // JavaScript cho chuyển đổi ảnh trong slideshow
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
        setInterval(function () {
            plusSlides(1);
        }, 30000);
    </script>
</body>
</html>
