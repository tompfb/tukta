<?php
@$category_n = $_GET["category"];
@$tag_n = $_GET["tag"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บ้านตุ๊กตาแยมส้ม ตุ๊กตาราคาถูก จำหน่าย ตุ๊กตา ทั้งปลีกและขายส่ง ตัวใหญ่ ตัวเล็ก ส่งฟรีทั่วประเทศ</title>
    <meta name="description" content="บ้านตุ๊กตาแยมส้ม ตุ๊กตาราคาถูก จำหน่าย ตุ๊กตาคิตตี้ ตุ๊กตาหมี ตุ๊กตาหมีพูห์ ตุ๊กตามินเนี่ยน ตัวใหญ่ ตัวเล็ก ส่งฟรีทั่วประเทศ" />
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://ตุ๊กตาราคาถูก.net/shop-page/" />
    <link rel="alternate" href="https://ตุ๊กตาราคาถูก.net/shop-page/" hreflang="th-TH" />


    <link rel="icon" href="../../assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <header class="site-header">
        <nav class="navlinks">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 text-center">
                        <a href="../../">
                            <img data-src="../../img/logo-yimyam.webp" class="lazy img-fluid zoom" width="200" height="200" alt="logo yimyam">
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="box_nav">
                            <a href="../../">หน้าแรก</a>
                            <a href="../../shop-page/category/all">ร้านค้า</a>
                            <a href="../../ht-order/">วิธีการชื้อสินค้า</a>
                            <a href="../../notice-of-payment/">วิธีชำระเงิน</a>
                            <a href="../../payment-method/">แจ้งชำระเงิน</a>
                            <a href="../../article/">บทความ</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <img data-src="../../img/banner.webp" class="lazy img-fluid baner-img" width="100%" height="100%" alt="บ้านตุ๊กตายิ้มแย้ม">
    </header>
    <article class="main-content">
        <div class="container-fluid">
            <div class="mb-3">
                <h1 class="heading-flex"><img data-src="../../img/icon-text.webp" class="lazy img-fluid " width="72" height="72" alt="icontext">ร้านค้า</h1>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="card-cate px-2">
                        <h3 class="tags_store">หมวดหมู่</h3>
                        <br>
                        <div class="box-category">
                            <a href="../../shop-page/category/all">ทั้งหมด</a>
                            <?php
                            include("./conn/connect.php");
                            $sql_cate = "SELECT tb_product.Product_category,tb_category.category_url,COUNT(*) FROM tb_product INNER JOIN tb_category ON tb_product.Product_category=tb_category.c_name WHERE tb_product.Product_category = tb_category.c_name GROUP BY tb_category.c_sequence";
                            $doll_cate = mysqli_query($conn, $sql_cate) or die("Error in query: $sql_cate " . mysqli_error($conn));
                            while ($result_cate = mysqli_fetch_array($doll_cate)) {
                                $namecate = $result_cate['Product_category'];
                            ?>
                                <a href="../../shop-page/category/<?php echo $result_cate['category_url'] ?>"><?php echo $namecate; ?><span class="count">
                                        <?php echo $result_cate['COUNT(*)']; ?>
                                    </span></a>
                            <?php } ?>
                        </div>
                        <div class="card-new px-2">
                            <h3 class="tags_store">หัวข้อใหม่</h3>
                            <br>
                            <div class="box-article-index">
                                <?php
                                $sql = "SELECT * FROM tb_article 
                                   ORDER BY Article_id DESC  LIMIT 0,5 ";
                                $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
                                while ($resuret = mysqli_fetch_array($q)) {
                                    $topicname = $resuret['Article_title'];
                                ?>
                                    <a href="../../read-article/<?php echo $resuret['Seo_url']; ?>"><?php echo $topicname; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 store-all">

                    <?php
                    if (($category_n) == "all") { ?>
                        <div class="card-show container">
                            <div class="row align-items-end">
                                <?php
                                $sql_product = "SELECT * FROM tb_product INNER JOIN tb_picture WHERE tb_product.Product_id = tb_picture.Product_id  ";
                                $q_product = mysqli_query($conn, $sql_product) or die("Error in query:$sql_product " . mysqli_error($conn));
                                while ($result_pro = mysqli_fetch_array($q_product)) {
                                ?>

                                    <div class="col-lg-3 my-3">
                                        <div class="card_show_dol zoom" style="background-image:linear-gradient(rgb(0,0,0,0.2),rgb(0,0,0,0.7)), url(../../uploads/<?php echo $result_pro['Picture_name']; ?>);">
                                            <a href="../../view-product/<?php echo $result_pro['product_url']; ?>">
                                                <h3 class="heading_doll"><?php echo $result_pro['Product_name'];  ?></h3>
                                                <p class="pricetext">฿ <?php echo $result_pro['Product_price'];  ?></p>
                                                <span class="span_status"><?php echo $result_pro['Product_status'];  ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php  } else if (isset($tag_n)) { ?>
                        <div class="card-show container">
                            <div class="row align-items-end">
                                <?php
                                $check_tag_log = "SELECT * FROM tag where Tag_name = '$tag_n'";
                                $check_query = mysqli_query($conn, $check_tag_log) or die("error in query:$check_tag_log" . mysqli_error($conn));
                                $check_query_tag = mysqli_fetch_array($check_query);
                                $tag_id = $check_query_tag["Tag_id"];

                                $sql = "SELECT * FROM tb_product INNER JOIN tag_log ON tb_product.Product_id=tag_log.Tag_product_id WHERE tag_log.Tag_id = $tag_id";
                                $q_product = mysqli_query($conn,  $sql) or die("Error in query: $sql " . mysqli_error($conn));

                                while ($result_pro = mysqli_fetch_array($q_product)) {
                                    $idpro =  $result_pro["Product_id"];
                                    $img = "SELECT Picture_name as imgpic FROM tb_picture where Product_id = '$idpro'";
                                    $check_img = mysqli_query($conn, $img) or die("error in query:$img" . mysqli_error($conn));
                                    $check_query_img = mysqli_fetch_array($check_img);
                                ?>
                                    <div class="col-lg-3 my-3">
                                        <div class="card_show_dol zoom" style="background-image:linear-gradient(rgb(0,0,0,0.2),rgb(0,0,0,0.7)), url(../../uploads/<?php echo $check_query_img['imgpic']; ?>);">
                                            <a href="../../view-product/<?php echo $result_pro['product_url']; ?>">
                                                <h3 class="heading_doll"><?php echo $result_pro['Product_name'];  ?></h3>
                                                <p class="pricetext">฿ <?php echo $result_pro['Product_price'];  ?></p>
                                                <span class="span_status"><?php echo $result_pro['Product_status'];  ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php       } else { ?>
                        <div class="card-show container">
                            <div class="row align-items-end">
                                <?php
                                $sql_product = "SELECT * FROM tb_product INNER JOIN tb_picture WHERE tb_product.Product_category = '$category_n' AND tb_product.Product_id = tb_picture.Product_id  ";
                                $q_product = mysqli_query($conn, $sql_product) or die("Error in query:$sql_product " . mysqli_error($conn));
                                while ($result_pro = mysqli_fetch_array($q_product)) {
                                ?>
                                    <div class="col-lg-3 my-3">
                                        <div class="card_show_dol zoom" style="background-image:linear-gradient(rgb(0,0,0,0.2),rgb(0,0,0,0.7)), url(../../uploads/<?php echo $result_pro['Picture_name']; ?>);">
                                            <a href="../../view-product/<?php echo $result_pro['product_url']; ?>">
                                                <h3 class="heading_doll"><?php echo $result_pro['Product_name'];  ?></h3>
                                                <p class="pricetext">฿ <?php echo $result_pro['Product_price'];  ?></p>
                                                <span class="span_status"><?php echo $result_pro['Product_status'];  ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php    }
                    ?>
                </div>
                <div class="col-lg-2">
                    <h3 class="tags_store">Tags</h3>
                    <div class="box-category-all">
                        <?php
                        $sql_tag = "SELECT * FROM tag ";
                        $q_tag = mysqli_query($conn, $sql_tag) or die("Error in query: $sql_tag " . mysqli_error($conn));
                        while ($result_tag = mysqli_fetch_array($q_tag)) {
                            $tagsname = $result_tag['Tag_name'];
                        ?>
                            <a href="../../shop-page/tag/<?php echo $result_tag['Tag_name']; ?>"><?php echo $tagsname; ?></a>
                        <?php } ?>
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
                        <li><a href="../../">หน้าแรก</a></li>
                        <li><a href="../../shop-page/category/all">ร้านค้า</a></li>
                        <li><a href="../../ht-order/">วิธีการชื้อสินค้า</a></li>
                        <li><a href="../../notice-of-payment/">วิธีชำระเงิน</a></li>
                        <li><a href="../../payment-method/">แจ้งชำระเงิน</a></li>
                        <li><a href="../../article/">บทความ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h3 class="text-footer">Social</h3>
                    <div class="d-block mb-2">
                        <a href="https://www.facebook.com/dollytopfy" class="d-inline-block"><img data-src="../../img/icon/fb.webp" class="lazy img-fluid" width="42" height="40" alt="icon facebook"></a>
                        <a href="https://line.me/ti/p/~yimyam888" class="d-inline-block"><img data-src="../../img/icon/line.webp" class="lazy img-fluid" width="42" height="40" alt="icon line"></a>
                        <a href="https://www.instagram.com/yimyam.dollhouse/" class="d-inline-block"><img data-src="../../img/icon/ig.webp" class="lazy img-fluid" width="42" height="40" alt="icon instagram"></a>
                    </div>
                    <p class="des-footer">Tel : 088-0877288 , <br>089-7947809</p>
                </div>
                <div class="col-lg-2">
                    <a href="../../login.php" class="log_back">Login</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- <?php include('./footer.php') ?> -->
    <?php include_once('assets/scripts.html'); ?>
</body>

</html>