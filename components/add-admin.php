<!-- Header -->
<div class=" container">
    <div class="row">
        <div class="col">
            <h2 class="mb-4 mt-4">ผู้ดูแลระบบ</h2>
        </div>
        <div class="col" style="text-align: end;">
            <div class="mb-4 mt-4 btn-add">
                <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalAddAdmin">
                    <i class="fas fa-plus"></i> เพิ่มผู้ดูแลระบบ
                </button>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="error" style="color: red; text-align: center;">
        <h3>
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </h3>
    </div>
<?php endif ?>

<?php
// include_once('./functions/db.php');
$perpage = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $perpage;

$sql = "select * from tb_admin limit {$start} , {$perpage} ";
$query = mysqli_query($connect, $sql);
?>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-light">
            <tr>
                <th class="col-4">ID</th>
                <th class="col-2">บัญชีผู้ใช้</th>
                <th class="col-2">ชื่อ - นามสกุล</th>
                <th class="col-2">วันที่สร้าง</th>
                <th class="col-2 btn-management">-</th>
            </tr>
        </thead>
        <tbody class="table-admin">
            <tr>
                <td>60878df36d33b9243c7bcbed</td>
                <td>admin test</td>
                <td>programmer Test &nbsp;<span class="owner-admin">OWNER</span></td>
                <td>27/04/2021 11:07 </td>
                <td style="text-align: center;">-</td>
                </td>
            </tr>
            <?php
            while ($row = mysqli_fetch_row($query)) {
                // $row > 2;
            ?>
                <tr>
                    <td><?php echo ($row[0]) ?? '-'; ?></td>
                    <td><?php echo $row[1] ?? '-'; ?></td>
                    <td><?php echo $row[2] . ' &nbsp' . $row[3] ?? '-'; ?></td>
                    <td><?php echo $row[5] ?? '-'; ?></td>
                    <td style="text-align: center;">
                        <a href="./admin/deleteQuery.php?idad=<?php echo $row[0]; ?>" class=" btn btn-outline-danger btn-delete" onclick="return confirm('Are you sure for Delete')">DELETE</a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <?php
    $sql2 = "select * from tb_admin ";
    $query2 = mysqli_query($connect, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>
    <!-- //! end page -->

    <nav class="d-flex justify-content-center mt-5" aria-label="Page navigation example">
        <ul class="list-group">
            <li class="list-group-item ">
                <a href="./add-admin.php?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                <li class="list-group-item "><a href="./add-admin.php?page=<?php echo $i; ?>"> &nbsp; <?php echo $i; ?> &nbsp;</a></li>
            <?php } ?>
            <li class="list-group-item">
                <a href="./add-admin.php?page=<?php echo $total_page; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- modal Add admin -->
<div class="modal fade" id="ModalAddAdmin" tabindex="-1" aria-labelledby="addAdmin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabelAdmin">เพิ่มผู้ดูแลระบบ</h5>
            </div>
            <div class="modal-body">
                <div class="col-12 my-3 px-3">
                    <form method="POST" action="register_db.php" class="validate-form">
                        <div class="form-group">
                            <label class="lb-fontw">บัญชีผู้ใช้ หรือ username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="กรอกบัญชีผู้ใช้" required>
                        </div>
                        <div class="form-group">
                            <label class="lb-fontw">ชื่อ</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" required>
                        </div>
                        <div class="form-group">
                            <label class="lb-fontw">นามสกุล</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" required>
                        </div>
                        <div class="form-group">
                            <label class="lb-fontw">รหัสผ่าน<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_1" name="password_1" placeholder="กรอกรหัสผ่าน" required>
                        </div>
                        <div class="form-group">
                            <label class="lb-fontw">ยืนยันรหัสผ่าน<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_2" name="password_2" placeholder="กรอกยืนยันรหัสผ่าน" required>
                        </div>

                        <div class="form-group d-flex">
                            <button type="submit" name="reg_user" class="btn btn-dark" required>สร้างผู้ดูแลระบบ</button>
                            <label for="" class="ms-2 mt-2">
                                <span></span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>