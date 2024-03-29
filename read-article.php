<?php

include_once('functions/db.php');

include_once('functions/article-function.php');

include_once('functions/picture-function.php');

$articleFn = new articleFunction();

$pictureFn = new pictureFunction();
$article = $articleFn->getArticleByUrlSeo($_GET["Seo_url"])->fetch_assoc();
$Pictures = $pictureFn->pictureGetByArticleId($article['Article_id']);

$url_articles_seo = $_GET["Seo_url"]; 
$encode = urlencode($url_articles_seo);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title><?php echo $article['Article_title']; ?></title>
    <meta name="title" content="<?php echo $article['Article_title'];  ?>" />
    <meta name="description" content="<?php echo $article['Seo_description']; ?>">

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-language" content="th" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow" />
    <meta name="Author" content="บ้านตุ๊กตายิ้มแย้ม">

    <link rel="alternate" href="https://xn--12cai0ebh3gtfbb3dua6s.com/<?php echo $encode ?>" hreflang="th-TH" />
    <link rel="canonical" href="https://xn--12cai0ebh3gtfbb3dua6s.com/<?php echo $encode ?>" />
    <link rel="icon" href="../assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/article.css">
    <?php include_once('assets/styles.html'); ?>
    <style>
        body{
            overflow-x: hidden;
        }
        .article-centered {

            text-align: center;

        }

        img {
            max-width: 100%;
            height: auto;
        }


        a {

            text-decoration: none;

            color: #000;

        }






        .show-file {

            text-align: center;

        }


        .show-image {

            width: 300px;

            height: auto;

        }
    </style>

</head>



<body>

    <?php include_once('./header.php'); ?>



    <div class="container">

        <div class="col" style="text-align: center;">
            <div class="container">

                <?php

                while ($picture = $Pictures->fetch_assoc()) {

                ?>

                    <div class="col mb-3">

                        <div class="show-file mb-3">

                            <img class="show-image img-fluid" <?php echo "src='../uploads/" . $picture["Picture_name"] . "'"; ?> alt="">

                        </div>

                    </div>

                <?php

                }

                ?>



                <div class="card mb-3">
                    <div class="card-body">

                        <h1 class="text-center" style="color: #ff0060;"><?php echo $article['Article_title']; ?></h1>

                        <p class="card-text">

                            <?php echo $article['Article_description']; ?>

                        </p>

                        <p class="card-text"><small class="text-muted">

                                Create at&nbsp;

                                <?php

                                echo $article['Article_date'];

                                ?>

                            </small></p>

                    </div>

                </div>

                <?php



                ?>

            </div>

        </div>

    </div>




    <?php include('./footer.php') ?>
    <?php include_once('assets/scripts.html'); ?>

    <script>
        function readURL(input) {

            const imgErrEl = document.getElementById('image-error');

            imgErrEl.innerHTML = '';



            const Element = document.getElementById('show-image');

            const lebelEl = document.getElementById('label-file');

            Element.innerHTML = '';

            lebelEl.innerHTML = 'Choose file';



            if (input.files && input.files[0]) {

                const allowType = ['jpg', 'jpeg', 'png'];



                const file = input.files[0];

                const fileType = file.type;

                if (allowType.find(type => fileType.includes(type))) {

                    lebelEl.innerHTML = file.name;



                    const reader = new FileReader();

                    reader.onload = function(e) {

                        // const imgEl = document.createElement('img');



                        Element.src = e.target.result;

                        // Element.className = 'show-image';

                        // Element.appendChild(imgEl);

                    }

                    reader.readAsDataURL(file);



                } else {

                    const errorEl = document.createElement('div');

                    errorEl.className = 'alert-danger p-2 mb-2';

                    errorEl.innerHTML = 'file type is not correct.';

                    imgErrEl.appendChild(errorEl);

                }

            }

        }
    </script>

</body>



</html>