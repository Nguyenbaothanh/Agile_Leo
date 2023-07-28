<!DOCTYPE html>
<html>
<head>
    <title>Slideshow</title>
<link rel="stylesheet" href="/css/slide_image.css">
</head>
<body>
    <div id="mainnav">
        <ul>
            <li class="thefirst"><a href="#">Laptop MỚI CHÍNH HÃNG</a>
                <ul class="sub-menu">
                    <li><a href="#">Asus</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Asus Core i3</a></li>
                            <li><a href="#">Asus Core i5</a></li>
                            <li><a href="#">Asus Core i7</a></li>
                            <li><a href="#">Asus Core i3</a></li>
                            <li><a href="#">Asus Core i9</a></li>
                            <li><a href="#">Asus Vivobook</a></li>
                            <li><a href="#">Asus ROG</a></li>
                            <li><a href="#">Asus Zenbook</a></li>
                            <li><a href="#">Asus TUF</a></li>
                            <li><a href="#">Asus Expertbook</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Dell</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Dell Core i3</a></li>
                            <li><a href="#">Dell Core i5</a></li>
                            <li><a href="#">Dell Core i7</a></li>
                            <li><a href="#">Dell Core i9</a></li>
                            <li><a href="#">Dell Inspiron</a></li>
                            <li><a href="#">Dell XPS</a></li>
                            <li><a href="#">Dell Latitude</a></li>
                            <li><a href="#">Dell AMD Ryzen 3</a></li>
                            <li><a href="#">Dell AMD Ryzen 5</a></li>
                            <li><a href="#">Dell Vostro</a></li>
                            <li><a href="#">Dell Alienware</a></li>
                            <li><a href="#">Dell Precision</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Lenovo</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Lenovo Core i3</a></li>
                            <li><a href="#">Lenovo Core i5</a></li>
                            <li><a href="#">Lenovo Core i7</a></li>
                        </ul>
                    </li>
                    <li><a href="#">HP</a>
                        <ul class="sub-menu2">
                            <li><a href="#">HP Core i3</a></li>
                            <li><a href="#">HP Core i5</a></li>
                            <li><a href="#">HP Core i7</a></li>
                            <li><a href="#">HP Pavilion</a></li>
                            <li><a href="#">HP Envy</a></li>
                            <li><a href="#">HP Elitebook</a></li>
                            <li><a href="#">HP Spectre</a></li>
                            <li><a href="#">HP Victus</a></li>
                            <li><a href="#">HP Omen</a></li>
                        </ul>
                    </li>
                    <li><a href="#">MSI</a>
                        <ul class="sub-menu2">
                            <li><a href="#">MSI Bravo</a></li>
                            <li><a href="#">MSI Modern</a></li>
                            <li><a href="#">MSI Katana</a></li>
                            <li><a href="#">MSI Creator</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Acer</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Acer Nitro</a></li>
                            <li><a href="#">Acer Aspire</a></li>
                            <li><a href="#">Acer Core i3</a></li>
                            <li><a href="#">Acer Core i5</a></li>
                            <li><a href="#">Acer Core i7</a></li>
                            <li><a href="#">Acer Swift</a></li>
                            <li><a href="#">Acer Predator</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Macbook</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Macbook Air 2020</a></li>
                            <li><a href="#">Macbook Pro 2020</a></li>
                            <li><a href="#">Macbook Air M1</a></li>
                            <li><a href="#">Macbook Pro M1</a></li>
                        </ul>
                    </li>
                    <li><a href="#">LG</a>
                        <ul class="sub-menu2">
                            <li><a href="#">LG Gram</a></li>
                            <li><a href="#">LG Ultra</a></li>
                        </ul>
                    </li>
                    <li><a href="#">GIGABYTE</a>
                        <ul class="sub-menu2">
                            <li><a href="#">GIGABYTE Aero</a></li>
                            <li><a href="#">GIGABYTE Aorus</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Samsung Galaxy</a>
                        <ul class="sub-menu2">
                            <li><a href="#">Samsung Galaxy Book Flex</a></li>
                            <li><a href="#">Samsung Galaxy Book Ion</a></li>
                            <li><a href="#">Samsung Galaxy Book S</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Huawei</a>
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
            <img src="/img/laptop5.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="/img/laptop1.png" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="/img/laptop4.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="/img/laptop2.png" style="width:100%">
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
