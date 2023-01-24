<?php
include 'script-login.php';
include './conn/connect.php';
$category_name = $_GET["name"];

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $category_name;  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="#/category/<?php echo $category_name; ?>" />
    <link rel="alternate" href="#/category/<?php echo $category_name; ?>" hreflang="th-TH" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />

    <?php include('./link.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                "name": "บทความทั้งหมด",
                "item": "#/all-articles/"
            }],
            {
                "@type": "ListItem",
                "position": 3,
                "name": "หมวดหมู่ <?php echo $category_name;  ?>"
            }]
        }
    </script>

</head>

<body>
    <?php include('./component/header.php'); ?>
    <?php include('./about-head.php'); ?>
    <section id="bread-crumbs">
        <div class="container px-0">
            <nav aria-label="breadcrumb " class="nav-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../">หน้าแรก</a></li>
                    <li class="breadcrumb-item"><a href="../all-articles/">บทความทั้งหมด</a></li>
                    <li class="breadcrumb-item active" aria-current="page" aria-disabled="page">หมวดหมู่ <?php echo $category_name;  ?></li>
                </ol>
            </nav>
        </div>
    </section>
    <article class="viewcontainer">
        <div class="container boxcontainer" style="min-height: 60vh;">
            <h1 class="heading-text  text-center">
                หมวดหมู่ : <?php echo $category_name; ?>
            </h1>
            <div id="loadtable">
                <?php
                $lastid = '';
                include('./conn/connect.php');
                $query = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join category on articles.category_id = category.id WHERE category.name ='$category_name' ORDER BY articles.id  asc limit 9"); ?>
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $article_id = $row['id'];
                    ?>

                        <div class="col-lg-4 col-md-6  col-sm-12">
                            <div class="bg_articles my-2">
                                <a href="../view/<?php echo $row['url_articles_seo']; ?>">
                                    <figure class="news-articles-img">
                                        <div class="bg-img">
                                            <img class="lazy img-fluid" data-src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 30, 'utf-8'))); ?>" width="100%" height="100%">
                                        </div>
                                    </figure>
                                    <div class="px-2">
                                        <strong class="news-articles-h4"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 30, 'utf-8'))); ?></strong>
                                        <div class="d-flex flex-column text-center view_date">
                                            <span>
                                                โพสเมื่อ : <?php echo date("Y-m-d", strtotime($row['create_at'])); ?>
                                            </span>
                                            <span>
                                                ผู้เข้าชม : <?php echo $row['view']; ?>
                                            </span>
                                        </div>

                                        <p class="news-articles-p "><?php echo trim(strip_tags(mb_substr($row['descripion_seo'], 0, 120, 'utf-8'))); ?></p>

                                    </div>
                                </a>
                                <div class="card__footer">
                                    <div class="user">
                                        <div class="user__info">
                                            <p>TEGS :</p>
                                            <?php
                                            $sql_tag = "SELECT tag.tag_url as tag_url,tag.name as name FROM (tag
                                    left join tag_log on tag.id = tag_log.tag_id)
                                    where articles_id = $article_id ";
                                            $query_tag = mysqli_query($conn, $sql_tag) or die("Error in query: $sql " . mysqli_error($conn));
                                            while ($result_tag = $query_tag->fetch_assoc()) {
                                            ?>
                                                <a href="../tag/<?php echo $result_tag['tag_url']; ?>" style="text-decoration: none;">
                                                    <span class="tag tag-red"><?php echo $result_tag['name'] ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        $lastid = $row['id'];
                        $Ncategory =  $category_name;
                    } ?>
                </div>
                <div id="remove">
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-cate="<?php echo $Ncategory; ?>" class="btn btn-primary">See More</button>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </article>

    <?php include('./component/footer.php'); ?>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#loadmore", function() {
                var lastid = $(this).data("id");
                var Ncategory = $(this).data("cate");
                $("#loadmore").html("Loading...");
                $.ajax({
                    url: "../load_cate.php",
                    method: "POST",
                    data: {
                        Ncategory: Ncategory,
                        lastid: lastid,
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data != "") {
                            $("#remove").remove();
                            $("#loadtable").append(data);
                        } else {
                            $("#loadmore").html("No more data to show");
                        }
                    },
                });
            });
        });
    </script>
    <?php include('./import-js.php'); ?>
</body>

</html>