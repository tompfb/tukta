<div class=" container">
    <div class="row">
        <div class="col">
            <h2 class="mb-4 mt-4">สินค้า</h2>
        </div>
        <div class="col" style="text-align: end;">
            <div class="mb-4 mt-4 btn-add">
                <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalAddProduct">
                    <i class="fas fa-plus"></i> เพิ่มสินค้าใหม่
                </button>
            </div>
        </div>

    </div>
</div>

<!-- //! Loop product -->

<div class="container">
    <div class="row">
        <?php
        while ($product = $products->fetch_assoc()) {
            $Pictures = $pictureFn->pictureGetByProductId($product['Product_id']);
        ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-2">
                <div class="card card-product">
                    <div class="col text-center">
                        <?php
                        $check_img = mysqli_num_rows($Pictures);
                        if ($check_img > 0) {
                            while ($picture = $Pictures->fetch_assoc()) { ?>
                                <img class="img-product" <?php echo "src='./uploads/" . $picture['Picture_name'] . "'"; ?> alt="">
                            <?php
                            }
                        } else {  ?>
                            <img class="img-product" src="./assets/no-image.png" alt="">
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php print_r($product['Product_name']); ?></h5>
                        <p class="card-text"><?php print_r($product['Product_description']); ?></p>
                        <p class="card-text">
                            <span class="text-danger float-start"> ฿<?php print_r(number_format($product['Product_price'])); ?>&nbsp; - &nbsp;
                                <span><?php print_r(number_format($product['Product_amount'])); ?>ชิ้น</span>
                            </span>
                        <div class="btn-group float-end">
                            <a <?php echo "href='./admin/product-update.php?pId=" . $product["Product_id"] . "'" ?> class="btn btn-warning">
                                <i class="fas fa-edit"></i> แก้ไข </a>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="sr-only">Dropdown</div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-warning" <?php echo "href='./admin/product-update.php?pId=" . $product["Product_id"] . "'" ?>>
                                    <i class="fas fa-edit"></i> แก้ไขข้อมูล </a>
                                <a class="dropdown-item text-warning" <?php echo "href='./admin/product-picture.php?pId=" . $product["Product_id"] . "'" ?>>
                                    <i class="fas fa-images"></i> แก้ไขรูป </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" <?php echo "href='./admin/product-delete.php?pId=" . $product["Product_id"] . "'" ?> onclick="return confirm('Are you sure for Delete')">
                                    <i class="fas fa-trash"></i> ลบสินค้า </a>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<!-- //! end loop -->

<!-- modal Add admin -->
<div class="modal fade" id="ModalAddProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabelAdmin">เพิ่มสินค้าใหม่</h5>
            </div>
            <div class="modal-body">
                <div class="col-12 my-3 px-3">
                    <form method="POST" enctype="multipart/form-data" class="validate-form">
                        <div class="form-group mt-2">
                            <label class="lb-fontw" for="">รูปหน้าปก
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-3">
                            <?php
                            foreach ($fields as $field => $value) {
                            ?>
                                <div class="col-4 mb-2 p-1">
                                    <div class="show-file mb-3" <?php echo "id='show-$field'"; ?>>
                                        <img class="show-image" src="assets/no-image.png" alt="">
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

                        <div class="form-group">
                            <label class="lb-fontw">ชื่อสินค้า</label>
                            <input type="text" name="name" class="form-control" placeholder="กรอกชื่อสินค้า" required>
                        </div>
                        <div class="form-group">
                            <label class="lb-fontw">รายละเอียด</label>
                            <input type="text" name="desc" class="form-control" placeholder="กรอกรายละเอียด" required>
                        </div>

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

                        <div class="form-group">
                            <label class="lb-fontw">หมวดหมู่สินค้า</label>
                            <select id="single1" name="cate">
                                <?php
                                include_once('functions/category-functions.php');
                                $cateFn = new cateFunction();
                                $cates = $cateFn->getFromAllcate();
                                while ($cate = $cates->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $cate['c_name']; ?>"><?php echo $cate['c_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="lb-fontw">สถานะสินค้า</label>
                            <select id="single" name="status">
                                <option value="ขายดี">ขายดี</option>
                                <option value="มาแรง">มาแรง</option>
                                <option value="ราคาถูก">ราคาถูก</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="lb-fontw">ราคาสินค้า</label>
                            <input type="number" name="price" class="form-control" placeholder="กรอกราคาสินค้า" min="0" max="9999999" required>
                        </div>
                        <div class="form-group">
                            <label class="lb-fontw">จำนวนสินค้า</label>
                            <input type="number" name="amount" class="form-control" placeholder="กรอกราคาสินค้า" min="0" max="9999999" required>
                        </div>

                        <div class="form-group d-flex">
                            <button type="submit" name="submit" id="submit" class="btn btn-dark"><i class="fas fa-save"></i> สร้างสินค้า</button>
                            <label for="" class="ms-2 mt-2">
                            </label>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>