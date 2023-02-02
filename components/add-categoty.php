<div class="box">

    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    $strKeyword = null;

    if (isset($_POST["txtKeyword"])) {
        $strKeyword = $_POST["txtKeyword"];
    }
    if (isset($_GET["txtKeyword"])) {
        $strKeyword = $_GET["txtKeyword"];
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 align="start" class="mt-4 mb-4">จัดการข้อมูล หมวดหมู่</h2><br />
            </div>

            <div class="col">
                <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" a>
                    <div class="form-group w-100 pull-right">
                        <button type="button" class="btn btn-outline-dark float-end mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#ModalAddCate">
                            <i class="fas fa-plus"></i> เพิ่มหมวดหมู่
                        </button>
                    </div>
                    <br />
                    <div id="result"></div>
                </form>
            </div>
        </div>
    </div>

    <div style="clear:both"></div>

    <br />

    <?php
    include('./functions/db.php');
    require_once('./functions/category-functions.php');
    $cateFn = new cateFunction();

    $sqlQueryString = "SELECT tb_category.c_id as c_id,tb_category.c_name as c_name,tb_category.c_create_at as c_create_at,tb_admin.username as username FROM `tb_category` 
                        INNER JOIN  tb_admin on tb_category.c_id = tb_admin.id";
    $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
    $Num_Rows = mysqli_num_rows($result_set);

    $perpage = 10;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $perpage;

    $data = "SELECT * FROM tb_category LIMIT {$start} , {$perpage} ";
    $query = mysqli_query($connect, $data);

    ?>

    <div class="box-body table-responsive">
        <table id="tb_tag" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Create By</th>
                    <th>Sequence</th>
                    <th>Create At</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                // $data = $tagFn->getFromAllTag();
                while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td align="center"><?php echo $result["c_id"]; ?></td>
                        <td align="center"><?php echo mb_substr($result["c_name"], 0, 60, 'utf-8'); ?></td>
                        <td><?php echo strip_tags(mb_substr($result["c_username"], 0, 80, 'utf-8')); ?></td>
                        <!-- <td align="center"><?php ?>
                            <select disabled id="cateSta" name="cateSta" class="form-select form-select-sm" aria-label=".form-select-sm example" value="<?php echo $row['c_status']; ?>">
                                <option <?php if ($result['c_status'] == 1) {
                                            echo "selected";
                                        } ?> value="1">เปิดสถานะ</option>
                                <option <?php if ($result['c_status'] == 0) {
                                            echo "selected";
                                        } ?> value="0">ปิดสถานะ</option>
                            </select>
                        </td> -->
                        <td align="center"><?php echo $result["c_sequence"]; ?></td>
                        <td align="center"><?php echo mb_substr($result["c_create_at"], 0, 80, 'utf-8'); ?></td>
                        <td align="center"><a class="btn btn-primary" href="./admin/cate-edit.php?cateId=<?php echo $result["c_id"]; ?>">แก้ไข</a></td>
                        <td align="center"><a class="btn btn-danger" type="button" href="./functions/category-delete-function.php?cateId=<?php echo $result["c_id"]; ?>" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก !!!')">ลบ</a></td>
                    </tr>

                <?php
                }
                ?>

                </tfoot>
        </table>

        <!-- Pagination -->
        <?php
        $sql2 = "select * from tb_category ";
        $query2 = mysqli_query($connect, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <!-- //! end page -->

        <div class="d-flex justify-content-center mt-5">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="./category.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li class="list-group-item"><a href="./category.php?page=<?php echo $i; ?>"> &nbsp; <?php echo $i; ?> &nbsp;</a></li>
                <?php } ?>
                <li class="list-group-item">
                    <a href="./category.php?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>
    <!-- /.box-body -->

    <?php
    mysqli_close($connect);
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalAddCate" tabindex="-1" aria-labelledby="AddTag" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-sm-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- //todo -->
                <section class="content">
                    <div class="col-md-12">
                        <div class="row">
                            <form method="POST" action="./functions/cate-add-functions.php">
                                <div class="form-group ">
                                    <label for="labelTagName">Category Name</label>
                                    <input type="text" class="form-control mt-2" id="cateName" placeholder="Please Input Category" name="cateName">

                                    <label for="labelSquence" class="mt-2">Sequence</label>
                                    <?php
                                    include_once('functions/category-functions.php');
                                    $cateFn = new cateFunction();
                                    $cates = $cateFn->cateCount();
                                    $row = $cates->fetch_assoc();
                                    $i = 1;
                                    $row['COUNT(*)']; ?>
                                    <input type="number" class="form-control mt-2" value="<?php echo $row['COUNT(*)'] + $i; ?>" disabled="disabled">
                                    <input type="hidden" class="form-control mt-2" name="cateSqu" id="cateSqu" placeholder="Auto Increase Sequence" value="<?php echo $row['COUNT(*)'] + $i; ?>">

                                </div>
                                <div class="form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
                <!-- //todo -->
            </div>
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>