<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "you should log in";
    echo "you should log in";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
}
include_once('functions/db.php');
include_once('functions/article-function.php');
include_once('functions/picture-function.php');

$articleFn = new articleFunction();
$pictureFn = new pictureFunction();
$articles = $articleFn->articleGetAll();

$fields = array(
    "file1" => "File 1:",
    "file2" => "File 2:",
    // "file3" => "File 3:",
    // "file4" => "File 4:"
);

if (isset($_POST['submit'])) {
    $artitle = trim($_POST['artitle']);
    $desc = trim($_POST['ArticleDescription']);
    $seotitle = trim(($_POST['SeoTitle']));
    $seodesc = trim($_POST['SeoDescription']);
    $seourl = trim($_POST['SeoUrl']);
    $seokey = trim($_POST['SeoKeyword']);
    // $category = trim($_POST['Category']);

    $username = $_SESSION['username'];
    $result = $articleFn->articleCreate($artitle, $desc, $seotitle, $seodesc, $seourl, $seokey);
    if ($result) {

        $check_admins = "SELECT * FROM tb_admin WHERE username ='" . $username . "' ";
        $check_query_admin = mysqli_query($connect, $check_admins) or die("ERROR IN QUERY:$check_admins" . mysqli_error($connect));
        $check_value_admin = mysqli_fetch_array($check_query_admin);
        $AdminId = $check_value_admin["id"];

        $check_articles = "SELECT * FROM tb_article WHERE Article_title ='" . $artitle . "' ";
        $check_query = mysqli_query($connect, $check_articles) or die("ERROR in query: $check_articles" . mysqli_error($connect));
        $check_value = mysqli_fetch_array($check_query);
        $id = $check_value["Article_id"];

        foreach ($_POST['tag'] as $tags => $value) {
            $taging = $_POST['tag'][$tags];
            $save_tag = "INSERT INTO tag_log (Tag_id,Tag_article_id,Admin_id) VALUES ('$taging','$id','$AdminId')";
            $save_query = mysqli_query($connect, $save_tag) or
                die("ERROR IN QUERY:$save_tag" . mysqli_error($connect));
        }

        $newArticle = $articleFn->articleGetLast();
        foreach ($fields as $key => $value) {
            if ($_FILES[$key]['name']) {
                $file = $_FILES[$key];
                $fileName = $file['name'];
                $tmpName = $file['tmp_name'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = "./uploads/" . $fileNewName;
                move_uploaded_file($tmpName, $fileDestination);

                $picResult = $pictureFn->pictureArticleCreate($fileNewName, $newArticle['Article_id']);
                echo $picResult;
            }
        }

        header("location: add-article.php");
        echo "Add success!";
    } else {
        echo $result;
        print_r($result);
        echo "<script>window.alert('Create Article Failed!!!. Try again later.');</script>";
        echo "<script>window.location.href='add-article.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products management</title>
    <link rel="icon" href="assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="style/products-management.css">
    <link rel="stylesheet" type="text/css" href="style/add-article.css">

    <?php include_once('assets/styles.html'); ?>
    <style type="text/css">
        .icon-sidebar {
            color: white;
        }

        .card {
            flex-direction: row;
        }

        .show-file {
            height: 250px;
        }

        img.show-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            padding: 10px;
            /* border: 1px solid #cccccc; */
        }

        .custom-file-label {
            padding-right: 5px;
        }

        .custom-file {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .img-product {
            width: auto;
            height: 150px;
            padding: 5px;
            object-fit: contain;
        }

        .ck.ck-reset.ck-editor.ck-rounded-corners {
            overflow: auto;
        }
    </style>

</head>

<body>


    <header>
        <div class="navbar-wrapper" id="navbar-content">
            <div class="navbar navbar-expand">
                <a href="javascript:;" class="link-light" onclick="setSidebarCollapse()">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle link-light" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> บัญชี</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="index.php">หน้าแรก</a></li>
                            <li><a class="dropdown-item" href="products-management.php?logout='1'">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="sidebar-wrapper" id="sidebar-content">
        <div class="sidebar-content">
            <div class="sidebar-header">
                <a href="javascript:;" class="sidebar-brand link-light">
                    <span class="brand">Brandner</span>
                    <span class="brand-collapsed">B</span>
                </a>
            </div>
            <div class="sidebar-menu">
                <div for="" class="menu-label"> </div>
                <ul class="menu-group">
                    <li> <a class="menu-item link-light" href="products-management.php">
                            <i class="fas fa-chart-line icon-padding"></i>
                            <span class="menu-item-label">แดชบอร์ด</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="add-product.php">
                            <i class="fab fa-reddit-alien icon-padding"></i>
                            <span class="menu-item-label">จัดการสินค้า</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="add-article.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                feed
                            </span>
                            <span class="menu-item-label">จัดการบทความ</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="tag.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                tag
                            </span>
                            <span class="menu-item-label">แท็ก</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="category.php">
                            <i class="fas fa-layer-group  icon-padding"></i>
                            <span class="menu-item-label">หมวดหมู่</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="add-admin.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                admin_panel_settings
                            </span>
                            <span class="menu-item-label">ผู้ดูแลระบบ</span> </a>
                    </li>
                </ul>
                <div class="mt-auto text-end">
                    <a href="javascript:;" class="icon-toggle link-light" onclick="setSidebarCollapse()">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-wrapper" id="page-content">
        <div class="page-content">

            <?php include_once('components/add-article.php'); ?>

        </div>
    </div>

    <?php include_once('assets/scripts.html'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet">
    </link>

    <script>
        // todo multi select 
        new SlimSelect({
            select: '#multiple-optgroups',
            placeholder: 'เลือกแท็ก',

        });

        // ! ckediter
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);

            })
            .catch(error => {
                console.error(error);
                header('location: add-article.php');
            });



        // ! ckediter
        function readURL(input) {
            const allowType = ['jpg', 'jpeg', 'png'];

            const imgErrEl = document.getElementById('image-error');
            imgErrEl.innerHTML = '';

            const Element = document.getElementById('show-' + input.id);
            const lebelEl = document.getElementById('label-' + input.id);
            Element.innerHTML = '';
            lebelEl.innerHTML = 'Choose file';

            if (input.files && input.files[0]) {

                const file = input.files[0];
                const fileType = file.type;
                if (allowType.find(type => fileType.includes(type))) {
                    lebelEl.innerHTML = file.name;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgEl = document.createElement('img');

                        imgEl.src = e.target.result;
                        imgEl.className = 'show-image';
                        Element.appendChild(imgEl);
                    }
                    reader.readAsDataURL(file);

                } else {
                    const errorEl = document.createElement('div');
                    errorEl.className = 'alert-danger p-2 mb-3';
                    errorEl.innerHTML = 'File type is not correct.';
                    imgErrEl.appendChild(errorEl);
                }
            }
        }

        function deleteImage(btn) {
            const id = btn.id.split('-')[1];

            const inputFile = document.getElementById(id);
            const labelEl = document.getElementById('label-' + id);
            const showImgEl = document.getElementById('show-' + id);
            const imgEl = document.createElement('img');

            inputFile.value = '';
            labelEl.innerHTML = 'Choose file';
            showImgEl.innerHTML = '';
            imgEl.src = "assets/no-image.png";
            imgEl.className = 'show-image';
            showImgEl.appendChild(imgEl);
        }
    </script>

</body>

</html>