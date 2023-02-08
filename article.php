<?php

include_once('functions/article-function.php');
include_once('functions/picture-function.php');
$articleFn = new articleFunction();
$pictureFn = new pictureFunction();
$articles = $articleFn->articleGetAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อ่านบทความ</title>
    <link rel="icon" href="../assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="../style/navbar.css"> -->
    <link rel="stylesheet" type="text/css" href="../style/article.css">

    <?php include_once('assets/styles.html'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style>
        .entry-content p {
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            white-space: nowrap;
        }

        .img-product {
            width: 100%;
            height: 400px;
            padding: 5px;
            object-fit: contain;
        }

        .article-centered {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        .navbar-nav .nav-item .nav-link .fas {
            display: none;
        }

        .navbar-nav .nav-item .nav-link span {
            display: none;
        }

        .nav-link:hover {
            color: rgb(228, 128, 128);
        }

        .modal-header {
            padding: 6rem 1rem 1rem;
            border: none;
        }

        .modal.show .modal-dialog {
            max-width: 100%;
            transform: none;
            top: 0;
            padding: 0;
            margin: 0;
        }

        .modal-title {
            font-weight: bolder;
            font-size: 10px;
            color: gray;
        }

        .modal-body {
            padding: 1rem 1rem;
        }

        .modal-footer {
            padding: 3rem 0rem 5rem 0rem;
            justify-content: flex-start;

        }

        input {
            border: none;
            padding: 0;
            font-size: 41px;
        }



        .input-group-lg>.btn,
        .input-group-lg>.form-control,
        .input-group-lg>.form-select,
        .input-group-lg>.input-group-text {
            padding: 0 1rem 0 1rem;
            font-size: 41px;
        }

        .search-icon {
            font-size: 46px;
            color: darkgray;
            cursor: pointer;
        }

        .modal-header .btn-close {
            padding: 0.5rem 0.5rem;
            margin: -0.5rem 1.5rem -0.5rem auto;

        }
    </style>

</head>
<body>

    <?php include('./header.php'); ?>
    <h1 class="heading-flex"><img data-src="../img/icon-text.webp" class="lazy img-fluid " width="72" height="72" alt="icontext">บทความ</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-3 g-3">
            
            <?php
            while ($article = $articles->fetch_assoc()) {
                $Pictures = $pictureFn->pictureGetByArticleId($article['Article_id']);
            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-text">
                                <a <?php echo "href='../read-article/" . $article["Seo_url"] . "'" ?>>
                                    <?php
                                    $picture = $Pictures->fetch_assoc()
                                    ?>
                                    <?php if (isset($picture['Picture_name'])) { ?>

                                        <img class="img-product mt-2" <?php echo "src='../uploads/" . $picture['Picture_name'] . "'" ?> alt="" class="card-img-top">

                                    <?php } else { ?>

                                        <img class="img-product mt-2" <?php echo "src='../assets/no-image.png'" ?> alt="" class="card-img-top">

                                    <?php } ?>
                                    <?php echo $article['Article_title']; ?>
                                </a>
                            </h2>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="post_archive">
                                    by &nbsp;
                                    <a class="url fn n" href="javascript:;" title="View all post by Admin" rel="author">Admindoll</a>
                                    &nbsp; on &nbsp;
                                    <a href="javascript:;" title="Permalink to ทายนิสัยจากตุ๊กตา ตุ๊กตาหมี" rel="bookmark">
                                        <time class="entry-date" datetime="2020-06-22T10:42:13+00:00"><?php print_r($article['Article_date']); ?></time>
                                    </a>
                                </div>
                            </div>
                            <div class="entry-content mt-3">
                                <a class="more-link" <?php echo "href='../read-article.php?rId=" . $article["Article_id"] . "'" ?>>Continue Reading</a>
                            </div>
                       </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('./footer.php') ?>
    <?php include_once('assets/scripts.html'); ?>
</body>
</html>