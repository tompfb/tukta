<?php

include_once('functions/db.php');

include_once('functions/article-function.php');

include_once('functions/picture-function.php');

$articleFn = new articleFunction();

$pictureFn = new pictureFunction();
$article = $articleFn->getArticleByUrlSeo($_GET["Seo_url"])->fetch_assoc();
$Pictures = $pictureFn->pictureGetByArticleId($article['Article_id']);



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $article['Article_title']; ?></title>



    <link rel="icon" href="../assets/logo.ico" type="image/ico">

    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/article.css">



    <?php include_once('assets/styles.html'); ?>



    <style>
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