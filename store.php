<?php include("./conn/connect.php"); ?>
<!DOCTYPE html>
<html lang="th">

<head>
    <title>ร้านค้า</title>
    <meta name="title" content="g2gbet168 กีฬา เว็บพนันออนไลน์ อันดับ 1 เว็บตรง เล่นจริง จ่ายจริง มีเกมกีฬาอะไรให้เดิมพัน" />
    <meta name="description" content="g2gbet168 กีฬา เว็บตรง ไม่ผ่านเอเย่นต์ มีเกมการพนันมากมาย ให้นักพนันเลือกเล่น หากท่านเดิมพัน เว็บไซต์ของเรา และชนะเกมการเดิมพัน ท่านสามารถ ถอนเงิน ออกจากระบบ ของเราได้ทันที จ่ายไว รับเงินได้อย่างรวดเร็ว ให้สมาชิก ที่มาร่วมสนุก กับเรา ได้รับประสบการณ์ เดิมพันพนัน กีฬาที่ดีที่สุด เว็บอันดับ 1 ของไทย" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html;" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="all" />
    <meta name="Author" content="g2gbet168">
    <meta name="googlebots" content="all">
    <meta name="audience" content="all">
    <meta name="Rating" content="General">
    <meta name="distribution" content="Global">
    <meta name="allow-search" content="yes">

    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="g2gbet168 กีฬา เว็บพนันออนไลน์ อันดับ 1 เว็บตรง เล่นจริง จ่ายจริง มีเกมกีฬาอะไรให้เดิมพัน" />
    <meta property="og:description" content="g2gbet168 กีฬา เว็บตรง ไม่ผ่านเอเย่นต์ มีเกมการพนันมากมาย ให้นักพนันเลือกเล่น หากท่านเดิมพัน เว็บไซต์ของเรา และชนะเกมการเดิมพัน ท่านสามารถ ถอนเงิน ออกจากระบบ ของเราได้ทันที จ่ายไว รับเงินได้อย่างรวดเร็ว ให้สมาชิก ที่มาร่วมสนุก กับเรา ได้รับประสบการณ์ เดิมพันพนัน กีฬาที่ดีที่สุด เว็บอันดับ 1 ของไทย" />
    <meta property="og:url" content="#/sport/" />
    <meta property="og:site_name" content="กีฬา" />
    <meta property="og:image" content="../img/sport/g2gbet168-sport-01.webp" />

    <meta property="twitter:url" content="#/sport/">
    <meta property="twitter:image" content="../img/sport/g2gbet168-sport-01.webp">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="g2gbet168 กีฬา เว็บพนันออนไลน์ อันดับ 1 เว็บตรง เล่นจริง จ่ายจริง มีเกมกีฬาอะไรให้เดิมพัน" />
    <meta name="twitter:description" content="g2gbet168 กีฬา เว็บตรง ไม่ผ่านเอเย่นต์ มีเกมการพนันมากมาย ให้นักพนันเลือกเล่น หากท่านเดิมพัน เว็บไซต์ของเรา และชนะเกมการเดิมพัน ท่านสามารถ ถอนเงิน ออกจากระบบ ของเราได้ทันที จ่ายไว รับเงินได้อย่างรวดเร็ว ให้สมาชิก ที่มาร่วมสนุก กับเรา ได้รับประสบการณ์ เดิมพันพนัน กีฬาที่ดีที่สุด เว็บอันดับ 1 ของไทย" />
    <meta name="twitter:site" content="g2gbet168">
    <meta name="twitter:creator" content="g2gbet168">

    <link rel="canonical" href="#/sport/" />
    <link rel="alternate" href="#/sport/" hreflang="th-TH" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />
    <?php include('./link.php'); ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "หน้าแรก",
                "item": "#/"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "กีฬา"
            }]
        }
    </script>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="main-content">
        <div class="container-fluid">
            <div class="mb-3">
                <h1 class="heading-flex"><img data-src="../img/icon-text.webp" class="lazy img-fluid " width="72" height="72" alt="icontext">ร้านค้า</h1>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="card-cate px-2">
                        <h3 class="tags_store">หมวดหมู่</h3>
                        <br>
                        <div class="box-category">
                            <a href="../store/">ทั้งหมด</a>
                            <?php
                            include("./conn/connect.php");
                            $sql_cate = "SELECT tb_product.Product_category,tb_category.category_url,COUNT(*) FROM tb_product INNER JOIN tb_category ON tb_product.Product_category=tb_category.c_name WHERE tb_product.Product_category = tb_category.c_name GROUP BY tb_category.c_sequence";
                            $doll_cate = mysqli_query($conn, $sql_cate) or die("Error in query: $sql_cate " . mysqli_error($conn));
                            while ($result_cate = mysqli_fetch_array($doll_cate)) {
                                $namecate = $result_cate['Product_category'];
                            ?>
                                <a href=""><?php echo $namecate; ?><span class="count">
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
                                    <a href=""><?php echo $topicname; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 store-all">
                    <div class="card-show">

                    </div>
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
                            <a href=""><?php echo $tagsname; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>