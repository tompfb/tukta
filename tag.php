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
// echo $_SESSION['username'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products management</title>

    <link rel="stylesheet" type="text/css" href="style/products-management.css">
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">

    <?php include_once('assets/styles.html'); ?>
    <style>
        li .menu-item .material-icons {
            vertical-align: text-bottom !important;
        }

        li .menu-item {
            margin: 10px 0;
        }

        .icon-sidebar {
            color: white;
        }

        @media (max-width: 767px) {
            .modal.show .modal-dialog {
                max-width: calc(100% - 8px) !important;
            }
        }

        .modal-header {
            padding: 6rem 1rem 1rem;
            border: none;
        }

        .modal.show .modal-dialog {
            max-width: 50%;
            transform: none;
            top: 0;
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

        .modal-header .btn-close {
            padding: 0.5rem 0.5rem;
            margin: -0.5rem 1.5rem -0.5rem auto;
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

        .input-group {
            height: 60px;
        }

        .search-icon {
            font-size: 46px;
            color: darkgray;
            cursor: pointer;
        }

        .list-group {
            flex-direction: row !important;
        }

        .list-group .list-group-item {
            border: none;
        }

        .list-group .list-group-item a {
            color: #000;
            font-size: 15px;
        }

        .list-group .list-group-item a:hover {
            color: palevioletred;
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

            <?php
            // include_once('./tag/tag-add.php'); 
            ?>
            <?php include_once('./tag/tag.php'); ?>

        </div>
    </div>

    <?php include_once('assets/scripts.html'); ?>
</body>

</html>