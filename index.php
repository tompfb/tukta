<?php
include "conn/connect.php";
@$key_search = $_GET["s"];
if ($key_search) {
    $sql = "SELECT * FROM articles WHERE topic_name LIKE '%" . $key_search . "%' ";
    $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
} else {
    $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT 0,6 ";
    $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <title>บ้านตุ๊กตายิ้มแย้ม</title>
    <meta name="title" content="g2gbet168 คาสิโนออนไลน์ บาคาร่า มั่นคงที่สุดในไทย ฝาก ถอน ออโต้ เริ่มต้นเพียง 1 บาท " />
    <meta name="description" content="g2gbet168 เว็บไซต์ของเรา คือผู้ให้บริการ เกมเดิมพันพนันออนไลน์ ครบวงจร ในเว็บไซต์จะมีเกมเดิมพันทุกรูปแบบ เปิดให้บริการ ไม่ว่าจะเป็นเกมเดิมพัน คาสิโนสด เดิมพันบาคาร่า เกมสล็อต เกมยิงปลา ลอตเตอรี่ บริการครบทุกรูปแบบ นอกจากนั้นยังโดดเด่น ในด้านการเสนอ ตลาดการเดิมพันกีฬา ที่ดีที่สุด" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html;" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index,follow" />
    <meta name="Author" content="g2gbet168 ">
    <meta name="googlebots" content="all">
    <meta name="audience" content="all">
    <meta name="Rating" content="General">
    <meta name="distribution" content="Global">
    <meta name="allow-search" content="yes">

    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="g2gbet168 คาสิโนออนไลน์ บาคาร่า มั่นคงที่สุดในไทย ฝาก ถอน ออโต้ เริ่มต้นเพียง 1 บาท" />
    <meta property="og:description" content="g2gbet168 เว็บไซต์ของเรา คือผู้ให้บริการ เกมเดิมพันพนันออนไลน์ ครบวงจร ในเว็บไซต์จะมีเกมเดิมพันทุกรูปแบบ เปิดให้บริการ ไม่ว่าจะเป็นเกมเดิมพัน คาสิโนสด เดิมพันบาคาร่า เกมสล็อต เกมยิงปลา ลอตเตอรี่ บริการครบทุกรูปแบบ นอกจากนั้นยังโดดเด่น ในด้านการเสนอ ตลาดการเดิมพันกีฬา ที่ดีที่สุด" />
    <meta property="og:url" content="#/" />
    <meta property="og:site_name" content="g2gbet" />
    <meta property="og:image" content="./img/logo-g2gbet168.webp" />

    <meta property="twitter:url" content="#/">
    <meta property="twitter:image" content="./img/logo-g2gbet168.webp">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="g2gbet168 คาสิโนออนไลน์ บาคาร่า มั่นคงที่สุดในไทย ฝาก ถอน ออโต้ เริ่มต้นเพียง 1 บาท" />
    <meta name="twitter:description" content="g2gbet168 เว็บไซต์ของเรา คือผู้ให้บริการ เกมเดิมพันพนันออนไลน์ ครบวงจร ในเว็บไซต์จะมีเกมเดิมพันทุกรูปแบบ เปิดให้บริการ ไม่ว่าจะเป็นเกมเดิมพัน คาสิโนสด เดิมพันบาคาร่า เกมสล็อต เกมยิงปลา ลอตเตอรี่ บริการครบทุกรูปแบบ นอกจากนั้นยังโดดเด่น ในด้านการเสนอ ตลาดการเดิมพันกีฬา ที่ดีที่สุด" />
    <meta name="twitter:site" content="g2gbet168">
    <meta name="twitter:creator" content="g2gbet168">

    <link rel="canonical" href="#/" />
    <link rel="alternate" href="#/" hreflang="th-TH" />

    <link rel="shortcut icon" href="./favicon.webp" type="image/x-icon" />
    <link rel="icon" href="./favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="./favicon.webp" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "#/",
            "logo": "#/img/logo-g2gbet168.webp"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebPage",
            "name": "g2gbet168",
            "speakable": {
                "@type": "SpeakableSpecification",
                "xPath": [
                    "/html/head/title",
                    "/html/head/meta[@name='description']/@content"
                ]
            },
            "url": "#/"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "url": "#/",
            "name": "g2gbet168",
            "description": "g2gbet168 คาสิโนออนไลน์ บาคาร่า มั่นคงที่สุดในไทย",
            "potentialAction": [{
                "@type": "SearchAction",
                "target": {
                    "@type": "EntryPoint",
                    "urlTemplate": "#/?s={search_term_string}"
                },
                "query-input": "required name=search_term_string"
            }]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "g2gbet168"
            }]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Store",
            "image": [
                "#/img/logo-g2gbet168.webp",
                "#/img/g2gbet168img-01.webp",
                "#/img/g2gbet168img-02.webp"
            ],
            "name": "g2gbet168",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "TH"
            },
            "url": "#/",
            "priceRange": "฿฿฿",
            "telephone": "+6696-921-9245",
            "openingHoursSpecification": [{
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday"
                    ],
                    "opens": "08:00",
                    "closes": "23:59"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "Sunday",
                    "opens": "08:00",
                    "closes": "23:00"
                }
            ]

        }
    </script>
    <style>
        <?php
        include('bootstrap/bootstrap.css');
        include('css/style.css');
        ?>
    </style>
</head>

<body>
    <header class="site-header">
        <nav class="navlinks">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 text-center">
                        <a href="./">
                            <img data-src="./img/logo-yimyam.webp" class="lazy img-fluid zoom" width="200" height="200" alt="logo yimyam">
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="box_nav">
                            <a href="./">หน้าแรก</a>
                            <a href="">ร้านค้า</a>
                            <a href="">วิธีการชื้อสินค้า</a>
                            <a href="">วิธีชำระเงิน</a>
                            <a href="">แจ้งชำระเงิน</a>
                            <a href="">บทความ</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <img data-src="./img/banner.webp" class="lazy img-fluid baner-img" width="100%" height="100%" alt="บ้านตุ๊กตายิ้มแย้ม">
    </header>
    <article class="article-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 position-relative setoder-one">
                    <div class="box_side">
                        <div class="card-cate px-2">
                            <h4 class="text-center">หมวดหมู่</h4>
                        </div>
                        <div class="card-new px-2">
                            <h4 class="text-center">หัวข้อใหม่</h4>
                        </div>
                        <div class="card-tags px-2">
                            <h4 class="text-center">Tags</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 main-content setoder-two">
                    <h1 class="heading-text"><img data-src="./img/icon-text.webp" class="lazy img-fluid " width="72" height="72" alt="icontext"> ตุ๊กตาราคาถูก</h1>
                    <div class="row my-3">
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-01.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-02.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-03.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-04.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                    </div>
                    <div class="row align-items-center my-3">
                        <div class="col-lg-6 text-center my-2">
                            <img data-src="./img/img-tukta-05.webp" class="lazy img-fluid" width="347" height="704" alt="img doll">
                        </div>
                        <div class="col-lg-6 pink_content">
                            <p class="mb-0 white"><strong>ตุ๊กตาราคาถูก</strong> มีอยู่จริงที่ร้าน บ้านตุ๊กตา ยิ้มแย้ม จัดจำหน่าย ขายปลีกและขายส่ง ในราคาที่ถูกมากๆ มีตุ๊กตาให้เลือกทั้งขนาดตัวใหญ่และ ขนาดตัวเล็ก ขนาดกลาง จุดสำคัญของร้าน เราเลือกสรร สินค้าที่มีคุณภาพ ทุกชิ้นคัดอย่างมีคุณภาพเน้นๆ ร้านเราเน้นขาย ตุ๊กตาราคาถูก และ สวยงาม เพื่อที่จะได้ตอบโจทย์ลูกค้าทุกเพศทุกวัยให้เข้าถึงสินค้าของเราได้ ทางเราของเรามี ตุ๊กตาหลายรูปแบบ ไม่ว่า จะเป็น คิตตี้ มายเมโลดี้ โดเรม่อน คุมะ หมีพูห์ มินเนี่ยน มิกกี้เมาท์และมินนี่เมาท์ บราวน์และอื่นๆ อีกมากมาย </p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-06.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-07.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-08.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 my-2 text-center">
                            <img data-src="./img/img-tukta-09.webp" class="lazy img-fluid" width="309" height="303" alt="img doll">
                        </div>
                    </div>
                    <div class="sub-heading my-3">
                        <h2 class="heading-text"><img data-src="./img/icon-text.webp" class="lazy img-fluid " width="72" height="72" alt="icontext"> ตุ๊กตาหมีตัวใหญ่</h2>
                    </div>
                    <div class="row align-items-center my-3">
                        <div class="col-lg-6  my-2 pink_content">
                            <p class="mb-0 white"><strong>ตุ๊กตาหมีตัวใหญ่</strong> สามารถนำเอาไปเป็นของขวัญ วันเกิด วันวาเลนไทน์ วันรับปริญญา หรือ เนื่องในวันพิเศษต่างๆ ได้ หรือ จัดงานตกแต่งให้สวยงาม เพื่อ ตกแต่งร้าน ให้สวยงามก็ย่อมได้ เนื้อผ้าตุ๊กตาของเราเป็นเนื้อนุ่ม มีการทำการฆ่าเชื้อเป็นที่เรียบร้อย ป้องกันฝุ่นใยเป็นอย่างดี เรียบสวย ไม่เป็นใย ตุ๊กตาแน่นอน ตุ๊กตาหมีตัวใหญ่ ราคาถูก ทั้งจัดจำหน่ายและ ขายปลีกและ ขายส่ง ในราคาที่ถูก มาก </p>
                        </div>
                        <div class="col-lg-6 my-2">
                            <img data-src="./img/img-tukta-10.webp" class="lazy img-fluid d-block m-auto" width="347" height="704" alt="img doll">
                        </div>
                        <div class="col-lg-6 my-2">
                            <img data-src="./img/img-tukta-11.webp" class="lazy img-fluid d-block m-auto" width="347" height="704" alt="img doll">
                        </div>
                        <div class="col-lg-6 my-2 pink_content">
                            <p class="mb-0 white">ทั้งนี้ ร้านตุ๊กตา บ้านตุ๊กตา ยิ้มแย้ม มีร้านใหญ่ที่ที่มีตุ๊กตา สต๊อก เป็นจำนวนมาก ตุ๊กตาแมวน่ารัก ตุ๊กตาแมวน้ำตัวใหญ่ ตุ๊กตามินเนี่ยน ตุ๊กตาคิตตี้ตัวใหญ่ ตุ๊กตา Dolly house และ อื่นๆ อีกมากมาย หรือ ท่านมาสามารถมาเลือกชื้อที่ร้าน บ้านตุ๊กตา ยิ้มแย้ม ได้เลย หรือ สั่งผ่านออนใลน์ ได้ง่ายๆ สามารถอ่านรายละเอียดที่การสั่งซื้อผ่านออนใลน์ได้เลย ฟรีจัดส่งทั่วไทย </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="text-footer">บ้านตุ๊กตา YimYam</h3>
                    <p class="des-footer">ร้านขายตุ๊กตา ราคาถูก ลิขสิทธ์แท้ จากผู้ผลิต มีมาตรฐาน มอก. สินค้าของเรารับมาจากโรงงานผู้ผลิตโดยตรง ซึ่งเป็นสินค้าตัวเดียวกับที่อยู่ตามห้างสรพพสินค้า</p>
                </div>
                <div class="col-lg-3">
                    <h3 class="text-footer">Help us</h3>
                    <ul class="ul-link">
                        <li><a href="./">หน้าแรก</a></li>
                        <li><a href="">ร้านค้า</a></li>
                        <li><a href="">วิธีการชื้อสินค้า</a></li>
                        <li><a href="">วิธีชำระเงิน</a></li>
                        <li><a href="">แจ้งชำระเงิน</a></li>
                        <li><a href="">บทความ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h3 class="text-footer">Social</h3>
                </div>
                <div class="col-lg-2">
                    <a href="" class="log_back">Login</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "80%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
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
</body>

</html>