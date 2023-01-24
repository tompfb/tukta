<footer class="site-footer">
        <div class="box-color">
            <div class="box-color-1"></div>
            <div class="box-color-2"></div>
            <div class="box-color-3"> </div>
            <div class="box-color-4"></div>
            <div class="box-color-5"></div>
        </div>
        <div class="show-icon">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-2 col-md-4 col-sm-6 my-2 ">
                        <div class="card__show">
                            <img data-src="./img/imgfooter-01.webp" class="lazy img-fluid" width="81" height="81" alt="หน้าหลัก">
                            <p>หน้าหลัก</p>
                        </div>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 my-2">
                        <div class="card__show">
                            <img data-src="./img/imgfooter-02.webp" class="lazy img-fluid" width="81" height="81" alt="สมัคร">
                            <p>สมัคร</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 my-2">
                        <div class="card__show">
                            <img data-src="./img/imgfooter-03.webp" class="lazy img-fluid" width="81" height="81" alt="LOGIN">
                            <p>LOGIN</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 my-2">
                        <div class="card__show">
                            <img data-src="./img/imgfooter-04.webp" class="lazy img-fluid" width="81" height="81" alt="24 Hr">
                            <p>24 Hr</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 my-2">
                        <div class="card__show">
                            <img data-src="./img/imgfooter-05.webp" class="lazy img-fluid" width="81" height="81" alt="การตั้งค่า">
                            <p>การตั้งค่า</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-footer">
            <div class="container ">
                <div class="row align-items-center">
                    <div class="col-lg-10 col-md-12 col-sm-12 my-2 d-block text-center">
                        <a href="./" class="alink_f">Betflik11</a>
                        <a href="./casino/" class="alink_f">คาสิโน</a>
                        <a href="./lotto/" class="alink_f">หวย</a>
                        <a href="./slot/" class="alink_f">สล็อต</a>
                        <a href="./sport/" class="alink_f">กีฬา</a>
                        <a href="./entrance/" class="alink_f">ทางเข้า</a>
                        <a href="./register/" class="alink_f">สมัครสมาชิก</a>
                        <a href="./getmoney/" class="alink_f">ลิงค์รับทรัพย์</a>
                        <a href="./contact/" class="alink_f">ติดต่อ</a>
                        <a href="./backend/login.php" class="alink_f">เข้าสู่ระบบ</a>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 my-2 text-center">
                        <p class="white mb-0">Copyright &#169; 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="nav_moblie_footer">
        <a href="./"><img data-src="./img/icon/icon-nav01.webp" class="lazy img-fluid" width="40" height="40" alt="icon-home"><span>หน้าหลัก</span> </a>
        <a href="./entrance/"><img data-src="./img/icon/icon-nav02.webp" class="lazy img-fluid" width="40" height="40" alt="icon เข้าสู่ระบบ"><span>เข้าสู่ระบบ</span> </a>
        <a href="./register/"><img data-src="./img/icon/icon-nav03.webp" class="lazy img-fluid" width="40" height="40" alt="icon สมัครสมาชิก"><span>สมัครสมาชิก</span> </a>
        <a href="./getmoney/"><img data-src="./img/icon/icon-nav04.webp" class="lazy img-fluid" width="40" height="40" alt="icon ลิงค์รับทรพย์"><span>ลิงค์รับทรพย์</span> </a>
        <a href="./contact/"><img data-src="./img/icon/icon-nav05.webp" class="lazy img-fluid" width="40" height="40" alt="icon ติดต่อ"><span>ติดต่อ</span> </a>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!-- start lazyload -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyloadImages;

            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload() {
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                            if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            }
        })
    </script>
    <!--end lazyload -->