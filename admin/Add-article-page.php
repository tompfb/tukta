<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "you should log in";
    echo "you should log in";
    header('location: ../login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:../login.php');
}
include_once('../functions/db.php');
include_once('../functions/article-function.php');
include_once('../functions/picture-function.php');

$articleFn = new articleFunction();
$pictureFn = new pictureFunction();
$articles = $articleFn->articleGetAll();

$fields = array(
    "file1" => "File 1:",
    // "file2" => "File 2:",
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
                $fileDestination = "../uploads/" . $fileNewName;
                move_uploaded_file($tmpName, $fileDestination);

                $picResult = $pictureFn->pictureArticleCreate($fileNewName, $newArticle['Article_id']);
                echo $picResult;
            }
        }

        header("location: ../add-article.php");
        echo "Add success!";
    } else {
        echo $result;
        print_r($result);
        echo "<script>window.alert('Create Article Failed!!!. Try again later.');</script>";
        echo "<script>window.location.href='../add-article.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article management</title>
    <link rel="icon" href="../assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="../style/products-management.css">
    <link rel="stylesheet" type="text/css" href="../style/add-article.css">

    <?php include_once('../assets/styles.html'); ?>


    <!-- summernote -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
    <script src="../assets/ckeditor/ckeditor.js"></script>



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
                    <li> <a class="menu-item link-light" href="../tag.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                tag
                            </span>
                            <span class="menu-item-label">แท็ก</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../category.php">
                            <i class="fas fa-layer-group  icon-padding"></i>
                            <span class="menu-item-label">หมวดหมู่</span> </a>
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
            <form method="POST" enctype="multipart/form-data" class="validate-form">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="px">
                            <div class="form-group">
                                <label>หัวข้อบทความ<span class="text-danger">*</span></label>
                                <input type="text" name="artitle" class="form-control" placeholder="หัวข้อบทความ" required>
                            </div>

                            <!-- //todo -->
                            <div class="form-group">
                                <label>รายละเอียด</label>
                                <textarea name="ArticleDescription" id="ArticleDescription" class="form-control" cols="30" rows="6" placeholder="กรอกบทความ"></textarea>
                            </div>

                            <!-- //todo tag -->
                            <div class="form-group">
                                <label class="lb-fontw">แท็ก</label>
                                <select id="multiple-optgroups" multiple name="tag[]" id="tag[]">
                                    <optgroup>
                                        <?php
                                        $query = "SELECT * FROM tag ORDER BY Tag_id asc" or die("ERROR:" . mysqli_error($result));
                                        $result = mysqli_query($connect, $query);
                                        ?>
                                        <?php foreach ($result as $results) { ?>
                                            <option value="<?php echo $results["Tag_id"]; ?>">
                                                <?php echo $results["Tag_name"]; ?>
                                            </option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group d-flex">
                                <button type="submit" name="submit" id="submit" value="submit" class="btn btn-dark"><i class="fas fa-save"></i> สร้างบทความ</button>
                            </div>

                        </div>
                        <!--//! form add SEO -->
                        <div class="px my-5 w-50">
                            <div class="border">
                                <div class="p-3">
                                    <h5>ตั้งค่า SEO</h5>
                                    <hr>
                                    <div class="from-group">
                                        <label for="">Title</label>
                                        <input class="form-control" type="text" name="SeoTitle" placeholder="Title" required>
                                    </div>
                                    <div class="from-group">
                                        <label for="">Description</label>
                                        <input class="form-control" type="text" name="SeoDescription" placeholder="Description" required>
                                    </div>
                                    <div class="from-group">
                                        <label for="">Url
                                            <span class="text-danger">*</span>
                                            <span>e.g. www.yourdomain/Url</span>
                                        </label>
                                        <input class="form-control" type="text" name="SeoUrl" placeholder="Url" required>
                                    </div>
                                    <div class="from-group">
                                        <label for="">Keywords</label>
                                        <input class="form-control" type="text" name="SeoKeyword" placeholder="Keywords1, Keywords2, Keywords3" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="px">
                            <div class="border">
                                <div class="px-3 py-2">
                                    <div class="form-group mt-2">
                                        <label for="">รูปหน้าปก
                                            <span class="text-danger">*</span>
                                        </label>
                                        <br>
                                        <!-- <img class="imageDisplay" src="assets/no-image.png" alt="no image"> -->
                                    </div>
                                    <div class="form-group d-flex justify-content-center mt-3">
                                        <?php
                                        foreach ($fields as $field => $value) {
                                        ?>
                                            <div class="col-12 mb-2 p-1">
                                                <div class="show-file mb-3" <?php echo "id='show-$field'"; ?>>
                                                    <img class="show-image" src="../assets/no-image.png" alt="">
                                                </div>
                                                <div class="custom-file mb-2 d-grid gap-2 col mx-auto">
                                                    <input type="file" <?php echo "name='$field' id='$field'"; ?> class="custom-file-input text-ellipsis" accept=".jpg, .png" onchange="readURL(this)">
                                                    <label class="custom-file-label text-ellipsis d-none" <?php echo "for='$field' id='label-$field'"; ?>> Choose file </label>
                                                    <button type="button" class="btn btn-secondary btn-block" <?php echo "id='btn-$field'"; ?> onclick="deleteImage(this)">ลบรูป</button>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="col">
                                            <div id="image-error"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <?php include_once('../assets/scripts.html'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet">
    </link>

    <script>
        // todo multi select
        new SlimSelect({
            select: '#multiple-optgroups',
            placeholder: 'เลือกแท็ก',

        });

        CKEDITOR.replace('ArticleDescription', {
            height: "500px",
            language: 'th',
            filebrowserUploadMethod: 'form',
            filebrowserUploadUrl: "../functions/upload-img-editor.php"
        });

        // class MyUploadAdapter {
        //     constructor(loader) {
        //         // The file loader instance to use during the upload.
        //         this.loader = loader;
        //     }
        //     // Starts the upload process.
        //     upload() {
        //         return this.loader.file
        //             .then(file => new Promise((resolve, reject) => {
        //                 this._initRequest();
        //                 this._initListeners(resolve, reject, file);
        //                 this._sendRequest(file);
        //             }));
        //     }
        //     // Aborts the upload process.
        //     abort() {
        //         if (this.xhr) {
        //             this.xhr.abort();
        //         }
        //     }
        //     // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        //     _initRequest() {
        //         const xhr = this.xhr = new XMLHttpRequest();
        //         xhr.open('POST', 'http://example.com/image/upload/path', true);
        //         xhr.responseType = 'json';
        //     }
        //     // Initializes XMLHttpRequest listeners.
        //     _initListeners(resolve, reject, file) {
        //         const xhr = this.xhr;
        //         const loader = this.loader;
        //         const genericErrorText = `Couldn't upload file: ${ file.name }.`;

        //         xhr.addEventListener('error', () => reject(genericErrorText));
        //         xhr.addEventListener('abort', () => reject());
        //         xhr.addEventListener('load', () => {
        //             const response = xhr.response;
        //             if (!response || response.error) {
        //                 return reject(response && response.error ? response.error.message : genericErrorText);
        //             }
        //             resolve({
        //                 default: response.url
        //             });
        //         });
        //         if (xhr.upload) {
        //             xhr.upload.addEventListener('progress', evt => {
        //                 if (evt.lengthComputable) {
        //                     loader.uploadTotal = evt.total;
        //                     loader.uploaded = evt.loaded;
        //                 }
        //             });
        //         }
        //     }
        //     // Prepares the data and sends the request.
        //     _sendRequest(file) {
        //         const data = new FormData();
        //         data.append('upload', file);
        //         this.xhr.send(data);
        //     }
        // }
        // // ...
        // function MyCustomUploadAdapterPlugin(editor) {
        //     editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        //         // Configure the URL to the upload script in your back-end here!
        //         return new MyUploadAdapter(loader);
        //     };
        // }
        // // ...
        // ClassicEditor
        //     .create(document.querySelector('#editor'), {
        //         extraPlugins: [MyCustomUploadAdapterPlugin],
        //         // ...
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });

        // // ! ckediter

        // // upload image
        // function readURL(input) {
        //     const allowType = ['jpg', 'jpeg', 'png'];

        //     const imgErrEl = document.getElementById('image-error');
        //     imgErrEl.innerHTML = '';

        //     const Element = document.getElementById('show-' + input.id);
        //     const lebelEl = document.getElementById('label-' + input.id);
        //     Element.innerHTML = '';
        //     lebelEl.innerHTML = 'Choose file';

        //     if (input.files && input.files[0]) {

        //         const file = input.files[0];
        //         const fileType = file.type;
        //         if (allowType.find(type => fileType.includes(type))) {
        //             lebelEl.innerHTML = file.name;

        //             const reader = new FileReader();
        //             reader.onload = function(e) {
        //                 const imgEl = document.createElement('img');

        //                 imgEl.src = e.target.result;
        //                 imgEl.className = 'show-image';
        //                 Element.appendChild(imgEl);
        //             }
        //             reader.readAsDataURL(file);

        //         } else {
        //             const errorEl = document.createElement('div');
        //             errorEl.className = 'alert-danger p-2 mb-3';
        //             errorEl.innerHTML = 'File type is not correct.';
        //             imgErrEl.appendChild(errorEl);
        //         }
        //     }
        // }

        function deleteImage(btn) {
            const id = btn.id.split('-')[1];

            const inputFile = document.getElementById(id);
            const labelEl = document.getElementById('label-' + id);
            const showImgEl = document.getElementById('show-' + id);
            const imgEl = document.createElement('img');

            inputFile.value = '';
            labelEl.innerHTML = 'Choose file';
            showImgEl.innerHTML = '';
            imgEl.src = "../assets/no-image.png";
            imgEl.className = 'show-image';
            showImgEl.appendChild(imgEl);
        }
    </script>

</body>

</html>