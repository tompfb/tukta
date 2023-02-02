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
    header('location:index.php');
}

include_once('../functions/article-function.php');
include_once('../functions/picture-function.php');
$pictureFn = new pictureFunction();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);
$pId = $query['pId'];

$Pictures = $pictureFn->pictureGetByArticleId($pId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products management</title>

    <link rel="stylesheet" type="text/css" href="../style/products-management.css">
    <link rel="stylesheet" type="text/css" href="../style/dashboard.css">

    <?php include_once('../assets/styles.html'); ?>
    <style>
        .icon-sidebar {
            color: white;
        }

        .show-file {
            height: 250px;
        }

        img.show-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            padding: 10px;
            border: 1px solid #cccccc;
        }

        .custom-file-label {
            padding-right: 80px;
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
                            <li><a class="dropdown-item" href="../index.php">หน้าแรก</a></li>
                            <li><a class="dropdown-item" href="../products-management.php?logout='1'">ออกจากระบบ</a></li>
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
                    <li> <a class="menu-item link-light" href="../products-management.php">
                            <i class="fas fa-chart-line icon-padding"></i>
                            <span class="menu-item-label">แดชบอร์ด</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../add-product.php">
                            <i class="fab fa-reddit-alien icon-padding"></i>
                            <span class="menu-item-label">จัดการสินค้า</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../add-article.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                feed
                            </span>
                            <span class="menu-item-label">จัดการบทความ</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../add-admin.php">
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

            <div class="container mt-3">
                <div class="form-inline">
                    <h5> <i class="fas fa-images"></i> แก้ไขรูปปกบทความ</h5>
                </div>
                <div class="form-group">
                    <div class="row">
                        <?php
                        $numRows = $Pictures->num_rows;
                        while ($picture = $Pictures->fetch_assoc()) {
                        ?>
                            <div class="col-3 mb-3">
                                <div class="show-file mb-3">
                                    <img class="show-image" <?php echo "src='../uploads/" . $picture["Picture_name"] . "'"; ?> alt="">
                                </div>
                                <a <?php echo "href='./article-picture-delete.php?pictureId=" . $picture["Picture_id"] . "&articleId=$pId'"; ?> class="d-block">
                                    <button type="submit" name="submit" class="btn btn-danger btn-block"> Delete </button> </a>
                            </div>
                        <?php
                        }
                        if ($numRows < 1) {
                        ?>
                            <div class="col-3 mb-3">
                                <form method="POST" enctype="multipart/form-data" <?php echo "action='./picture-upload-article.php?pId=$pId'" ?>>
                                    <div class="show-file mb-3">
                                        <img class="show-image" id="show-image" src="../assets/no-image.png" alt="">
                                    </div>
                                    <div class="custom-file mb-2">
                                        <input type="file" name="file" id="file" class="custom-file-input" accept=".jpg, .png" onchange="readURL(this)">
                                        <label class="custom-file-label text-ellipsis d-none" id="label-file"> Choose file </label>
                                    </div>
                                    <div class="" id="image-error"></div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Upload </button>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <a href="../add-article.php">
                        <button type="button" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> ยกเลิก/กลับ </button> </a>
                </div>
            </div>

        </div>
    </div>

    <?php include_once('../assets/scripts.html'); ?>
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