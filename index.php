<!DOCTYPE html>

<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บ้านตุ๊กตายิ้มแย้ม จำหน่าย ตุ๊กตาราคาถูก ทั้งขาย ปลีก ส่ง ตุ๊กตาน่ารักๆ จัดส่งฟรีทั่วประเทศ</title>
    <meta name="description" content="บ้านตุ๊กตายิ้มแย้ม YIMYAM จำหน่าย ตุ๊กตาราคาถูก คิตตี้ หมีพู และอื่นๆอีกมากมาย ทั้งขาย ปลีก ส่ง ทั่วประเทศ" />
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="7 days" />
    <link rel="canonical" href="https://ตุ๊กตาราคาถูก.net/" />
    <link rel="alternate" href="https://ตุ๊กตาราคาถูก.net/" hreflang="th-TH" />
    <link rel="icon" href="assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <?php include_once('assets/styles.html'); ?>
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
                            <a href="./shop-page/category/all">ร้านค้า</a>
                            <a href="./ht-order/">วิธีการชื้อสินค้า</a>
                            <a href="./notice-of-payment/">วิธีชำระเงิน</a>
                            <a href="./payment-method/">แจ้งชำระเงิน</a>
                            <a href="./article/">บทความ</a>
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
                            <h3 class="text-center">หมวดหมู่</h3>
                            <div class="box-category">
                                <a href="./shop-page/">ทั้งหมด</a>
                                <?php
                                include("./conn/connect.php");
                                $sql_cate = "SELECT tb_product.Product_category,tb_category.category_url,COUNT(*) FROM tb_product INNER JOIN tb_category ON tb_product.Product_category=tb_category.c_name WHERE tb_product.Product_category = tb_category.c_name GROUP BY tb_category.c_sequence";
                                $doll_cate = mysqli_query($conn, $sql_cate) or die("Error in query: $sql_cate " . mysqli_error($conn));
                                while ($result_cate = mysqli_fetch_array($doll_cate)) {
                                    $namecate = $result_cate['Product_category'];
                                ?>
                                    <a href="./shop-page/category/<?php echo $result_cate['category_url'] ?>"><?php echo $namecate; ?><span class="count">
                                            <?php echo $result_cate['COUNT(*)']; ?>
                                        </span></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-new px-2">
                            <h3 class="text-center">หัวข้อใหม่</h3>
                            <div class="box-article-index">
                                <?php
                                $sql = "SELECT * FROM tb_article 
                                   ORDER BY Article_id DESC  LIMIT 0,5 ";
                                $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
                                while ($resuret = mysqli_fetch_array($q)) {
                                    $topicname = $resuret['Article_title'];
                                ?>
                                    <a href="../read-article/<?php echo $resuret['Seo_url']; ?>"><?php echo $topicname; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-tags px-2">
                            <h3 class="text-center">Tags</h3>
                            <div class="box-category-all">
                                <?php
                                $sql_tag = "SELECT * FROM tag ";
                                $q_tag = mysqli_query($conn, $sql_tag) or die("Error in query: $sql_tag " . mysqli_error($conn));
                                while ($result_tag = mysqli_fetch_array($q_tag)) {
                                    $tagsname = $result_tag['Tag_name'];
                                ?>
                                    <a href="./shop-page/tag/<?php echo $result_tag['Tag_name']; ?>"><?php echo $tagsname; ?></a>
                                <?php } ?>
                            </div>
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
                    <div class="vedio-wrepper">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/B8QcJx_Ykhw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                        <li><a href="./shop-page/category/all">ร้านค้า</a></li>
                        <li><a href="./ht-order/">วิธีการชื้อสินค้า</a></li>
                        <li><a href="./notice-of-payment/">วิธีชำระเงิน</a></li>
                        <li><a href="./payment-method/">แจ้งชำระเงิน</a></li>
                        <li><a href="./article/">บทความ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h3 class="text-footer">Social</h3>
                    <div class="d-block mb-2">
                        <a href="https://www.facebook.com/dollytopfy" class="d-inline-block"><img data-src="./img/icon/fb.webp" class="lazy img-fluid" width="42" height="40" alt="icon facebook"></a>
                        <a href="https://line.me/ti/p/~yimyam888" class="d-inline-block"><img data-src="./img/icon/line.webp" class="lazy img-fluid" width="42" height="40" alt="icon line"></a>
                        <a href="https://www.instagram.com/yimyam.dollhouse/" class="d-inline-block"><img data-src="./img/icon/ig.webp" class="lazy img-fluid" width="42" height="40" alt="icon instagram"></a>
                    </div>
                    <p class="des-footer">Tel : 088-0877288 , <br>089-7947809</p>
                </div>
                <div class="col-lg-2">
                    <a href="./login.php" class="log_back">Login</a>
                </div>
            </div>
        </div>
    </footer>
    <?php

    include_once('assets/scripts.html');

    ?>



    <script>
        var mybutton = document.getElementById("myBtn-backTotop");



        // When the user scrolls down 20px from the top of the document, show the button

        window.onscroll = function() {

            scrollFunction()

        };



        function scrollFunction() {

            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

                mybutton.style.display = "block";

            } else {

                mybutton.style.display = "none";

            }

        }



        // When the user clicks on the button, scroll to the top of the document

        function topFunction() {

            document.body.scrollTop = 0;

            document.documentElement.scrollTop = 0;

        }
    </script>

</body>



</html>