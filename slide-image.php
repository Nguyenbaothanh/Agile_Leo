<!DOCTYPE html>
<html>
<head>
    <title>Slideshow</title>
<link rel="stylesheet" href="/css/slide_image.css">
</head>
<body>
    <div class="container"><div id="mainnav">
        <ul>
            <li class="thefirst"><a href="#">Chuyen muc</a>
                <ul class="sub-menu">
                    <li><a href="#">Video huong dan</a></li>
                    <li><a href="#">Wordpress</a>
                        <ul class="sub-menu2">
                            <li><a href="#">item 1</a></li>
                            <li><a href="#">item 2</a></li>
                            <li><a href="#">item 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Hosting-Domain</a></li>
                    <li><a href="#">SEO</a></li>
                    <li><a href="#">Tai nguyen</a></li>
                    <li><a href="#">Ma nguon mo</a></li>
                    <li><a href="#">Web development</a></li>
                    <li><a href="#">Cong cu</a>
                        <ul class="sub-menu2">
                            <li><a href="#"> item 1</a></li>
                            <li><a href="#"> item 2</a>
                                <ul class="sub-menu3">
                                    <li><a href="#">item 1.a</a></li>
                                    <li><a href="#">item 2.a</a></li>
                                    <li><a href="#">item 3.a</a></li>
                                </ul>
                            </li>
                            <li><a href="#">item 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="thefirst"><a href="#">Chuyen muc</a>
                <ul class="sub-menu">
                    <li><a href="#">Video huong dan</a></li>
                    <li><a href="#">Wordpress</a>
                        <ul class="sub-menu2">
                            <li><a href="#">item 1</a></li>
                            <li><a href="#">item 2</a></li>
                            <li><a href="#">item 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Hosting-Domain</a></li>
                    <li><a href="#">SEO</a></li>
                    <li><a href="#">Tai nguyen</a></li>
                    <li><a href="#">Ma nguon mo</a></li>
                    <li><a href="#">Web development</a></li>
                    <li><a href="#">Cong cu</a>
                        <ul class="sub-menu2">
                            <li><a href="#"> item 1</a></li>
                            <li><a href="#"> item 2</a>
                                <ul class="sub-menu3">
                                    <li><a href="#">item 1.a</a></li>
                                    <li><a href="#">item 2.a</a></li>
                                    <li><a href="#">item 3.a</a></li>
                                </ul>
                            </li>
                            <li><a href="#">item 3</a></li>
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
